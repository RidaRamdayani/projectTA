<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLuasTanamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luas_tanamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('tahuns')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('komoditi_id')->constrained('komoditis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('luas_tanaman_muda');
            $table->string('luas_tanaman_menghasilkan');
            $table->string('luas_tanaman_tua');
            $table->double('jumlah');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luas_tanamans');
    }
}
