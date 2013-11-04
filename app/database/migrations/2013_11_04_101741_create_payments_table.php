<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->float('summa');
			$table->string('to');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}