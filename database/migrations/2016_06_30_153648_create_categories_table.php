<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_category', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('IDCategory', true);
			$table->string('Categoryname', 255);
			$table->boolean('Parent_id');
			$table->string('Image', 255);
			$table->text('Content');
			$table->integer('iOrder');
			$table->date('Createdate');
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
		Schema::drop('tbl_category');
	}

}
