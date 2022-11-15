<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraKasusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pra_kasus', function (Blueprint $table) {
            $table->bigIncrements("id_pra_kasus")->unsigned();
            $table->unsignedBigInteger("id_pelapor")->default(1);
            $table->string("judul_kasus");
            $table->timestamp("waktu_kejadian");
            $table->text("tempat_kejadian");
            $table->string("terlapor");
            $table->string("korban");
            $table->text("bagaimana_terjadi");
            $table->string("barang_bukti")->default("barang bukti 1");
            // $table->unsignedBigInteger("id_saksi")->default(1);
            $table->text("uraian_singkat_kejadian")->nullable();
            $table->boolean("status")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasus_reservations');
    }
}
