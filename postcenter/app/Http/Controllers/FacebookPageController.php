<?php namespace App\Http\Controllers;

use Auth;
use App\Models\ClientPage;

class FacebookPageController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function changeStatus()
	{
		$page_id = \Request::input('page_id');
		$status = \Request::input('status');
		$user_id = Auth::user()->id;

		ClientPage::updateStatus($user_id, $page_id, $status);
	}
}