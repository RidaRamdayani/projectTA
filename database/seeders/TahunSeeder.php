<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tahuns')->insert([
            ['periode' => '2021-01-01'],
            ['periode' => '2022-01-01']
        ]);
    }
}
