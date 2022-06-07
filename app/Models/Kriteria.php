<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriterias';

    protected $fillable = [
        'nama',
        'nilai',
    ];

    public function subkriterias()
    {
        return $this->hasMany('App\Models\SubKriteria');
    }
}
