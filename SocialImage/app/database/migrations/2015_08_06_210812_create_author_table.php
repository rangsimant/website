<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('author', function(Blueprint $table)
		{
			$table->string('author_id', 30)->primary();
			$table->string('author_displayname', 50)->nullable();
			$table->enum('author_type', array('facebook','instagram'))->default('instagram');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('author');
	}

}
