<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('media_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->longtext('content');

            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
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
        Schema::dropIfExists('media_comments');
    }
}
