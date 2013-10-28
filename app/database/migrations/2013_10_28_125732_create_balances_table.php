<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBalancesTable extends Migration {

	public function up()
	{
		Schema::create('balances', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->float('summa', 0.0);
			$table->string('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('balances');
	}
}