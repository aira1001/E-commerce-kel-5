<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddForeignKeyToPelaporFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelapor_file', function (Blueprint $table) {
            $table->foreign("id_kasus")->references("id_pra_kasus")->on("pra_kasus");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelapor_file', function (Blueprint $table) {
            //
        });
    }
}
