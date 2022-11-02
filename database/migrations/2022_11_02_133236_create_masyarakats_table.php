<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasyarakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masyarakats', function (Blueprint $table) {
            $table->bigIncrements("id_masyarakat")->unsigned();
            $table->string("nama_lengkap");
            $table->date("tgl_lahir");
            $table->bigInteger("nik");
            $table->string("asal");
            $table->string("agama");
            $table->string("kewarganegraan");
            $table->text("alamat");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masyarakats');
    }
}
