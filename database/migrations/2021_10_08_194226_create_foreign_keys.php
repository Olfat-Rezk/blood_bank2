<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('no action');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('donation_request_id')->references('id')->on('donation_requests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('clientable', function(Blueprint $table) {
			$table->foreign('notification_id')->references('id')->on('notifications')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('clientable', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_city_id_foreign');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_blood_type_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_governorate_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_category_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_client_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_city_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_client_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_donation_request_id_foreign');
		});
		Schema::table('clientable', function(Blueprint $table) {
			$table->dropForeign('clientable_notification_id_foreign');
		});
		Schema::table('clientable', function(Blueprint $table) {
			$table->dropForeign('clientable_client_id_foreign');
		});
	}
}