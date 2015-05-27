<?php

class AccountController extends BaseController
{
	
	public function getPageList()
	{
		$subject = Input::get('subject');
		$account = Account::getAccount($subject);
		echo json_encode($account);
	}

	public function postNewAccount()
	{
		$input = Input::all();
		echo "<pre>";
		print_r($input);
	}
}