<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetaniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petanis')->insert([
        'periode_id' => '2',
        'kecamatan_id' => '1',
        'desa_id' => '1',
        'komoditi_id' => '1',
        'petani' => '0',
        ]);
    }
}
