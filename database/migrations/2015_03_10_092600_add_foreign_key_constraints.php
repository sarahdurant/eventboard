<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyConstraints extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function($table) {
            $table->foreign('organizerID')->references('id')->on('users');
        });

        Schema::table('eventtags', function($table) {
            $table->foreign('eventID')->references('id')->on('events');
            $table->foreign('tagID')->references('id')->on('tags');
        });

        Schema::table('subscriptions', function($table) {
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('eventID')->references('id')->on('events');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('events', function($table) {
            $table->dropForeign('events_organizerid_foreign');
        });

        Schema::table('eventtags', function($table) {
            $table->dropForeign('eventtags_eventid_foreign');
            $table->dropForeign('eventtags_tagid_foreign');
        });

        Schema::table('subscriptions', function($table) {
            $table->dropForeign('subscriptions_userid_foreign');
            $table->dropForeign('subscriptions_eventid_foreign');
        });
	}

}
