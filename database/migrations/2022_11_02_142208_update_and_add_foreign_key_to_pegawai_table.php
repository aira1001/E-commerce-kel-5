<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddForeignKeyToPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign("id_lembaga")->references("id_lembaga")->on("lembaga_kepolisian");
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            $table->foreign('id_pangkat')->references('id_pangkat')->on('pangkat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            //
        });
    }
}
