@extends('templates.master')

@section('title')
Posting Berita Beasiswa
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Posting Berita Beasiswa</h1>
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
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>File Lampiran</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach($news as $new)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$new->judul}}</td>
                            <td>{{$new->file_lampiran()}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Berita</a>
        </div>
    </div>
</div>

<!-- Tambah Berita Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="exampleModalLabel">Tambah Berita Beasiswa</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> --}}
            </div>
            <div class="modal-body">
                <form action="{{route('berita.news')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul" id="judul">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea name="deskripsi" name="deskripsi" id="deskripsi" class="form-control" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fileLampiran" class="col-sm-3 col-form-label">File Lampiran</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="file_lampiran" type="file" id="fileLampiran">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gambarHeader" class="col-sm-3 col-form-label">Gambar Header</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="gambar_header" type="file" id="gambarHeader">
                        </div>
                    </div>
                    {{-- <div class="mb-3 row">
                            <label for="berkasNilai" class="col-sm-3 col-form-label">Berkas Nilai</label>
                            <div class="col-sm-9">
                                <div class="custom-file col-sm-8">
                                    <input class="custom-file-input" type="file" id="berkasNilai">
                                    <label for="berkasNilai" class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                        </div> --}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="submit" />
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End of Tambah Berita Modal -->
@endsection