<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFqsasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_fqas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('IDfqa', true);
			$table->string('Fullname', 255);
			$table->string('Title', 255);
			$table->string('Content', 255);
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
		Schema::drop('tbl_fqas');
	}

}
