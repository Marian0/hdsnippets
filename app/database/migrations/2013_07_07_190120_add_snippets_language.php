<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSnippetsLanguage extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('snippets', function(Blueprint $table)
		{
			$table->integer('code_language')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('snippets', function(Blueprint $table)
		{
			$table->dropColumn('code_language');
		});
	}

}