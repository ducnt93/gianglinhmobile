<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusLoginsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_statuslogin', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id', 255);
			$table->string('ip', 255);
			$table->string('email', 255);
			$table->string('password', 255);
			$table->string('logintime', 255);
			$table->string('logouttime', 255);
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
		Schema::drop('tbl_statuslogin');
	}

}
