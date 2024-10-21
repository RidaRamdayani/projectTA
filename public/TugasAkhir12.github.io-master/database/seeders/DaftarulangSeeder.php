<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarulangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftarulangs')->insert([
            'nama'=> 'Yogi Restu Dwi Prasetyo',
            'jeniskelamin' => 'laki-laki',
            'kelas' => '5',
            'biaya' => '550.000'
        ]);
    }
}
