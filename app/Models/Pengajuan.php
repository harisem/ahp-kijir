<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggungan_id',
        'masa_kerja',
        'gaji_pokok',
        'jumlah_tanggungan',
        'nama',
        'jenjang_pendidikan',
        'institusi_pendidikan',
        'nilai',
        'file_nilai',
        'file_surat_permohonan',
        'file_ket_pendidikan',
        'nilai_akhir',
        'status',
    ];

    public function tanggungans()
    {
        return $this->belongsTo('App\Models\Tanggungan', 'tanggungan_id');
    }
}
