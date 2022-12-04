<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporanKasus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporan_kasus', function (Blueprint $table) {
            $table->bigIncrements('id_pelaporan')->unsigned();
            $table->unsignedBigInteger('id_kasus');
            $table->string('perihal')->nullable();
            $table->string('deskripsi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelapor_kasues');
    }
}
