<?php

class Account extends Eloquent
{
	protected $table = 'account';
	protected $primaryKey = 'account_id';

	public static function getAccount($subject)
	{
		$account = self::where('account_subject', $subject)->get();
		return $account;
	}
}