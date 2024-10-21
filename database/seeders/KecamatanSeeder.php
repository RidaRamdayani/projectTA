<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kecamatans')->insert([
            ['kecamatan' => 'Batu Ampar'],
            ['kecamatan' => 'Kuala Mandor B'],
            ['kecamatan' => 'Kubu'],
            ['kecamatan' => 'Rasau Jaya'],
            ['kecamatan' => 'Sungai Ambawang'],
            ['kecamatan' => 'Sungai Raya'],
            ['kecamatan' => 'Teluk Pakedai'],
            ['kecamatan' => 'Terentang'],
            ['kecamatan' => 'Sungai Kakap']
        ]);
    }
}
