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
        Schema::create('rest_emp', function (Blueprint $table) {
            $table->id('id_rest');
            $table->string('nik', 20);
            $table->string('keluhan', 100);
            $table->string('penanganan', 250);
            $table->date('tgl_rest');
            $table->time('waktu_rest');
            $table->time('waktu_selesai');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->string('deleted_by', 50);
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
        Schema::dropIfExists('rest_emp');
    }
};
