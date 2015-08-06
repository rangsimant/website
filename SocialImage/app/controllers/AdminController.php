<?php

class AdminController extends BaseController {

	public function getIndex()
	{
		return Redirect::to('admin/client');
	}
	public function getPage()
	{
		$subjects = Subject::all();
		return View::make('admin.index')->with('subjects', $subjects);
	}

	public function getClient()
	{
		$users = User::all();
		return View::make('admin.client.index')->with('users', $users);
	}

	public function getPermission()
	{
		echo "Permission";
	}


}
