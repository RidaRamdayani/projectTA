<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KepalasekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kepalasekolahs')->insert([
            'foto'=> 'images/kepalasekolah.png',
            'jabatan' => 'Guru Bahasa Inggris',
            'keterangan' => 'Halo saya kepala sekolah',
        ]);
    }
}
