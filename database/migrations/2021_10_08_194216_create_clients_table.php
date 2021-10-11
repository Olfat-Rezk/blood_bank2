<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('password');
			$table->string('name');
			$table->string('email');
			$table->enum('blood_type',array('O-','O+','AB-','AB+','A-','A+','B-','B+'));
			$table->date('d_o_b');
			$table->date('last_donation_date');
			$table->integer('city_id')->unsigned();
			$table->smallInteger('pin_code');
			$table->integer('blood_type_id')->unsigned();
			$table->string('api_token',60)->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
