<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('phone');
			$table->integer('city_id')->unsigned();
			$table->string('hospital_name');
			$table->tinyInteger('bages_number');
			$table->text('content');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->integer('client_id')->unsigned();
			$table->text('address');
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}