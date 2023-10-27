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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_p');
            $table->integer('nik');
            $table->string('nama',100);
            $table->string('kode_section',50);
            $table->string('keluhan',150);
            $table->integer('jumlah');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('created_by',35);
            $table->string('updated_by',35);
            $table->string('deleted_by',35);
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
        Schema::dropIfExists('peminjaman');
    }
};
