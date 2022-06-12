@extends('templates.master')

@section('title')
Perangkingan Beasiswa
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Perangkingan Beasiswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Rangking</th>
                            <th>Nama Karyawan</th>
                            <th>Nama Anak</th>
                            <th>Masa Kerja</th>
                            <th>Gaji Pokok</th>
                            <th>Tanggungan</th>
                            <th>Pendidikan</th>
                            <th>Nilai</th>
                            <th>Nilai Akhir</th>
                            <th>Pertimbangan Tambahan</th>
                            <th>Status Pengajuan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuans as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->tanggungans->profiles->name }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->masa_kerja }}</td>
                            <td>{{ 'Rp. ' . number_format($p->gaji_pokok, 2, ',', '.') }}</td>
                            <td>{{ $p->jumlah_tanggungan }}</td>
                            <td>{{ $p->jenjang_pendidikan }}</td>
                            <td>{{ $p->nilai }}</td>
                            <td>{{ $p->nilai_akhir }}</td>
                            <td>{{ $p->pertimbangan }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                <a href="{{ route('beasiswa.formRangking', $p->id) }}" class="btn btn-sm btn-primary">Ubah Keputusan</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection