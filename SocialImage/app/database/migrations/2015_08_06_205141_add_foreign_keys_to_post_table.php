<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('post', function(Blueprint $table)
		{
			$table->foreign('author_id', 'author_id_fk')->references('author_id')->on('author')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('post_subject', 'post_subject_fk')->references('subject_name')->on('subject')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('post', function(Blueprint $table)
		{
			$table->dropForeign('author_id_fk');
			$table->dropForeign('post_subject_fk');
		});
	}

}
