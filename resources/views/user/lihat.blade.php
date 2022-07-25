@extends('templates.master')

@section('title')
Kelola Akun Pengguna
@endsection

@section('content')
<div class="container-fluid">
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
    <div class="card">
        <div class="card-header bg-white text-center">
            <h3>Kelola Akun Pengguna</h3>
        </div>
        <div class="card-body">
            <div class="row flex-nowrap">
                <div class="col-4 my-auto">
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2014/04/02/10/25/man-303792_960_720.png" class="rounded-circle mb-2" style="height: 250px" alt="...">
                        <h4 class="m-2 text-dark">{{ $users['user']->name }}</h4>
                        <h5 class="text-black-50">{{ $users['user']->jabatan }}</h5>
                        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#tambahPengguna">Tambah Pengguna</button>
                    </div>
                </div>
                <div class="vr"></div>
                <div class="col-4">
                    <div class="mb-3">
                        <form action="{{ route('user.lihat') }}" method="GET" class="row" id="selectForm">
                            <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                            <div class="col-sm-7">
                                <select name="id" id="id" class="custom-select" aria-label="Default select example" onchange="selected()">
                                    <option value="{{ $users['user']->users->nip }}" selected>{{ $users['user']->users->nip }}</option>
                                    @foreach ($users['all'] as $u)
                                    @if ($u->users->id !== Auth::id())
                                    <option value="{{ $u->users->nip }}">{{ $u->users->nip }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <form action="">
                        <div class="mb-3 row">
                            <label for="tanggal-lahir" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="tanggal-lahir" value="{{ date('d F Y', strtotime($users['user']->tanggal_lahir)) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal-bergabung" class="col-sm-5 col-form-label">Tanggal Bergabung</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="tanggal-bergabung" value="{{ date('d F Y', strtotime($users['user']->created_at)) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gaji-pokok" class="col-sm-5 col-form-label">Gaji pokok</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="gaji-pokok" value="Rp. {{ number_format($users['user']->gaji_pokok, 0, ',', '.') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="emailUser" class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="emailUser" value="{{ $users['user']->users->email }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="level-akun" class="col-sm-5 col-form-label">Level Akun</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="level-akun" value="{{ $users['user']->jabatan }}">
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
                        @if (count($users['user']->tanggungans) === 0)
                        <h6 class="h5">Belum ada tanggungan</h6>
                        @else
                        <h6 class="h5">Daftar Tanggungan</h6>
                        @endif
                    </div>
                    @if (count($users['user']->tanggungans) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($users['user']->tanggungans as $t)
                            <tr>
                                <td>{{ $t->nama }}</td>
                                <td>{{ date('d M Y', strtotime($t->tanggal_lahir)) }}</td>
                                <td>{{ Str::ucfirst($t->status_keluarga) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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
                <form action="{{ route('user.tambah') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nipBaru" class="col-sm-5 col-form-label">NIP</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nipBaru" id="nipBaru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="namaBaru" class="col-sm-5 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="namaBaru" id="namaBaru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jabatanBaru" class="col-sm-5 col-form-label">Jabatan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="jabatanBaru" id="jabatanBaru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tglLahirBaru" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            <div class="input-group date" id="datepicker2">
                                <input type="text" class="form-control" name="tglLahirBaru" id="tglLahirBaru">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tglBergabungBaru" class="col-sm-5 col-form-label">Tanggal Bergabung</label>
                        <div class="col-sm-7">
                            <div class="input-group date" id="datepicker3">
                                <input type="text" class="form-control" name="tglBergabungBaru" id="tglBergabungBaru">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gajiPokokBaru" class="col-sm-5 col-form-label">Gaji Pokok</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="gajiPokokBaru" id="gajiPokokBaru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="levelAkunBaru" class="col-sm-5 col-form-label">Level Akun</label>
                        <div class="col-sm-7">
                            <select name="levelAkunBaru" id="levelAkunBaru" class="custom-select" aria-label="Default select example">
                                <option value="" selected disabled>Silahkan pilih level akun...</option>
                                <option value="manager">manager</option>
                                <option value="staff ti">staff ti</option>
                                <option value="staff sdm">staff sdm</option>
                                <option value="karyawan">karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="emailBaru" class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="emailBaru" id="emailBaru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="passwordBaru" class="col-sm-5 col-form-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="passwordBaru" id="passwordBaru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="konfirmPasswordBaru" class="col-sm-5 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="konfirmPasswordBaru" id="konfirmPasswordBaru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="formFileBaru" class="col-sm-5 col-form-label">Foto Profil</label>
                        <div class="col-sm-7">
                            <input class="custom-file" type="file" name="formFileBaru" id="formFileBaru">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                <form method="POST" action="{{ route('user.ubahData', $users['user']->users->id) }}">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nip" id="nip" value="{{ $users['user']->users->nip }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-5 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ $users['user']->name }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-5 col-form-label">Jabatan</label>
                        <div class="col-sm-7">
                            <select name="jabatan" id="jabatan" class="custom-select" aria-label="Default select example">
                                <option value="{{ $users['user']->jabatan }}">{{ $users['user']->jabatan }}</option>
                                <option value="Staff SDM" @if($users['user']->jabatan === 'Staff SDM') style="display: none" @endif>Staff SDM</option>
                                <option value="Staff TI" @if($users['user']->jabatan === 'Staff TI') style="display: none" @endif>Staff TI</option>
                                <option value="Karyawan" @if($users['user']->jabatan === 'Karyawan') style="display: none" @endif>Karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ date('m/d/Y', strtotime($users['user']->tanggal_lahir)) }}">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_bergabung" class="col-sm-5 col-form-label">Tanggal Bergabung</label>
                        <div class="col-sm-7">
                            <div class="input-group date" id="datepicker1">
                                <input type="text" class="form-control" name="tanggal_bergabung" id="tanggal_bergabung" value="{{ date('m/d/Y', strtotime($users['user']->users->created_at)) }}">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gaji_pokok" class="col-sm-5 col-form-label">Gaji Pokok</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" value="{{ $users['user']->gaji_pokok }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="level_akun" class="col-sm-5 col-form-label">Level Akun</label>
                        <div class="col-sm-7">
                            <select name="level_akun" id="level_akun" class="custom-select" aria-label="Default select example">
                                <option value="{{ $users['user']->users->level_akun }}">{{ $users['user']->users->level_akun }}</option>
                                <option value="manager" @if($users['user']->users->level_akun === 'manager') style="display: none" @endif>manager</option>
                                <option value="staff ti" @if($users['user']->users->level_akun === 'staff ti') style="display: none" @endif>staff ti</option>
                                <option value="staff sdm" @if($users['user']->users->level_akun === 'staff sdm') style="display: none" @endif>staff sdm</option>
                                <option value="karyawan" @if($users['user']->users->level_akun === 'karyawan') style="display: none" @endif>karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" id="email" value="{{ $users['user']->users->email }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-5 col-form-label">Password Saat ini</label>
                        <div class="col-sm-7">
                            <input id="current-password" type="password" class="form-control" name="current-password">


                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-5 col-form-label">Password Baru</label>
                        <div class="col-sm-7">
                            <input id="new-password" type="password" class="form-control" name="new-password">


                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-5 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-7">
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation">

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto_profil" class="col-sm-5 col-form-label">Foto Profil</label>
                        <div class="col-sm-7">
                            <input class="custom-file" type="file" name="foto_profil" id="foto_profil">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
        $('#datepicker2').datepicker();
        $('#datepicker3').datepicker();
    });
</script>
<script>
    function selected() {
        document.getElementById('selectForm').submit();
    }
</script>
@endpush