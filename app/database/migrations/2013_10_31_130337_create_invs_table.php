<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvsTable extends Migration {

	public function up()
	{
		Schema::create('invs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('cost');
			$table->text('payments');
			$table->integer('limit')->default(7);
		});
	}

	public function down()
	{
		Schema::drop('invs');
	}
}