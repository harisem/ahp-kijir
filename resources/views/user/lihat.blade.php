@extends('templates.master')

@section('title')
    Kelola Akun Pengguna
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-white text-center">
                <h3>Kelola Akun Pengguna</h3>
            </div>
            <div class="card-body">
                <div class="row flex-nowrap">
                    <div class="col-4 my-auto">
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2014/04/02/10/25/man-303792_960_720.png" class="rounded-circle mb-2" style="height: 250px" alt="...">
                            <h4 class="m-2 text-dark">Nama User</h4>
                            <h5 class="text-black-50">Jabatan</h5>
                            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#tambahPengguna">Tambah Pengguna</button>
                        </div>
                    </div>
                    <div class="vr"></div>
                    <div class="col-4">
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                            <div class="col-sm-7">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>1920394826182673</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <form action="">
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
                                <label for="email" class="col-sm-5 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" id="email" value="email@example.com">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="level-akun" class="col-sm-5 col-form-label">Level Akun</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="level-akun" value="Karyawan">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubahData">Ubah Data</button>
                                <button type="submit" class="btn btn-warning">Hapus</button>
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

    <!-- Modal Tambah Pengguna -->
    <div class="modal fade" id="tambahPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLabel">Tambah Pengguna</h5>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nip">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-5 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jabatan" class="col-sm-5 col-form-label">Jabatan</label>
                            <div class="col-sm-7">
                                <select name="jabatan" id="jabatan" class="custom-select" aria-label="Default select example">
                                    <option selected>Staff QHSE</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kk" class="col-sm-5 col-form-label">No KK</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="kk">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tglLahir" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-7">
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" name="tglLahir" id="tglLahir">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white">
                                            <i class="fas fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tglBergabung" class="col-sm-5 col-form-label">Tanggal Bergabung</label>
                            <div class="col-sm-7">
                                <div class="input-group date" id="datepicker1">
                                    <input type="text" class="form-control" name="tglBergabung" id="tglBergabung">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white">
                                            <i class="fas fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gajiPokok" class="col-sm-5 col-form-label">Gaji Pokok</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="gajiPokok">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="levelAkun" class="col-sm-5 col-form-label">Level Akun</label>
                            <div class="col-sm-7">
                                <select name="levelAkun" id="levelAkun" class="custom-select" aria-label="Default select example">
                                    <option selected>Karyawan</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-5 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="konfirmPassword" class="col-sm-5 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="konfirmPassword">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="formFile" class="col-sm-5 col-form-label">Foto Profil</label>
                            <div class="col-sm-7">
                                <input class="custom-file" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Tambah Pengguna -->

    <!-- Modal Ubah Data -->
    <div class="modal fade" id="ubahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLabel">Ubah Data Pengguna</h5>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nip">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-5 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jabatan" class="col-sm-5 col-form-label">Jabatan</label>
                            <div class="col-sm-7">
                                <select name="jabatan" id="jabatan" class="custom-select" aria-label="Default select example">
                                    <option selected>Staff QHSE</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kk" class="col-sm-5 col-form-label">No KK</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="kk">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tglLahir" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-7">
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" name="tglLahir" id="tglLahir">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white">
                                            <i class="fas fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tglBergabung" class="col-sm-5 col-form-label">Tanggal Bergabung</label>
                            <div class="col-sm-7">
                                <div class="input-group date" id="datepicker1">
                                    <input type="text" class="form-control" name="tglBergabung" id="tglBergabung">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white">
                                            <i class="fas fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gajiPokok" class="col-sm-5 col-form-label">Gaji Pokok</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="gajiPokok">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="levelAkun" class="col-sm-5 col-form-label">Level Akun</label>
                            <div class="col-sm-7">
                                <select name="levelAkun" id="levelAkun" class="custom-select" aria-label="Default select example">
                                    <option selected>Karyawan</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-5 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="konfirmPassword" class="col-sm-5 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="konfirmPassword">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="formFile" class="col-sm-5 col-form-label">Foto Profil</label>
                            <div class="col-sm-7">
                                <input class="custom-file" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Ubah Data -->
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .vr {
            border-left: 2px solid gray;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
            $('#datepicker1').datepicker();
        });
    </script>
@endpush