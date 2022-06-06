<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_lampiran',
        'gambar_header'
    ];

    public function file_lampiran()
    {
        return asset('pdf/pengajuan/' . $this->file_lampiran);
    }

    public function gambar()
    {
        return asset('gambar/pengajuan/' . $this->gambar_header);
    }
}
