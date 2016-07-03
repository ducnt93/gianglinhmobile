<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcessoriesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_accessory', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('IDaccessory', true);
			$table->string('Accessoryname', 255);
			$table->string('Image', 255);
			$table->string('Price', 255);
			$table->boolean('idUnitPrice');
			$table->boolean('IDtypeaccessory');
			$table->text('Content');
			$table->integer('iStatus');
			$table->integer('iOrder');
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
		Schema::drop('tbl_accessory');
	}

}
