<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->string('email');
			$table->string('skype');
			$table->string('fio');
			$table->integer('referal_id');
			$table->string('okpay');
			$table->string('perfectmoney');
			$table->string('zipcode');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}