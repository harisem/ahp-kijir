<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'tanggal_lahir',
        'mulai_kerja',
        'gaji_pokok',
        'foto_profil',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
