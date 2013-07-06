<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnippetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('snippets', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			$table->text('snippet');
			$table->integer('visits')->default(0)->unsigned();
			$table->integer('votes')->default(0)->unsigned();

			$table->integer('user_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('snippets');
	}

}