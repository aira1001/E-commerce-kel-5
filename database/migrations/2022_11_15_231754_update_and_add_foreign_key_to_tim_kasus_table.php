<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddForeignKeyToTimKasusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tim_kasus', function (Blueprint $table) {
            $table->foreign("pegawai_id")->references("id")->on("pegawai");
            $table->foreign('kasus_id')->references('id')->on('kasus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tim_kasus', function (Blueprint $table) {
            //
        });
    }
}
