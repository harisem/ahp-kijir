<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePengajuanRequest;
use App\Models\Kriteria;
use App\Models\Pengajuan;
use App\Models\Profile;
use App\Models\Tanggungan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Dompdf\Dompdf;

class PengajuanController extends Controller
{
    public function __construct()
    {
        $this->currentDate = Carbon::now()->year;
    }

    public function index()
    {
        $user = User::with('profiles.tanggungans')->where('id', Auth::id())->first();
        $currentYear = Carbon::now()->year;
        return view('beasiswa.tambah', [
            'user' => $user,
            'currentYear' => $currentYear
        ]);
    }

    public function dashboard()
    {
        $pengajuan = Pengajuan::all();
        $pengajuans = $pengajuan->groupBy(function ($item, $key) {
            return $item->created_at->format('Y');
        });
        $years = Pengajuan::select(DB::raw('YEAR(created_at) year'))->groupBy('year')->get();
        $selectedYear = request()->year;

        $data = [
            'masuk' => $selectedYear ? count($pengajuans[$selectedYear]) : count($pengajuans[$this->currentDate]),
            'diterima' => $selectedYear ? count($pengajuans[$selectedYear]->where('status', 'disetujui')) : count($pengajuans[$this->currentDate]->where('status', 'disetujui')),
            'selesai' => $selectedYear ? count($pengajuans[request()->year]->whereIn('status', ['disetujui', 'tidak disetujui'])) : count($pengajuans[$this->currentDate]->whereIn('status', ['disetujui', 'tidak disetujui']))
        ];

        return view('dashboard.index', [
            'pengajuans' => $years,
            'data' => $data,
            'currentYear' => $selectedYear ? $selectedYear : $this->currentDate
        ]);
    }

    public function statusPengajuan()
    {
        $pengajuans = Profile::with('pengajuanTanggungans.tanggungans')->where('user_id', Auth::id())->first();
        return view('beasiswa.status', [
            'pengajuans' => [$pengajuans->pengajuanTanggungans],
        ]);
    }

    public function kelolaPengajuan()
    {
        $pengajuans = Pengajuan::with('tanggungans.profiles.users')->latest()->paginate(10);
        return view('beasiswa.kelola', [
            'pengajuans' => $pengajuans,
        ]);
    }

    public function perangkingan()
    {
        $pengajuans = Pengajuan::with('tanggungans.profiles')->where('status', 'menunggu keputusan')->orderBy('nilai_akhir', 'desc')->paginate(10);
        return view('beasiswa.rangking', [
            'pengajuans' => $pengajuans,
        ]);
    }

    public function showRangking($id)
    {
        $pengajuan = Pengajuan::with('tanggungans.profiles')->where('id', $id)->first();
        $currentYear = Carbon::now()->year;
        return view('beasiswa.formRangking', [
            'pengajuan' => $pengajuan,
            'currentYear' => $currentYear
        ]);
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with('tanggungans.profiles.users')->where('id', $id)->first();
        $currentYear = Carbon::now()->year;

        return view('beasiswa.formKelola', [
            'pengajuan' => $pengajuan,
            'currentYear' => $currentYear
        ]);
    }

    public function create(CreatePengajuanRequest $request)
    {
        DB::transaction(function () use ($request) {
            if ($request->file('suratPermohonanBeasiswa')) {
                $filePermohonanBeasiswa = $request->file('suratPermohonanBeasiswa');
                $namaFilePermohonanBeasiswa = Str::random(20) . '.' . $filePermohonanBeasiswa->extension();
                $filePermohonanBeasiswa->move('pdf/pengajuan', $namaFilePermohonanBeasiswa);
            }

            if ($request->file('legalisirIjazah')) {
                $fileLegalisirIjazah = $request->file('legalisirIjazah');
                $namaFileLegalisirIjazah = Str::random(20) . '.' . $fileLegalisirIjazah->extension();
                $fileLegalisirIjazah->move('pdf/pengajuan', $namaFileLegalisirIjazah);
            }

            if ($request->file('suratKeteranganPendidikan')) {
                $fileSuratKeteranganPendidikan = $request->file('suratKeteranganPendidikan');
                $namaFileSuratKeteranganPendidikan = Str::random(20) . '.' . $fileSuratKeteranganPendidikan->extension();
                $fileSuratKeteranganPendidikan->move('pdf/pengajuan', $namaFileSuratKeteranganPendidikan);
            }

            $masaKerja = Kriteria::with('subkriterias')->where('nama', 'Masa Kerja')->first();
            $subMasaKerja = $masaKerja->subkriterias;
            switch (true) {
                case $request->masaKerja < 2:
                    $nilaiMasaKerja = $masaKerja->nilai * $subMasaKerja->where('nama', 'Kurang Mendukung')->first()->nilai;
                    break;

                case $request->masaKerja >= 2 && $request->masaKerja < 4:
                    $nilaiMasaKerja = $masaKerja->nilai * $subMasaKerja->where('nama', 'Cukup Mendukung')->first()->nilai;
                    break;

                case $request->masaKerja >= 4 && $request->masaKerja <= 6:
                    $nilaiMasaKerja = $masaKerja->nilai * $subMasaKerja->where('nama', 'Mendukung')->first()->nilai;
                    break;

                default:
                    $nilaiMasaKerja = $masaKerja->nilai * $subMasaKerja->where('nama', 'Sangat Mendukung')->first()->nilai;
                    break;
            }

            $gajiPokok = Kriteria::with('subkriterias')->where('nama', 'Gaji Pokok')->first();
            $subGajiPokok = $gajiPokok->subkriterias;
            switch (true) {
                case $request->gajiPokok < 5000000:
                    $nilaiGajiPokok = $gajiPokok->nilai * $subGajiPokok->where('nama', 'Sangat Mendukung')->first()->nilai;
                    break;

                case $request->gajiPokok >= 5000000 && $request->gajiPokok <= 8000000:
                    $nilaiGajiPokok = $gajiPokok->nilai * $subGajiPokok->where('nama', 'Mendukung')->first()->nilai;
                    break;

                default:
                    $nilaiGajiPokok = $gajiPokok->nilai * $subGajiPokok->where('nama', 'Kurang Mendukung')->first()->nilai;
                    break;
            }

            $tanggungan = Kriteria::with('subkriterias')->where('nama', 'Tanggungan')->first();
            $subTanggungan = $tanggungan->subkriterias;
            switch (true) {
                case $request->jumlahTanggungan < 3:
                    $nilaiTanggungan = $tanggungan->nilai * $subTanggungan->where('nama', 'Kurang Mendukung')->first()->nilai;
                    break;

                case $request->jumlahTanggungan >= 3 && $request->jumlahTanggungan <= 6:
                    $nilaiTanggungan = $tanggungan->nilai * $subTanggungan->where('nama', 'Mendukung')->first()->nilai;
                    break;

                default:
                    $nilaiTanggungan = $tanggungan->nilai * $subTanggungan->where('nama', 'Sangat Mendukung')->first()->nilai;
                    break;
            }

            $pendidikan = Kriteria::with('subkriterias')->where('nama', 'Pendidikan')->first();
            $subPendidikan = $pendidikan->subkriterias;
            switch ($request->jumlahTanggungan) {
                case 'SD':
                    $nilaiPendidikan = $pendidikan->nilai * $subPendidikan->where('nama', 'SD')->first()->nilai;
                    break;

                case 'SMP':
                    $nilaiPendidikan = $pendidikan->nilai * $subPendidikan->where('nama', 'SMP')->first()->nilai;
                    break;

                case 'SMA':
                    $nilaiPendidikan = $pendidikan->nilai * $subPendidikan->where('nama', 'SMA')->first()->nilai;
                    break;

                case 'D3/D4':
                    $nilaiPendidikan = $pendidikan->nilai * $subPendidikan->where('nama', 'D3/D4')->first()->nilai;
                    break;

                default:
                    $nilaiPendidikan = $pendidikan->nilai * $subPendidikan->where('nama', 'S1')->first()->nilai;
                    break;
            }

            $nilai = Kriteria::with('subkriterias')->where('nama', 'Nilai')->first();
            $subNilai = $nilai->subkriterias;
            switch (true) {
                case $request->nilai >= 80 && $request->nilai <= 85:
                    $kriteriaNilai = $nilai->nilai * $subNilai->where('nama', 'Kurang Mendukung')->first()->nilai;
                    break;

                case $request->nilai >= 3.20 && $request->nilai <= 3.50:
                    $kriteriaNilai = $nilai->nilai * $subNilai->where('nama', 'Kurang Mendukung')->first()->nilai;
                    break;

                case $request->nilai >= 86 && $request->nilai <= 90:
                    $kriteriaNilai = $nilai->nilai * $subNilai->where('nama', 'Mendukung')->first()->nilai;
                    break;

                case $request->nilai >= 3.51 && $request->nilai <= 3.80:
                    $kriteriaNilai = $nilai->nilai * $subNilai->where('nama', 'Mendukung')->first()->nilai;
                    break;

                default:
                    $kriteriaNilai = $nilai->nilai * $subNilai->where('nama', 'Sangat Mendukung')->first()->nilai;
                    break;
            }

            $tanggunganModel = Tanggungan::where('nama', $request->namaAnak)->first();
            $tanggunganModel->pengajuans()->create([
                'masa_kerja' => $request->masaKerja,
                'gaji_pokok' => $request->gajiPokok,
                'jumlah_tanggungan' => $request->jumlahTanggungan,
                'nama' => $request->namaAnak,
                'jenjang_pendidikan' => $request->jenjangPendidikan,
                'institusi_pendidikan' => $request->institusiPendidikan,
                'nilai' => $request->nilai,
                'file_nilai' => $namaFileLegalisirIjazah,
                'file_surat_permohonan' => $namaFilePermohonanBeasiswa,
                'file_ket_pendidikan' => $namaFileSuratKeteranganPendidikan,
                'nilai_akhir' => $nilaiMasaKerja + $nilaiGajiPokok + $nilaiTanggungan + $nilaiPendidikan + $kriteriaNilai,
            ]);
        });

        return redirect()->route('beasiswa.tambah')->with('success', 'Data berhasil disimpan');
    }

    public function verifikasi_pengajuan($id, Request $request)
    {
        $pengajuan = Pengajuan::with('tanggungans.profiles')->where('id', $id)->first();
        // dd($pengajuan->nama);
        // $pengajuan = Pengajuan::where('id', $id)->first();
        $pengajuan->status = $request->status;
        $pengajuan->pertimbangan = $request->pertimbangan;

        if ($pengajuan->update()) {
            $user = User::find($pengajuan->tanggungans->profiles->user_id);
            $user->notifications()->create([
                'content' => 'Status pengajuan untuk ' . $pengajuan->nama . ' telah diubah.',
            ]);
            $data = array('name' => $user->profiles->name, 'message' => 'status telah diubah menjadi ', $pengajuan->status);
            //tambah email
            Mail::send('laporan.email_status', ['data' => $data, 'email' => $user], function ($message) use ($user) {
                $message->from(env('MAIL_USERNAME'), 'Notifikasi');
                $message->to($user->email)->subject('Status Notfikasi Update');
            });
            return redirect()->back()->with('success', 'Data berhasil diubah.');
        } else {
            return redirect()->back()->with('error', 'Data tidak berhasil diubah.');
        }
    }

    public function verifikasi_manager($id, Request $request)
    {
        $pengajuan = Pengajuan::with('tanggungans.profiles')->where('id', $id)->first();
        $pengajuan->status = $request->status;
        $pengajuan->pertimbangan = $request->pertimbangan;

        if ($pengajuan->update()) {
            $user = User::find($pengajuan->tanggungans->profiles->user_id);
            $user->notifications()->create([
                'content' => 'Status pengajuan untuk ' . $pengajuan->nama . ' telah diubah.',
            ]);
            $data = array('name' => $user->profiles->name, 'message' => 'status telah diubah menjadi ', $pengajuan->status);

            Mail::send('laporan.email_status', ['data' => $data, 'email' => $user], function ($message) use ($user) {
                $message->from(env('MAIL_USERNAME'), 'Rizki');
                $message->to($user->email)->subject('Status Notfikasi Update');
            });
            return redirect()->back()->with('success', 'Data berhasil diubah.');
        } else {
            return redirect()->back()->with('error', 'Data tidak berhasil diubah.');
        }
    }
    public function laporan()
    {
        $data = Pengajuan::select(DB::raw('YEAR(created_at) year'))->groupBy('year')->orderBy('year', 'desc')->get();
        return view('laporan.index', ['data' => $data]);
    }

    public function download_laporan($year)
    {
        $data =  Pengajuan::with('tanggungans.profiles.tanggungans')->whereYear('created_at', '=', $year)->where('status', 'disetujui')->orderBy('nilai_akhir', 'desc')->get();
        // foreach ($data->tanggungans as $datas) {
        //     dd($datas);
        // }
        // dd($data);
        // return view('laporan.pdf', [
        //     'data' => $data
        // ]);
        $pdf = new Dompdf();
        $html = view('laporan.pdf', [
            'data' => $data,
            'year' => $year,
            'currentDate' => Carbon::now()
        ]);
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        $pdf->stream();
        return redirect()->back()->with('success', 'data berhasil di download');
    }

    public function delete_pengajuan($id)
    {
        $data = Pengajuan::where('id', $id)->first();
        $data->delete();

        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
