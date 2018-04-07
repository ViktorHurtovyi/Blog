<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryId')->unsigned();
            $table->foreign('categoryId')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('articleId')->unsigned();
            $table->foreign('articleId')
                ->references('id')->on('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('category_articles');
    }
}
