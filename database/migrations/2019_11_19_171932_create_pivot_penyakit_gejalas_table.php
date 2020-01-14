<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotPenyakitGejalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_penyakit_gejalas', function (Blueprint $table) {
            $table->unsignedBigInteger('penyakit_id')->nullable();
            $table->unsignedBigInteger('gejala_id')->nullable();
            $table->float('densitas');
            $table->foreign('penyakit_id')->references('id')->on('penyakits')
            ->onDelete('cascade');
            $table->foreign('gejala_id')->references('id')->on('gejalas')
            ->onDelete('cascade');

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
        Schema::dropIfExists('pivot_penyakit_gejalas');
    }
}
