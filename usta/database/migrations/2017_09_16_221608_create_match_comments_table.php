<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('match_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->longtext('content');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_comments');
    }
}
