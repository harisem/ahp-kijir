@extends('templates.master')

@section('title')
    Notifikasi
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Notifikasi</h1>

        <div class="card shadow col-sm-8 mb-4 mt-4">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Notifikasi</th>
                                <th>Notifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>14/02/2022 17:30:28</td>
                                <td>Status Pengajuan Beasiswa telah diperbarui.</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>10/02/2022 10:20:18</td>
                                <td>Ada berita terbaru terkait pengajuan beasiswa.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection