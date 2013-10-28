<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQueueLinearTable extends Migration {

	public function up()
	{
		Schema::create('queue_linear', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->tinyInteger('payed');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('queue_linear');
	}
}