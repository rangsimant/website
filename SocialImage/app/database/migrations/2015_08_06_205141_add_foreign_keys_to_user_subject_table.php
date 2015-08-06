<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_subject', function(Blueprint $table)
		{
			$table->foreign('Subject_id', 'Subject_id_FK')->references('subject_id')->on('subject')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Users_id', 'Users_id_FK')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_subject', function(Blueprint $table)
		{
			$table->dropForeign('Subject_id_FK');
			$table->dropForeign('Users_id_FK');
		});
	}

}
