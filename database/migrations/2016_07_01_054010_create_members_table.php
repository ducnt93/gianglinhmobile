<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_member', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('Email', 255);
			$table->string('Username', 255);
			$table->string('Password', 255);
			$table->integer('Sex');
			$table->string('Firstname', 255);
			$table->string('Lastname', 255);
			$table->string('Address1', 255);
			$table->string('Address2', 255);
			$table->string('Telephone', 255);
			$table->string('Companyname', 255);
			$table->string('IDCity', 255);
			$table->string('Zipcode', 255);
			$table->boolean('iSame');
			$table->date('Createdate');
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
		Schema::drop('tbl_member');
	}

}
