<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSumberGambarToGejalas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gejalas', function (Blueprint $table) {
            $table->MediumText('sumber_gambar')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gejalas', function (Blueprint $table) {
            $table->dropColumn('sumber_gambar'); 
        });
    }
}
