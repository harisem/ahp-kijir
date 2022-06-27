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
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->year }}</td>
                                <td>Laporan Perangkingan Daftar Pengajuan Beasiswa {{ $d->year }}</td>
                                <td class="text-center">
                                    <a href="{{ route('download_laporan', $d->year) }}" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection