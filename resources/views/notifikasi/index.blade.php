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
                            @if (count($notifications) !== 0)
                                @foreach ($notifications as $n)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($n->created_at)) }}</td>
                                        <td>{{ $n->content }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">Tidak ada notifikasi.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection