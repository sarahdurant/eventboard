<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventtagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventtags', function(Blueprint $table)
		{
			$table->integer('eventID')->unsigned();
            $table->integer('tagID')->unsigned();
            $table->primary(['eventID', 'tagID']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eventtags');
	}

}
