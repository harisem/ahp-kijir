@extends('templates.master')

@section('title')
    Perangkingan Beasiswa
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Perangkingan Beasiswa</h1>

    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <form action="{{ route('beasiswa.verifikasi', $pengajuan->id) }}" method="POST" class="row mb-3">
                @csrf
                <div class="row">
                    <div class="mb-2 col-md-6 row">
                        <label for="nip" class="col-sm-6 col-form-label">NIP</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="nip" value="{{ $pengajuan->tanggungans->profiles->users->nip }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="namaAnak" class="col-sm-6 col-form-label">Nama Anak</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="namaAnak" value="{{ $pengajuan->nama }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="nama" class="col-sm-6 col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="nama" value="{{ $pengajuan->tanggungans->profiles->name }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="jenjangPendidikan" class="col-sm-6 col-form-label">Jenjang Pendidikan</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="jenjangPendidikan" value="{{ $pengajuan->jenjang_pendidikan }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="masaKerja" class="col-sm-6 col-form-label">Masa Kerja</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="masaKerja" value="{{ $currentYear - date('Y', strtotime($pengajuan->tanggungans->profiles->mulai_kerja)) }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="institusiPendidikan" class="col-sm-6 col-form-label">Institusi Pendidikan</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="institusiPendidikan" value="{{ $pengajuan->institusi_pendidikan }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="gajiPokok" class="col-sm-6 col-form-label">Gaji Pokok</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="gajiPokok" value="{{ $pengajuan->tanggungans->profiles->gaji_pokok }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="nilai" class="col-sm-6 col-form-label">Nilai</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="nilai" value="{{ $pengajuan->nilai }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="jumlahTanggungan" class="col-sm-6 col-form-label">Jumlah Tanggungan</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="jumlahTanggungan" value="{{ $pengajuan->jumlah_tanggungan }}">
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="berkasNilai" class="col-sm-6 col-form-label">Berkas Nilai</label>
                        <div class="col-sm-6 my-auto">
                            <a href="{{ asset('pdf/pengajuan/' . $pengajuan->file_nilai) }}" target="_blank">File</a>
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="permohonanBeasiswa" class="col-sm-6 col-form-label">Surat Permohonan Beasiswa</label>
                        <div class="col-sm-6 my-auto">
                            <a href="{{ asset('pdf/pengajuan/' . $pengajuan->file_surat_permohonan) }}" target="_blank">File</a>
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="keteranganPendidikan" class="col-sm-6 col-form-label">Surat Keterangan Pendidikan</label>
                        <div class="col-sm-6 my-auto">
                            <a href="{{ asset('pdf/pengajuan/' . $pengajuan->file_ket_pendidikan) }}" target="_blank">File</a>
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="status" class="col-sm-6 col-form-label">Ubah Status Pengajuan</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="custom-select" aria-label="Default select example">
                                <option value="{{ $pengajuan->status }}" selected>{{ Str::ucfirst($pengajuan->status) }}</option>
                                <option value="disetujui">Disetujui</option>
                                <option value="tidak disetujui">Tidak Disetujui</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 row">
                        <label for="pertimbangan" class="col-sm-6 form-label">Pertimbangan Penerimaan Beasiswa</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="pertimbangan" id="pertimbangan" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mx-auto">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Verifikasi Modal -->

<!-- End of Verifikasi Modal -->
@endsection

@push('css')
<style>
    .vr {
        border-left: 2px solid gray;
    }
</style>
@endpush