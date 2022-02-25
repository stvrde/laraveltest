<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatchUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_user',function(Blueprint $table){
            $table->integer('match_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->integer('saves')->default(0);
            $table->string('team')->default("");

            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Schema::dropIfExists('match_user');
    }
}
