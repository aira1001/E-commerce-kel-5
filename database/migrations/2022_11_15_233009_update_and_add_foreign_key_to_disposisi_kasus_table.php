<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddForeignKeyToDisposisiKasusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disposisi_kasus', function (Blueprint $table) {
            $table->foreign('id_pegawai')->references('id')->on("pegawai");
            $table->foreign('id_perintah_disposisi')->references('id_perintah')->on('perintah_disposisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disposisi_kasus', function (Blueprint $table) {
            //
        });
    }
}
