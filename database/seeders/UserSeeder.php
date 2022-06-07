<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = User::create([
            'nip' => '1923456789',
            'email' => 'manager@email.com',
            'level_akun' => 'manager',
            'password' => bcrypt('manager123')
        ]);

        $staffTi = User::create([
            'nip' => '1987623598',
            'email' => 'staff.ti@email.com',
            'level_akun' => 'staff ti',
            'password' => bcrypt('staffti123')
        ]);

        $staffSdm = User::create([
            'nip' => '1909678726',
            'email' => 'staff.sdm@email.com',
            'level_akun' => 'staff sdm',
            'password' => bcrypt('staffsdm123')
        ]);

        $karyawan = User::create([
            'nip' => '1927634976',
            'email' => 'karyawan@email.com',
            'level_akun' => 'karyawan',
            'password' => bcrypt('karyawan123')
        ]);

        $manager->profiles()->create([
            'name' => 'Mr. Manager',
            'jabatan' => 'Manager Biro SDM & TI',
            'tanggal_lahir' => Carbon::create(1979, 10, 1),
            'mulai_kerja' => Carbon::create(2014, 2, 21),
            'gaji_pokok' => '15000000'
        ]);

        $staffTi->profiles()->create([
            'name' => 'Mr. TI',
            'jabatan' => 'Staff TI',
            'tanggal_lahir' => Carbon::create(1982, 7, 1),
            'mulai_kerja' => Carbon::create(2015, 6, 5),
            'gaji_pokok' => '7000000'
        ]);

        $staffSdm->profiles()->create([
            'name' => 'Mr. SDM',
            'jabatan' => 'Staff SDM',
            'tanggal_lahir' => Carbon::create(1985, 3, 15),
            'mulai_kerja' => Carbon::create(2015, 12, 1),
            'gaji_pokok' => '6000000'
        ]);

        $karyawan->profiles()->create([
            'name' => 'Mr. Karyawan',
            'jabatan' => 'Karyawan',
            'tanggal_lahir' => Carbon::create(1990, 9, 15),
            'mulai_kerja' => Carbon::create(2018, 1, 28),
            'gaji_pokok' => '4500000'
        ]);
    }
}
