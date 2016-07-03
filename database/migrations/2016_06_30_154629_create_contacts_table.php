<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_contact', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('IDContact', true);
			$table->string('Contactname', 255);
			$table->string('Companyname', 255);
			$table->string('Zipcode', 255);
			$table->string('City', 255);
			$table->string('Address', 255);
			$table->string('Telephone', 255);
			$table->string('Subject', 255);
			$table->string('Email', 255);
			$table->text('Content');
			$table->date('Createdate');
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
		Schema::drop('tbl_contact');
	}

}
