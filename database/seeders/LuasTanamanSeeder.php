<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LuasTanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodeId = 2;
        $kecamatanId = 1;
        $desaId = 1;
        $komoditiId = 1;
        $luasTanamanMuda = 0;
        $luasTanamanMenghasilkan = 0;
        $luasTanamanTua = 0;
        $jumlah = (double) $luasTanamanMuda + (double) $luasTanamanMenghasilkan + (double) $luasTanamanTua;

        DB::table('luas_tanamans')->insert([
            'periode_id' => $periodeId,
            'kecamatan_id' => $kecamatanId,
            'desa_id' => $desaId,
            'komoditi_id' => $komoditiId,
            'luas_tanaman_muda' => $luasTanamanMuda,
            'luas_tanaman_menghasilkan' => $luasTanamanMenghasilkan,
            'luas_tanaman_tua' => $luasTanamanTua,
            'jumlah' => $jumlah,
        ]);

    }
}
