<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notificatin_setting');
			$table->text('about_app');
			$table->string('phone');
			$table->string('email');
			$table->text('fb_link')->nullable();
			$table->string('tw_link')->nullable();
			$table->string('yoytube_link')->nullable();
			$table->string('ins_link')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}