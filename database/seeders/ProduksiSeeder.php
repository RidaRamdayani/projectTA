<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduksiSeeder extends Seeder
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
         $produksi = 0;
         $luasTanamanMenghasilkan = DB::table('luas_tanamans')
                                    ->where('periode_id', $periodeId)
                                    ->where('kecamatan_id', $kecamatanId)
                                    ->where('desa_id', $desaId)
                                    ->where('komoditi_id', $komoditiId)
                                    ->value('luas_tanaman_menghasilkan'); 

         //  untuk menghindari pembagian dengan nol
         if ($luasTanamanMenghasilkan != 0) {
             $ratarata = ($produksi * 1000) / $luasTanamanMenghasilkan;
         } else {
             $ratarata = 0;
         }
 
         DB::table('produksis')->insert([
             'periode_id' => $periodeId,
             'kecamatan_id' => $kecamatanId,
             'desa_id' => $desaId,
             'komoditi_id' => $komoditiId,
             'produksi' => $produksi,
             'rata_rata' => $ratarata,
         ]);
     }
 }

