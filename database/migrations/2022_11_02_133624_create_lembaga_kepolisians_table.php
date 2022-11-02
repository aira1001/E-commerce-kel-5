<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembagaKepolisiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembaga_kepolisians', function (Blueprint $table) {
            $table->bigIncrements("id_lembaga")->unsigned();
            $table->string("nama_lembaga");
            $table->string("kepala_lembaga");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lembaga_kepolisians');
    }
}
