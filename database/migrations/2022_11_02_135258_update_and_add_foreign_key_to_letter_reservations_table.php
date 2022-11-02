<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddForeignKeyToLetterReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('letter_reservations', function (Blueprint $table) {
            $table->foreign("id_pelapor")->references("id_masyarakat")->on("masyarakats");
            $table->foreign("id_saksi")->references("id_saksi")->on("saksis");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('letter_reservations', function (Blueprint $table) {
            //
        });
    }
}
