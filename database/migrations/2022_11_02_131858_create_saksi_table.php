<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saksi', function (Blueprint $table) {
            $table->bigIncrements("id_saksi")->unsigned();
            $table->unsignedBigInteger("id_pra_kasus")->default(1);
            $table->string("nama")->default("joni");
            $table->integer("umur")->default(20);
            $table->string("asal")->default("jakarta");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saksis');
    }
}
