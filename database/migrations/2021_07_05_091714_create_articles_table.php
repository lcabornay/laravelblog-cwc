<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('update_user_id');
            $table->unsignedBigInteger('article_category_id');
            $table->string('title');
            $table->string('slug');
            $table->text('contents');
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('update_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('article_category_id')
                ->references('id')
                ->on('article_categories')
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
        Schema::dropIfExists('articles');
    }
}
