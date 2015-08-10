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
		$input = Input::all();
		$msg = '';

		$new_account = array();
		foreach ($input['account'] as $key => $val) 
		{
			try 
			{
				$new_account[$key] = $this->getAccountFromFacebookAPI($val, $key, $config['app_id'], $config['app_secret'], $config['app_token'], $input);
				$msg = 'Add new page success.';
			} catch (Exception $e) 
			{
				try 
				{
					$new_account[$key] = $this->getAccountFromFacebookAPI($val, $key, $config['sub_app_id'], $config['sub_secret'], $config['sub_token'], $input, $specific_token = 'yes');
					$msg = 'Add new page success use specific token.';
				} catch (Exception $e) 
				{
					return Redirect::to('admin/page')->with('message', $e->getMessage());
				}
			}
		}

		Account::insert($new_account);
		return Redirect::to('admin/page')->with('success', $msg);
	}

	public function getAccountFromFacebookAPI($id_page, $idx, $app_id, $app_secret, $access_token, $input, $specific_token = 'no')
	{
		FacebookSession::setDefaultApplication($app_id, $app_secret);
		$session = new FacebookSession($access_token);

		$request = new FacebookRequest($session, 'GET', '/'.$id_page.'?fields=name');
		$response = $request->execute();
		$graphObject = $response->getGraphObject();
		$graphObject = $graphObject->asArray();

		$new_account['account_subject'] = $input['subject'];
		$new_account['account_id_user'] = $graphObject['id'];
		$new_account['account_username'] = $graphObject['name'];
		$new_account['account_channel'] = 'facebook';
		$new_account['account_last_datetime'] = date('Y-m-d H:i:s',strtotime($input['since'][$idx]));
		$new_account['account_specific_token'] = $specific_token;

		return $new_account;
	}
}