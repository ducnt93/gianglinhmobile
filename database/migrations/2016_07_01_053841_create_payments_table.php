<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_payment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('id');
			$table->string('PaymentName', 255);
			$table->string('AccountID', 255);
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
		Schema::drop('tbl_payment');
	}

}
