<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_supplier', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('Suppliername', 255);
			$table->string('Image', 255);
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
		Schema::drop('tbl_supplier');
	}

}
