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
        Schema::create('h_stock', function (Blueprint $table) {
            $table->id('id_h_stock');
            $table->bigInteger('id_obat');
            $table->integer('h_stock');
            $table->string('factory', 20);
            $table->date('tgl_in_obat');
            $table->date('tgl_kadaluwarsa');
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
        Schema::dropIfExists('h_stock');
    }
};
