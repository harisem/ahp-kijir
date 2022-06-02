@extends('templates.master')

@section('title')
    Posting Berita Beasiswa
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Posting Berita Beasiswa</h1>

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
                            <tr>
                                <td>1</td>
                                <td>Pembukaan Bantuan Beasiswa 2022</td>
                                <td>File</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pengumuman Daftar Penerima Bantuan Beasiswa 2021</td>
                                <td>File</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pembukaan Bantuan Beasiswa 2021</td>
                                <td>File</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary">Hapus</button>
                                </td>
                            </tr>
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
                    <form action="">
                        <div class="mb-3 row">
                            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fileLampiran" class="col-sm-3 col-form-label">File Lampiran</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" id="fileLampiran">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gambarHeader" class="col-sm-3 col-form-label">Gambar Header</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" id="gambarHeader">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Tambah Berita Modal -->
@endsection