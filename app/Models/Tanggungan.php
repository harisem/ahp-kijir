<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'nik',
        'nama',
        'tanggal_lahir',
        'status_keluarga',
    ];

    public function pengajuans()
    {
        return $this->hasOne('App\Models\Pengajuan');
    }

    public function profiles()
    {
        return $this->belongsTo('App\Models\Profile', 'profile_id');
    }
}
