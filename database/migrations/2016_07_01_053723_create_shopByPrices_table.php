<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopByPricesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_shopbyprice', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('name', 255);
			$table->float('fromprice', 10, 2);
			$table->float('toprice', 10, 2);
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
		Schema::drop('tbl_shopbyprice');
	}

}
