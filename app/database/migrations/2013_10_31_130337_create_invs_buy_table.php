<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvsBuyTable extends Migration {

	public function up()
	{
		Schema::create('invs_buy', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id');
			$table->integer('inv_id');
			$table->integer('col');
		});
	}

	public function down()
	{
		Schema::drop('invs_buy');
	}
}