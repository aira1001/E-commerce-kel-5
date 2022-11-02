<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddForeignKeyToLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log', function (Blueprint $table) {
            $table->foreign("id_kasus")->references("id")->on("kasus");
            $table->foreign("id_aktifitas")->references("id")->on("activities");
            $table->foreign("id_user")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log', function (Blueprint $table) {
            //
        });
    }
}
