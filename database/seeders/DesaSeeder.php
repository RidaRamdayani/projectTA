<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desas')->insert([
            'kecamatan_id' => '1',
            'desa' => 'Tanjung Harapan',
        ]);
    }
}
