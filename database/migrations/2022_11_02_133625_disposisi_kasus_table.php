<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DisposisiKasusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_kasus', function (Blueprint $table) {
            $table->bigIncrements('id_disposisi');
            $table->unsignedBigInteger('id_kasus');
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->string('catatan');
            $table->unsignedBigInteger('id_perintah_disposisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisi_kasus');
    }
}
