<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration {

	public function up()
	{
		Schema::create('newsadd.blade.php', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('newsadd.blade.php');
	}
}