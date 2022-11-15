<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddForeignKeyToPraKasusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pra_kasus', function (Blueprint $table) {
            // $table->foreign("id_pelapor")->references("id_masyarakat")->on("masyarakats"); //kalo login pake foreign key ini
            $table->foreign("id_pelapor")->references("id_pelapor")->on("pelapor_kasus");
            // $table->foreign("id_saksi")->references("id_saksi")->on("saksis"); // kasus_reservation ke saksi one to many
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
