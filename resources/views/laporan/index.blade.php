@extends('templates.master')

@section('title')
    Laporan
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800 text-center">Laporan perangkingan daftar pengajuan beasiswa</h1>

        <div class="card shadow col-sm-8 mb-4 mt-4 mx-auto">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022</td>
                                <td>Laporan Perangkingan Daftar Pengajuan Beasiswa 2022</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info">Lihat</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2021</td>
                                <td>Laporan Perangkingan Daftar Pengajuan Beasiswa 2021</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info">Lihat</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2020</td>
                                <td>Laporan Perangkingan Daftar Pengajuan Beasiswa 2020</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info">Lihat</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection