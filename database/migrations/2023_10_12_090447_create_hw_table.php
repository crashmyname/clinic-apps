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
        Schema::create('hw', function (Blueprint $table) {
            $table->id('id_hw');
            $table->integer('nik');
            $table->string('nama',75);
            $table->string('section',75);
            $table->date('tanggal');
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
        Schema::dropIfExists('hw');
    }
};
