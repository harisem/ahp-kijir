<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriterias';

    protected $fillable = [
        'kriteria_id',
        'nama',
        'nilai',
    ];

    public function kriterias()
    {
        return $this->belongsTo('App\Models\Kriteria');
    }
}
