@extends('templates.master')

@section('title')
    Status Pengajuan Beasiswa
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Status Pengajuan Beasiswa</h1>

        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Pengajuan</th>
                                <th>Tahun</th>
                                <th>Nama Anak</th>
                                <th>Pendidikan</th>
                                <th>Instansi Pendidikan</th>
                                <th>Nilai</th>
                                <th>Surat Permohonan</th>
                                <th>Legalisir Nilai</th>
                                <th>Surat Ket. Pendidikan</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BEA0001</td>
                                <td>2022</td>
                                <td>Bima Satria Putra</td>
                                <td>SD</td>
                                <td>SDN Pekayon 14</td>
                                <td>85.50</td>
                                <td class="text-info">File</td>
                                <td class="text-info">File</td>
                                <td class="text-info">File</td>
                                <td>Belum Diproses</td>
                                <td>
                                    <button type="button" class="btn btn-primary">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection