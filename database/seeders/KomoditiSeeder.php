<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomoditiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komoditis')->insert([
            ['komoditi' => 'Karet'],
            ['komoditi' => 'Kelapa Dalam'],
            ['komoditi' => 'Kelapa Hybrida'],
            ['komoditi' => 'Kelapa Deres'],
            ['komoditi' => 'Kelapa Sawit'],
            ['komoditi' => 'Kakao'],
            ['komoditi' => 'Lada'],
            ['komoditi' => 'Kopi'],
            ['komoditi' => 'Pinang'],
            ['komoditi' => 'Sagu']
        ]);
    }
}
