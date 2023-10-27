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
        Schema::table('pemakaian', function (Blueprint $table) {
            // $table->string('nik');
            // $table->string('created_by')->nullable();
            // $table->string('updated_by')->nullable();
            // $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemakaian', function (Blueprint $table) {
            // $table->string('nik');
            // $table->string('created_by')->nullable();
            // $table->string('updated_by')->nullable();
            // $table->string('deleted_by')->nullable();
        });
    }
};
