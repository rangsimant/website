<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_subject', function(Blueprint $table)
		{
			$table->increments('us_id');
			$table->integer('Users_id')->unsigned()->nullable()->index('Users_id_FK_idx');
			$table->integer('Subject_id')->nullable()->index('Subject_id_FK_idx');
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
		Schema::drop('user_subject');
	}

}
