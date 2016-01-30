<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('title');
            $table->string('alias')->unique();
            $table->text('description');
            $table->timestamps();
            $table->boolean('all_pages');
            $table->text('article_content');
            $table->softDeletes();

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->integer('modified_by')->unsigned();
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade');

            $table->integer('article_content_area_id')->unsigned();
            $table->foreign('article_content_area_id')->references('id')->on('content_areas')->onDelete('cascade');

            $table->integer('article_page_id')->unsigned();
            $table->foreign('article_page_id')->references('id')->on('pages')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
