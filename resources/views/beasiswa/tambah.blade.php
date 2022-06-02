@extends('templates.master')

@section('title')
    Tambah Pengajuan Bantuan Beasiswa
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tambah Pengajuan Bantuan Beasiswa</h1>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Data Karyawan
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3 row">
                                <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nip" placeholder="192039482618">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaUser" class="col-sm-5 col-form-label">Nama User</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="namaUser" placeholder="Nama User">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="masaKerja" class="col-sm-5 col-form-label">Masa Kerja</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="masaKerja" placeholder="4 Tahun">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gajiPokok" class="col-sm-5 col-form-label">Gaji Pokok</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="gajiPokok" placeholder="Rp. 5.000.000">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jumlahTanggungan" class="col-sm-5 col-form-label">Jumlah Tanggungan</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="jumlahTanggungan" placeholder="2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="suratPermohonanBeasiswa" class="col-sm-5 col-form-label">Surat Permohonan Beasiswa</label>
                                <div class="col-sm-7">
                                    <input class="custom-file" type="file" id="suratPermohonanBeasiswa">
                                </div>
                            </div>
                            <div class="text-right mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Data Anak
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3 row">
                                <label for="namaAnak" class="col-sm-5 col-form-label">Nama Anak</label>
                                <div class="col-sm-7">
                                    <select name="namaAnak" id="namaAnak" class="custom-select" aria-label="Default select example">
                                    <option selected>Bima Satria</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenjangPendidikan" class="col-sm-5 col-form-label">Jenjang Pendidikan</label>
                                <div class="col-sm-7">
                                    <select name="jenjangPendidikan" id="jenjangPendidikan" class="custom-select" aria-label="Default select example">
                                    <option selected>SD</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="institusiPendidikan" class="col-sm-5 col-form-label">Institusi Pendidikan</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="institusiPendidikan" placeholder="SDN Pekayon 14">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nilai" class="col-sm-5 col-form-label">Nilai</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nilai" placeholder="85.50">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="legalisirIjazah" class="col-sm-5 col-form-label">Legalisir Ijazah</label>
                                <div class="col-sm-7">
                                    <input class="custom-file" type="file" id="legalisirIjazah">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="suratKeteranganPendidikan" class="col-sm-5 col-form-label">Surat Keterangan Pendidikan</label>
                                <div class="col-sm-7">
                                    <input class="custom-file" type="file" id="suratKeteranganPendidikan">
                                </div>
                            </div>
                            <div class="text-right mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection