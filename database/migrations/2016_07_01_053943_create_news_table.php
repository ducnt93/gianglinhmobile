<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('Title', 255);
			$table->string('Image', 255);
			$table->string('Summary', 255);
			$table->date('datepost');
			$table->text('Content');
			$table->integer('Type');
			$table->boolean('iOrder');
			$table->integer('iStatus');
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
		Schema::drop('tbl_news');
	}

}
