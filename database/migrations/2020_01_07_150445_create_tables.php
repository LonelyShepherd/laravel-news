<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('news_description');
            $table->string('news_link', 191)->default('');
            $table->string('news_title', 191)->default('');
            $table->integer('num_upvotes')->default(0);
            $table->timestamps();
        });

        Schema::create('news_comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->string('username', 191);
            $table->string('comment_text', 191);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
        Schema::dropIfExists('news_comment');
    }
}
