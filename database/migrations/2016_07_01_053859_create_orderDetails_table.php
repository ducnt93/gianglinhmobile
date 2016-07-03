<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_orderdetail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id', 255);
			$table->bigInteger('IDProduct');
			$table->integer('Quantity');
			$table->float('Price', 20, 2);
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
		Schema::drop('tbl_orderdetail');
	}

}
