<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembagaKepolisianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembaga_kepolisian', function (Blueprint $table) {
            $table->bigIncrements("id_lembaga")->unsigned();
            $table->string("nama_lembaga");
            $table->string("kepala_lembaga");
            $table->unsignedBigInteger('id_user')->nullable();
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
