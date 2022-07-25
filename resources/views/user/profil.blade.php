@extends('templates.master')

@section('title')
Profil
@endsection

@section('content')
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
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row flex-nowrap">
                <div class="col-4 my-auto">
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2014/04/02/10/25/man-303792_960_720.png" class="rounded-circle mb-2" style="height: 250px" alt="...">
                        <h4 class="m-2 text-dark">{{ $profile->name }}</h4>
                        <h5 class="text-black-50">{{ $profile->jabatan }}</h5>
                    </div>
                </div>
                <div class="vr"></div>
                <div class="col-4">
                    <form action="{{route('user.update_profile_sendiri')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <h3 class="h2">Profil Pengguna</h3>
                        </div>
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="nip" value="{{ $profile->users->nip }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal-lahir" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="tanggal-lahir" value="{{ date('d F Y', strtotime($profile->tanggal_lahir)) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal-bergabung" class="col-sm-5 col-form-label">Tanggal Bergabung</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="tanggal-bergabung" value="{{ date('d F Y', strtotime($profile->users->created_at)) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gaji-pokok" class="col-sm-5 col-form-label">Gaji pokok</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="gaji-pokok" value="{{ $profile->gaji_pokok }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="level-akun" class="col-sm-5 col-form-label">Level Akun</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="level-akun" value="{{ $profile->users->level_akun }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" name="email" class="form-control" id="email" value="{{ $profile->users->email }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-5 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" name="current-password" class="form-control" id="password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="konfirm-password" class="col-sm-5 col-form-label">Password Baru Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="new-password" id="konfirm-password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="konfirm-password" class="col-sm-5 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-7">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation">
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
                        @if (count($profile->tanggungans) === 0)
                        <h6 class="h5">Belum ada tanggungan</h6>
                        @else
                        <h6 class="h5">Daftar Tanggungan</h6>
                        @endif
                    </div>
                    @if (count($profile->tanggungans) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($profile->tanggungans as $t)
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
@endsection

@push('css')
<style>
    .vr {
        border-left: 2px solid gray;
    }
</style>
@endpush