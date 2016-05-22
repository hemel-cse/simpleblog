<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('page', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('user_id')->unsigned();
                    $table->string('title');
                    $table->string('slug');
                    $table->text('body');
                    $table->timestamps();
                    $table->timestamp('published_at');

                    $table->foreign('user_id')
                          ->references('id')
                          ->on('users')
                          ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('page');
    }
}