<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcu', function (Blueprint $table) {
            $table->id('id_mcu');
            $table->string('no_rm', 20);
            $table->integer('nik');
            $table->string('factory', 10);
            $table->date('tgl_pemeriksaan');
            $table->string('jk', 15);
            $table->date('tgl_lahir');
            $table->string('status_gizi',30);
            $table->string('buta_warna',30);
            $table->string('anamnesa',250);
            $table->string('lab_test',999);
            $table->string('radiology_test',250);
            $table->string('saran',8000);
            $table->string('status_kesehatan',100);
            $table->string('dokter',50);
            $table->string('fitness_s',50);
            $table->string('keterangan',5000);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcu');
    }
};
