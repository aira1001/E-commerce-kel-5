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
            $table->text("tindak_pidana");
            $table->unsignedBigInteger("id_pra_kasus");
            $table->unsignedBigInteger('id_status_kasus')->nullable();
            $table->unsignedBigInteger('id_pegawai_pic')->nullable();
            $table->unsignedBigInteger("lembaga_pic")->nullable();
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
