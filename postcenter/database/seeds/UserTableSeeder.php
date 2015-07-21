<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->truncate();

		User::create([
				"name" => "admin",
				"email" => "admin@postcenter.com",
				"password" => Hash::make('admin!')
			]);

		User::create([
				"name" => "sunnysun",
				"email" => "sunnysun@postcenter.com",
				"password" => Hash::make('sunnysun!')
			]);
	}

}
