<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table)
		{
			$table->bigInteger('post_id', true);
			$table->string('author_id', 30)->nullable()->index('author_id_fk_idx');
			$table->text('post_text', 65535)->nullable();
			$table->integer('post_like')->nullable();
			$table->dateTime('post_created_time');
			$table->timestamp('post_added_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('post_social_id', 50)->unique('post_social_id_UNIQUE');
			$table->enum('post_channel', array('facebook','instagram'))->default('instagram');
			$table->string('post_img_name', 100)->nullable();
			$table->text('post_link', 65535)->nullable();
			$table->string('post_subject', 45)->nullable()->default('samsung')->index('post_subject_fk_idx');
			$table->enum('post_available', array('open','close'))->default('open');
			$table->string('post_tab', 45)->nullable()->default('all');
			$table->string('post_url_image', 400)->nullable();
			$table->string('postcol', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post');
	}

}
