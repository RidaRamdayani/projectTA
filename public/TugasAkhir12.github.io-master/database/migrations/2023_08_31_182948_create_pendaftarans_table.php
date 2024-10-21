<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('namasiswa');
            $table->enum('jeniskelaminsiswa', ['laki-laki', 'perempuan']);  
            $table->string('tempatlahirsiswa');          
            $table->date('tanggallahirsiswa');
            $table->enum('agamasiswa', ['islam', 'protestan', 'hindu', 'buddha', 'katolik']);
            $table->enum('golongandarahsiswa', ['a','o','ab']);
            $table->enum('anakke_siswa', ['1','2','3','4','5','6']);
            $table->enum('darisaudara_siswa', ['1bersaudara','2bersaudara','3bersaudara','4bersaudara','5bersaudara','6bersaudara']);
            $table->enum('statusdalamkeluarga', ['anakkandung','anaktiri','anakangkat']); 
            $table->string('alamatsiswa');
            $table->enum('rtsiswa', ['1','2','3','4','5','6']);
            $table->enum('rwsiswa', ['1','2','3','4','5','6']);
            $table->enum('kewarganegaraan', ['wni','wna']);
            $table->string('namaayah');
            $table->string('namaibu');
            $table->string('alamatorangtua');
            $table->enum('rtortu', ['1','2','3','4','5','6']);
            $table->enum('rwortu', ['1','2','3','4','5','6']);
            $table->enum('agamaayah', ['islam', 'protestan', 'hindu', 'buddha', 'katolik']);
            $table->integer('nohp_ortu');
            $table->enum('pekerjaanayah', ['petani','dokter','buruh','wiraswasta','polri','tni','pilot','pns','pengusaha','lainnya']);
            $table->enum('pekerjaanibu', ['petani','dokter','buruh','wiraswasta','polri','tni','pilot','pns','pengusaha','lainnya']);
            $table->enum('penghasilanortu', ['< Rp.1.000.000', 'Rp.1.000.000 - Rp.2.000.000','Rp.2.000.000 - Rp.3.000.000','Rp.3.000.000 - Rp.4.000.000', '> Rp.5.000.000'])->nullable();
            $table->string('namawali');
            $table->enum('agamawali', ['islam', 'protestan', 'hindu', 'buddha', 'katolik']);
            $table->string('alamatwali');
            $table->enum('rtwali', ['1','2','3','4','5','6']);
            $table->enum('rwwali', ['1','2','3','4','5','6']);
            $table->integer('nohp_wali');
            $table->enum('pekerjaanwali', ['petani','dokter','buruh','wiraswasta','polri','tni','pilot','pns','pengusaha','lainnya']);
            $table->string('jarak');
            $table->string('penyakityangpernahdiderita');
            $table->string('alergiterhadap');
            $table->enum('pernahbelajar', ['pernah','tidakpernah']);
            $table->enum('tahunlulus', ['2020','2021','2022','2023']);
            $table->string('noijazah');
            $table->string('cita_cita');
            $table->string('hobi_anak');
            $table->enum('pernerimabantuan', ['ya','tidak']);
            $table->string('nomorbantuan');
            $table->string('makananyangtidakdisukai');
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
        Schema::dropIfExists('pendaftarans');
    }
}
