<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gurus')->insert([
            'nama'=> 'Yogi Restu Dwi Prasetyo',
            'nip' => '3202015060',
            'jabatan' => 'Guru Bahasa Inggris',
            'jeniskelamin' => 'perempuan'
        ]);
    }
}
