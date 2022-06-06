<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function create(CreateNewsRequest $request)
    {
        // dd($request);
        $file_lampiran = "";
        $gambar_header = "";
        if ($request->file('file_lampiran')) {
            $kesehatan = $request->file('file_lampiran');
            $file_lampiran = Str::random(20) . '.' . $kesehatan->extension();
            $kesehatan->move('pdf/pengajuan', $file_lampiran);
        } else {
            $file_lampiran = "image.jpg";
        }

        if ($request->file('gambar_header')) {
            $kesehatan = $request->file('gambar_header');
            $gambar_header = Str::random(20) . '.' . $kesehatan->extension();
            $kesehatan->move('gambar/pengajuan', $gambar_header);
        } else {
            $gambar_header = "image.jpg";
        }

        $news = News::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_lampiran' => $file_lampiran,
            'gambar_header' => $gambar_header
        ]);

        return redirect()->back()->with('success', 'Berita berhasil terbuat');
    }

    public function find()
    {
        $news = News::get();
        return view('berita.posting', compact('news'));
    }

    public function delete(Request $request)
    {
        $news = News::destroy($request->id);

        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }

    public function lihat_berita()
    {
        $berita = News::get();
        return view('berita.lihat', compact('berita'));
    }

    public function download_pdf()
    {
        // $data = News::get();
        // // dd($data);
        // // $pdf = new Dompdf();
        // $html = view('download_pdf', compact('data'));
        // $pdf->loadHtml($html);
        // $pdf->setPaper('A4', 'potrait');
        // $pdf->render();
        // $pdf->stream();
        return redirect()->back()->with('success', 'data berhasil di download');
    }
}
