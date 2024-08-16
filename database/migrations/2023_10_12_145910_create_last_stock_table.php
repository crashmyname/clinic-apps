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
        Schema::create('last_stock', function (Blueprint $table) {
            $table->id('id_l_stock');
            $table->integer('id_obat');
            $table->string('bulan',25);
            $table->integer('last_stock');
            $table->timestamp('tgl_generate')->nullable();
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
        Schema::dropIfExists('last_stock');
    }
};
