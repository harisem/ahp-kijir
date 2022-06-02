@extends('templates.master')

@section('title')
    Profil
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row flex-nowrap">
                    <div class="col-4 my-auto">
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2014/04/02/10/25/man-303792_960_720.png" class="rounded-circle mb-2" style="height: 250px" alt="...">
                            <h4 class="m-2 text-dark">Nama User</h4>
                            <h5 class="text-black-50">Jabatan</h5>
                        </div>
                    </div>
                    <div class="vr"></div>
                    <div class="col-4">
                        <form action="">
                            <div class="mb-3">
                                <h3 class="h2">Profil Pengguna</h3>
                            </div>
                            <div class="mb-3 row">
                                <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="nip" value="1920394826182673">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal-lahir" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="tanggal-lahir" value="31 Maret 1995">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal-bergabung" class="col-sm-5 col-form-label">Tanggal Bergabung</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="tanggal-bergabung" value="1 Februari 2018">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gaji-pokok" class="col-sm-5 col-form-label">Gaji pokok</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="gaji-pokok" value="Rp. 5.000.000">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="level-akun" class="col-sm-5 col-form-label">Level Akun</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="level-akun" value="Karyawan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-5 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" id="email" value="email@example.com">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-5 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" id="password">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="konfirm-password" class="col-sm-5 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" id="konfirm-password">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="vr"></div>
                    <div class="col-4 my-auto">
                        <div class="text-center mb-3">
                            <h6 class="h5">Daftar Tanggungan</h6>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <td>Anisa</td>
                                    <td>20 Maret 1995</td>
                                    <td>Istri</td>
                                </tr>
                                <tr>
                                    <td>Bima Satria Putra</td>
                                    <td>20 Maret 2015</td>
                                    <td>Anak</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .vr {
            border-left: 2px solid gray;
        }
    </style>
@endpush