@extends('templates.master')

@section('title')
    Kelola Tanggungan
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Kelola Tanggungan</h1>

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

        <div class="mb-3">
            <form action="{{ route('user.tanggungan') }}" method="GET" class="row ml-1">
                <div class="col-sm-3">
                    <select name="id" id="id" class="custom-select" aria-label="Default select example">
                        <option value="{{ $profiles['profile']->users->nip }}" selected>{{ $profiles['profile']->users->nip .' - ' . $profiles['profile']->name }} @if($profiles['profile']->users->id === Auth::id()) (Anda) @endif</option>
                        @foreach ($profiles['all'] as $p)
                            @if ($p->users->nip !== $profiles['profile']->users->nip)
                                <option value="{{ $p->users->nip }}">{{ $p->users->nip . ' - ' . $p->name }} @if($p->users->id === Auth::id()) (Anda) @endif</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahTanggungan">Tambah Tanggungan</button>
                </div>
            </form>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    @if (empty($profiles['profile']))
                    <h6 class="text-center">Silahkan pilih user</h6>
                    @else
                        @if (count($profiles['profile']->tanggungans) === 0)
                            <h6 class="text-center">@if($profiles['profile']->users->id === Auth::id()) Anda @else {{ $profiles['profile']->name }} @endif belum memiliki tanggungan.</h6>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($profiles['profile']->tanggungans as $t)
                                        <tr>
                                            <td>{{ $t->nama }}</td>
                                            <td>{{ date('d M Y', strtotime($t->tanggal_lahir)) }}</td>
                                            <td>{{ Str::ucfirst($t->status_keluarga) }}</td>
                                            <td>
                                                <form action="{{ route('user.hapusTanggungan', $t->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-warning">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Tanggungan -->
    <div class="modal fade" id="tambahTanggungan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLabel">Tambah Tanggungan</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.tambahTanggungan') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" id="nip" name="nip" class="form-control" value="{{ $profiles['profile']->users->nip }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nik" id="nik">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tglLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
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
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="custom-select" aria-label="Default select example">
                                    <option value="anak" selected>Anak</option>
                                    <option value="suami">Suami</option>
                                    <option value="istri">Istri</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Tambah Tanggungan -->
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endpush