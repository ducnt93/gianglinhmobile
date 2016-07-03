<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_order', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id', 255);
			$table->integer('Sex');
			$table->string('firstname', 255);
			$table->string('Companyname', 255);
			$table->string('Address1', 255);
			$table->string('phone', 255);
			$table->string('City', 255);
			$table->string('Zipcode', 255);
			$table->string('Email', 255);
			$table->string('Receiptaddress', 255);
			$table->string('Receiptname', 255);
			$table->string('Receiptemail', 255);
			$table->string('Receiptphone', 255);
			$table->string('Receiptcity', 255);
			$table->date('Datedelivery');
			$table->string('Payment', 255);
			$table->float('Total', 20, 2);
			$table->text('Content');
			$table->date('Orderdate');
			$table->integer('Orderstatus');
			$table->integer('iStatus');
			$table->string('lastname', 255);
			$table->string('address2', 255);
			$table->integer('typecustomer');
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
		Schema::drop('tbl_order');
	}

}
