<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddForeignKeyToKasusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kasus', function (Blueprint $table) {
            $table->foreign("id_status_kasus")->references("id")->on("status_kasus");
            $table->foreign("id_pegawai_pic")->references("id")->on("pegawai");
            $table->foreign("lembaga_pic")->references("id_lembaga")->on("lembaga_kepolisians");
            $table->foreign("id_reservasi")->references("id_reservasi")->on("kasus_reservations");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kasus', function (Blueprint $table) {
            //
        });
    }
}
