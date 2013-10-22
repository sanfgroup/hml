<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddReferalAndFirstnameToPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->string('first_name');
			$table->string('last_name');
			$table->string('perfect_money');
			$table->string('okpay');
			$table->integer('money');
			$table->integer('zmoney');
			$table->string('perfect_money');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function(Blueprint $table) {
			
		});
	}

}
