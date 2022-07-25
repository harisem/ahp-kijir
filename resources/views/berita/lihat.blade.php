@extends('templates.master')

@section('title')
Berita Beasiswa
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Berita Beasiswa</h1>

    <div class="card shadow mb-4 mt-4">
        @foreach($berita->sortByDesc('created_at') as $news)
        <div class="card-body">
            <h4 class="card-title text-center">{{$news->judul}}</h4>
            <figcaption class="text-center blockquote-footer">
                {{$news->created_at}}
            </figcaption>
            <div class="text-center">
                <img src="{{$news->gambar()}}" class="img-fluid card-img-top p-2" alt="Responsive Image">
                <p class="card-text text-justify p-2">
                    {{$news->deskripsi}}
                </p>
            </div>
            <a href="{{$news->file_lampiran()}}" class="btn btn-primary">Unduh File Lampiran</a>
        </div>
        @endforeach
    </div>
</div>
@endsection