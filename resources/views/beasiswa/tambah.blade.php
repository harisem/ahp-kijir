@extends('templates.master')

@section('title')
    Tambah Pengajuan Bantuan Beasiswa
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tambah Pengajuan Bantuan Beasiswa</h1>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('beasiswa.pengajuan') }}" method="POST" class="col-12" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Data Karyawan
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaKaryawan" class="col-sm-5 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="namaKaryawan" id="namaKaryawan" placeholder="Nama Karyawan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="masaKerja" class="col-sm-5 col-form-label">Masa Kerja</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="masaKerja" id="masaKerja" placeholder="Masa Kerja">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gajiPokok" class="col-sm-5 col-form-label">Gaji Pokok</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="gajiPokok" id="gajiPokok" placeholder="Gaji Pokok">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jumlahTanggungan" class="col-sm-5 col-form-label">Jumlah Tanggungan</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="jumlahTanggungan" id="jumlahTanggungan" placeholder="Jumlah Tanggungan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="suratPermohonanBeasiswa" class="col-sm-5 col-form-label">Surat Permohonan Beasiswa</label>
                                <div class="col-sm-7">
                                    <input class="custom-file" type="file" name="suratPermohonanBeasiswa" id="suratPermohonanBeasiswa">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Data Anak
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="namaAnak" class="col-sm-5 col-form-label">Nama Anak</label>
                                <div class="col-sm-7">
                                    <input type="text" name="namaAnak" id="namaAnak" class="form-control" placeholder="Nama Anak">
                                    {{-- <select name="namaAnak" id="namaAnak" class="custom-select" aria-label="Default select example">
                                        <option selected>Bima Satria</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select> --}}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenjangPendidikan" class="col-sm-5 col-form-label">Jenjang Pendidikan</label>
                                <div class="col-sm-7">
                                    <select name="jenjangPendidikan" id="jenjangPendidikan" class="custom-select" aria-label="Default select example">
                                    <option selected>Pilih jenjang pendidikan...</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D3/D4">D3/D4</option>
                                    <option value="S1">S1</option>
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="institusiPendidikan" class="col-sm-5 col-form-label">Institusi Pendidikan</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="institusiPendidikan" id="institusiPendidikan" placeholder="Institusi Pendidikan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nilai" class="col-sm-5 col-form-label">Nilai</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="nilai" id="nilai" placeholder="Nilai">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="legalisirIjazah" class="col-sm-5 col-form-label">Legalisir Ijazah</label>
                                <div class="col-sm-7">
                                    <input class="custom-file" type="file" name="legalisirIjazah" id="legalisirIjazah">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="suratKeteranganPendidikan" class="col-sm-5 col-form-label">Surat Keterangan Pendidikan</label>
                                <div class="col-sm-7">
                                    <input class="custom-file" type="file" name="suratKeteranganPendidikan" id="suratKeteranganPendidikan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection