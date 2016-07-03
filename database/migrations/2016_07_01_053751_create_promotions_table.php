<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_promotion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('Proname', 255);
			$table->string('Image', 255);
			$table->float('Price', 10, 2);
			$table->boolean('idUnitPrice');
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
		Schema::drop('tbl_promotion');
	}

}
