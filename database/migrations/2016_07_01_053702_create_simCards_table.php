<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimCardsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_simso', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('Numphone', 255);
			$table->string('price', 255);
			$table->string('Account', 255);
			$table->boolean('IDsupplier');
			$table->boolean('idUnitPrice');
			$table->boolean('iOrder');
			$table->boolean('iStatus');
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
		Schema::drop('tbl_simso');
	}

}
