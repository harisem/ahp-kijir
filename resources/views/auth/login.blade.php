@extends('templates.auth')

@section('content')
<!-- Outer Row -->
@if(Auth::user())
{{redirect()->back()}}
@endif

<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8 col-md-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h5 text-gray-900 mb-4">Selamat Datang di SPK Pengajuan Beasiswa</h1>
                    </div>
                    <form action="{{ route('loginProcess') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nip" id="nip">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="inputPassword">
                            </div>
                        </div>
                        <div class="col-6 mx-auto pl-0">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection