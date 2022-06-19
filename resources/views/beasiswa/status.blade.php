@extends('templates.master')

@section('title')
    Status Pengajuan Beasiswa
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Status Pengajuan Beasiswa</h1>

        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                @if ($pengajuans[0] === null)
                    <h5 class="text-center">
                        Belum memiliki pengajuan beasiswa.
                    </h5>
                @else
                    <div class="table-responsive text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
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
                                @foreach ($pengajuans as $p)
                                    <tr>
                                        <td>{{ date('Y', strtotime($p->created_at)) }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->jenjang_pendidikan }}</td>
                                        <td>{{ $p->institusi_pendidikan }}</td>
                                        <td>{{ $p->nilai }}</td>
                                        <td>
                                            <a href="{{ asset('pdf/pengajuan/' . $p->file_surat_permohonan) }}" target="_blank">File</a>
                                        </td>
                                        <td>
                                            <a href="{{ asset('pdf/pengajuan/' . $p->file_nilai) }}" target="_blank">File</a>
                                        </td>
                                        <td>
                                            <a href="{{ asset('pdf/pengajuan/' . $p->file_ket_pendidikan) }}" target="_blank">File</a>
                                        </td>
                                        <td>{{ Str::ucfirst($p->status) }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection