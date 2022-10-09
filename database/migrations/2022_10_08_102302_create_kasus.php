<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_kasus');
            $table->string('deskripsi_kasus');
            $table->string('status_kasus');
            $table->string('Level_kasus');
            $table->string('id_peawai_pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasus');
    }
}
