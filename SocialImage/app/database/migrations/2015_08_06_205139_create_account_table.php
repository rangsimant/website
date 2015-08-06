<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('account', function(Blueprint $table)
		{
			$table->bigInteger('account_id', true);
			$table->string('account_id_user', 30)->unique('account_id_user_UNIQUE');
			$table->string('account_username', 45)->nullable();
			$table->enum('account_channel', array('facebook','instagram'))->default('instagram');
			$table->dateTime('account_last_datetime')->default('2014-09-01 00:00:00');
			$table->dateTime('account_timestamp');
			$table->string('account_subject', 45)->nullable()->default('samsung')->index('account_subject_fk_idx');
			$table->enum('account_available', array('open','close'))->default('open');
			$table->unique(['account_username','account_channel'], 'account_username_UNIQUE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('account');
	}

}
