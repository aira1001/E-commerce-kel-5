<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLetterReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_reservations', function (Blueprint $table) {
            $table->bigIncrements("id_reservasi")->unsigned();
            $table->unsignedBigInteger("id_pelapor");
            $table->timestamp("waktu_kejadian");
            $table->text("tempat_kejadian");
            $table->string("terlapor");
            $table->string("korban");
            $table->text("bagaimana_terjadi");
            $table->timestamp("tgl_lapor")->nullable();
            $table->string("barang_bukti");
            $table->unsignedBigInteger("id_saksi");
            $table->text("uraian_singkat_kejadian");
            $table->boolean("status");
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
        Schema::dropIfExists('template_reservations');
    }
}
