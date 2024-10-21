<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropNotifikasisTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('notifikasis');
    }

public function down()
    {
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('desa_id');
            $table->text('pesan');
            $table->timestamps();
        });
    }
}
