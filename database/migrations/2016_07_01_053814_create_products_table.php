<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('Itemcode', 255);
			$table->string('ProductName', 255);
			$table->string('IDCategory', 255);
			$table->string('Price', 255);
			$table->boolean('idUnitPrice');
			$table->string('Image', 255);
			$table->text('Content');
			$table->text('Keyword');
			$table->string('Band', 255);
			$table->string('Language', 255);
			$table->string('Colour', 255);
			$table->string('Size', 255);
			$table->string('Weight', 255);
			$table->string('Typedisplay', 255);
			$table->string('Sizedisplay', 255);
			$table->text('Contentdisplay');
			$table->string('Type', 255);
			$table->string('Downloadmusic', 255);
			$table->boolean('Ring');
			$table->string('Directory', 255);
			$table->string('Memory', 255);
			$table->boolean('Cardmemory');
			$table->text('Contentmemory');
			$table->text('Contentring');
			$table->string('GPRS', 255);
			$table->boolean('HSCSD');
			$table->boolean('EDGE');
			$table->boolean('3G');
			$table->string('WLAN', 255);
			$table->boolean('Bluetooth');
			$table->boolean('Infrared');
			$table->string('USB', 255);
			$table->string('OperSystem', 255);
			$table->string('Messages', 255);
			$table->boolean('Clock');
			$table->boolean('Alarmclock');
			$table->boolean('FMradio');
			$table->string('Game', 255);
			$table->string('Approval', 255);
			$table->boolean('Java');
			$table->string('Camera', 255);
			$table->string('Video', 255);
			$table->string('Record', 255);
			$table->string('Music', 255);
			$table->string('Film', 255);
			$table->boolean('Recordcall');
			$table->boolean('Spearkout');
			$table->text('Contentparti');
			$table->string('Typebattery', 255);
			$table->string('Waittime', 255);
			$table->string('Timecall', 255);
			$table->string('Warranty', 255);
			$table->boolean('ProSpecial');
			$table->date('Fromday');
			$table->date('Today');
			$table->boolean('iPromotion');
			$table->text('Contentpromotion');
			$table->boolean('IDTypeproduct');
			$table->boolean('iCounter');
			$table->integer('iOrder');
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
		Schema::drop('tbl_products');
	}

}
