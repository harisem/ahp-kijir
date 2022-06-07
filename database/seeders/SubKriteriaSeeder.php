<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subkriteria1 = [
            [
                'name' => 'Sangat Mendukung',
                'nilai' => 0.467
            ],
            [
                'name' => 'Mendukung',
                'nilai' => 0.277
            ],
            [
                'name' => 'Cukup Mendukung',
                'nilai' => 0.16
            ],
            [
                'name' => 'Kurang Mendukung',
                'nilai' => 0.095
            ],
        ];

        $subkriteria2 = [
            [
                'name' => 'Sangat Mendukung',
                'nilai' => 0.54
            ],
            [
                'name' => 'Mendukung',
                'nilai' => 0.297
            ],
            [
                'name' => 'Kurang Mendukung',
                'nilai' => 0.163
            ],
        ];

        $subkriteria3 = [
            [
                'name' => 'Sangat Mendukung',
                'nilai' => 0.54
            ],
            [
                'name' => 'Mendukung',
                'nilai' => 0.297
            ],
            [
                'name' => 'Cukup Mendukung',
                'nilai' => 0.163
            ],
        ];

        $subkriteria4 = [
            [
                'name' => 'S1',
                'nilai' => 0.286
            ],
            [
                'name' => 'D3/D4',
                'nilai' => 0.286
            ],
            [
                'name' => 'SMA',
                'nilai' => 0.143
            ],
            [
                'name' => 'SMP',
                'nilai' => 0.143
            ],
            [
                'name' => 'SD',
                'nilai' => 0.143
            ],
        ];

        $subkriteria5 = [
            [
                'name' => 'Sangat Mendukung',
                'nilai' => 0.413
            ],
            [
                'name' => 'Mendukung',
                'nilai' => 0.327
            ],
            [
                'name' => 'Cukup Mendukung',
                'nilai' => 0.26
            ],
        ];

        $kriteria1 = Kriteria::find(1);
        $kriteria2 = Kriteria::find(2);
        $kriteria3 = Kriteria::find(3);
        $kriteria4 = Kriteria::find(4);
        $kriteria5 = Kriteria::find(5);

        foreach ($subkriteria1 as $k1) {
            $kriteria1->subkriterias()->create([
                'nama' => $k1['name'],
                'nilai' => $k1['nilai']
            ]);
        }

        foreach ($subkriteria2 as $k2) {
            $kriteria2->subkriterias()->create([
                'nama' => $k2['name'],
                'nilai' => $k2['nilai']
            ]);
        }

        foreach ($subkriteria3 as $k3) {
            $kriteria3->subkriterias()->create([
                'nama' => $k3['name'],
                'nilai' => $k3['nilai']
            ]);
        }

        foreach ($subkriteria4 as $k4) {
            $kriteria4->subkriterias()->create([
                'nama' => $k4['name'],
                'nilai' => $k4['nilai']
            ]);
        }

        foreach ($subkriteria5 as $k5) {
            $kriteria5->subkriterias()->create([
                'nama' => $k5['name'],
                'nilai' => $k5['nilai']
            ]);
        }
    }
}
