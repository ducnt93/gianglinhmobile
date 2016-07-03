<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoSpplierTypesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_infosupplier_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('Name', 255);
			$table->boolean('iStatus');
			$table->integer('IDsupplier');
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
		Schema::drop('tbl_infosupplier_type');
	}

}
