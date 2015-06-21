<?php
use Facebook\FacebookSession;
use Facebook\FacebookRequest;

class AccountController extends BaseController
{
	
	public function getPageList()
	{
		$subject = Input::get('subject');
		$account = Account::getAccount($subject);
		echo json_encode($account);
	}

	public function postNewAccountFacebook()
	{
		$config = Config::get('facebook_config');

		FacebookSession::setDefaultApplication($config['app_id'], $config['app_secret']);
		$session = new FacebookSession($config['app_token']);

		$input = Input::all();

		$new_account = array();
		foreach ($input['account'] as $key => $val) 
		{
			try 
			{
				$request = new FacebookRequest($session, 'GET', '/'.$val.'?fields=name');
				$response = $request->execute();
				$graphObject = $response->getGraphObject();
				$graphObject = $graphObject->asArray();

				$new_account[$key]['account_subject'] = $input['subject'];
				$new_account[$key]['account_id_user'] = $graphObject['id'];
				$new_account[$key]['account_username'] = $graphObject['name'];
				$new_account[$key]['account_channel'] = 'facebook';
				$new_account[$key]['account_last_datetime'] = date('Y-m-d H:i:s',strtotime($input['since'][$key]));
			} catch (Exception $e) 
			{
				return Redirect::to('admin')->with('message', $e->getMessage());
			}
		}

		Account::insert($new_account);
		return Redirect::to('admin')->with('success', 'Add new page success.');
	}
}