<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientableTable extends Migration {

	public function up()
	{
		Schema::create('clientable', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('notification_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->enum('is_read', array(''));
			$table->integer('clientable_id');
			$table->string('clientable_type');
		});
	}

	public function down()
	{
		Schema::drop('clientable');
	}
}