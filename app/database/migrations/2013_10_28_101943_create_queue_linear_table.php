<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQueueLinearTable extends Migration {

	public function up()
	{
		Schema::create('queue_linear_5', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->tinyInteger('payed')->default(0);
			$table->tinyInteger('admin')->default(0);
			$table->timestamps();
		});
		Schema::create('queue_linear_10', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->tinyInteger('payed')->default(0);
			$table->tinyInteger('admin')->default(0);
			$table->timestamps();
		});
		Schema::create('queue_linear_15', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->tinyInteger('payed')->default(0);
			$table->tinyInteger('admin')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('queue_linear_5');
		Schema::drop('queue_linear_10');
		Schema::drop('queue_linear_15');
	}
}