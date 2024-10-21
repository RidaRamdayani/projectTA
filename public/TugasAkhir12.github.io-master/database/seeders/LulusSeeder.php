<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LulusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('luluses')->insert([
            'nama' => 'Yogi Restu Dwi Prasetyo',
            'jeniskelamin' => 'laki-laki',
            'keterangan' => 'Lulus',
        ]);
    }
}
