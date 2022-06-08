@extends('templates.master')

@section('title')
Kelola Pengajuan Beasiswa
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Kelola Pengajuan Beasiswa</h1>

    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <form action="" class="mb-3 col-md-6">
                <div class="row flex-nowrap">
                    <label for="" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-3">
                        <select class="custom-select" aria-label="Default select example">
                            <option value="2022" selected>2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>
                    <div class="vr"></div>
                    <label for="" class="col-sm-3 col-form-label">Status Pengajuan</label>
                    <div class="col-sm-4">
                        <select class="custom-select" aria-label="Default select example">
                            <option value="0" selected>Belum Disetujui</option>
                            <option value="1">Disetujui</option>
                        </select>
                    </div>
                    <div class="vr"></div>
                    <button type="submit" class="btn btn-sm btn-primary ml-2">Cari</button>
                </div>
            </form>
            <div class="table-responsive text-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Nama Anak</th>
                            <th>Pendidikan</th>
                            <th>Instansi Pendidikan</th>
                            <th>Nilai</th>
                            <th>Surat Permohonan</th>
                            <th>Legalisir Nilai</th>
                            <th>Surat Ket. Pendidikan</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuans as $p)
                        <tr>
                            <td>{{ date('Y', strtotime($p->created_at)) }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->jenjang_pendidikan }}</td>
                            <td>{{ $p->institusi_pendidikan }}</td>
                            <td>{{ $p->nilai }}</td>
                            <td>
                                <a href="{{ asset('pdf/pengajuan/' . $p->file_surat_permohonan) }}" target="_blank">File</a>
                            </td>
                            <td>
                                <a href="{{ asset('pdf/pengajuan/' . $p->file_nilai) }}" target="_blank">File</a>
                            </td>
                            <td>
                                <a href="{{ asset('pdf/pengajuan/' . $p->file_ket_pendidikan) }}" target="_blank">File</a>
                            </td>
                            <td>{{ Str::ucfirst($p->status) }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifikasi">Verifikasi</button>
                                    <a href="#" class="btn btn-warning">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="verifikasiLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mx-auto" id="verifikasiLabel">Verifikasi Pengajuan Beasiswa</h5>
                                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> --}}
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('beasiswa.verifikasi',$p->id)}}" method="POST">
                                            @csrf
                                            <div class="mb-2 row">
                                                <label for="nip" class="col-sm-6 col-form-label">NIP</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="nip" value="1920394826182673">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="nama" class="col-sm-6 col-form-label">Nama</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="nama" value="Nama User">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="masaKerja" class="col-sm-6 col-form-label">Masa Kerja</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="masaKerja" value="4 Tahun">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="gajiPokok" class="col-sm-6 col-form-label">Gaji Pokok</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="gajiPokok" value="Rp. 5.000.000">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="jumlahTanggungan" class="col-sm-6 col-form-label">Jumlah Tanggungan</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="jumlahTanggungan" value="2">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="namaAnak" class="col-sm-6 col-form-label">Nama Anak</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="namaAnak" value="Bima Satria">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="jenjangPendidikan" class="col-sm-6 col-form-label">Jenjang Pendidikan</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="jenjangPendidikan" value="SD">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="institusiPendidikan" class="col-sm-6 col-form-label">Institusi Pendidikan</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="institusiPendidikan" value="SDN Pekayon 14">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="nilai" class="col-sm-6 col-form-label">Nilai</label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control" id="nilai" value="85.50">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="berkasNilai" class="col-sm-6 col-form-label">Berkas Nilai</label>
                                                <div class="col-sm-6 my-auto">
                                                    <a href="#">File</a>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="permohonanBeasiswa" class="col-sm-6 col-form-label">Surat Permohonan Beasiswa</label>
                                                <div class="col-sm-6 my-auto">
                                                    <a href="#">File</a>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="keteranganPendidikan" class="col-sm-6 col-form-label">Surat Keterangan Pendidikan</label>
                                                <div class="col-sm-6 my-auto">
                                                    <a href="#">File</a>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="status" class="col-sm-6 col-form-label">Ubah Status Pengajuan</label>
                                                <div class="col-sm-6">
                                                    <select name="status" id="status" class="custom-select" aria-label="Default select example">
                                                        <option value="menunggu konfirmasi" selected>Menunggu Keputusan</option>
                                                        <option value="1">Disetujui</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
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