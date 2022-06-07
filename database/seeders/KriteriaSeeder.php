<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            [
                'name' => 'Masa Kerja',
                'nilai' => 0.4624
            ],
            [
                'name' => 'Gaji Pokok',
                'nilai' => 0.1951
            ],
            [
                'name' => 'Tanggungan',
                'nilai' => 0.1951
            ],
            [
                'name' => 'Pendidikan',
                'nilai' => 0.0737
            ],
            [
                'name' => 'Nilai',
                'nilai' => 0.0737
            ],
        ];

        foreach ($kriteria as $k) {
            Kriteria::create([
                'nama' => $k['name'],
                'nilai' => $k['nilai'],
            ]);
        }
    }
}
