<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Request;
use Auth;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
// use Facebook\GraphUser;
// use Facebook\FacebookRequestException;

class FacebookHelper extends Model {

	public $helper;
	public $session;
	public $fb;
	public function __construct()
	{
		$app_id = config('social.facebook.app_id');
		$app_secret = config('social.facebook.app_secret');
		$redirect = config('social.facebook.redirect');

		FacebookSession::setDefaultApplication($app_id, $app_secret);
		$this->helper = new FacebookRedirectLoginHelper($redirect);
	}

	public function getLoginUrl()
	{
		return $this->helper->getLoginUrl();
	}

	public function getAccessTokenPageFromUser()
	{
		try {
		  $this->session = $this->helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
			return redirect($this->getLoginUrl());

		} catch(\Exception $ex) {
		  // When validation fails or other local issues
			return redirect($this->getLoginUrl());
		}
		if ($this->session) {
			$request = new FacebookRequest($this->session, 'GET', '/me?fields=accounts{access_token,name,id,likes,category,photos{images}}');
			$response = $request->execute();
			$graphObject = $response->getGraphObject();

			if (!empty($graphObject->getProperty('accounts'))) 
			{
				$data = $graphObject->getProperty('accounts')->asArray();
				$data = $data['data'];
				$data_format = array();
				$pages = array();
				foreach ($data as $key => $val) {
					$page['id'] = $val->id;
					$page['name'] = $val->name;
					$page['access_token'] = $val->access_token;
					$page['url_image'] = $val->photos->data[0]->images[0]->source;
					$page['likes'] = $val->likes;
					$page['category'] = $val->category;
					$data_format[] = $page;
				}
				return $data_format;
			}
			
		}
		return null;
	}

	public function saveAccessToken($data)
	{
		foreach ($data as $key => $val) {
			$facebook_page = FacebookPage::where('facebook_page_id', $val['id'])->first();
			if ($facebook_page) 
			{
				$client_page = ClientPage::where('user_id', Auth::user()->id)
										->where('facebook_id', $facebook_page->facebook_id)
										->first();
				if ($client_page) 
				{
					$facebook_page->facebook_page_name = $val['name'];
					$facebook_page->facebook_page_likes = $val['likes'];
					$facebook_page->facebook_page_url_image = $val['url_image'];
					$facebook_page->facebook_page_category = $val['category'];
					$facebook_page->save();

					$client_page = ClientPage::where('facebook_id', $facebook_page->facebook_id)->first();
					$client_page->cp_access_token = $val['access_token'];
					$client_page->save();

					$user_token = UserToken::firstOrCreate([
							"user_id" => Auth::id(),
							"utk_access_token" => $this->session->getToken()
						]);
				}
				else
				{
					
					$this->newClientPage($facebook_page->facebook_id, $val['access_token']);
				}
			}
			else
			{
				$facebook_page = FacebookPage::create([
									'facebook_page_id' => $val['id'],
									'facebook_page_name' => $val['name'],
									'facebook_page_likes' => $val['likes'],
									'facebook_page_url_image' => $val['url_image'],
									'facebook_page_category' => $val['category']
									]);

				$this->newClientPage($facebook_page->facebook_id, $val['access_token']);
			}
			
		}
	}

	public function sendMessage($msg)
	{
		try
		{
			$session = new FacebookSession($msg['access_token']);
			$request = new FacebookRequest($session, 'POST', '/'.$msg['id'].'/'.$msg['type'] , $msg['msg']);
			$response = $request->execute()->getGraphObject()->asArray();
		} 
		catch(FacebookResponseException $e) 
		{
		  	echo 'Graph returned an error: ' . $e->getMessage();
		  	exit;
		} 
		catch(FacebookSDKException $e) 
		{
		  	echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  	exit;
		}
		return $response;
	}

	public function sendMessagesMultiplePage($msg)
	{
		try
		{
			// if (isset($msg['msg']['source'])) 
			// {
			// 	$msg['msg']['source'] = $this->helper->fileToUpload($msg['msg']['source']);
			// 	print_r($msg);die();
			// }
			if (is_array($msg['access_token']))
			{
				$response = array();
				foreach ($msg['access_token'] as $access_token) 
				{
					$session = new FacebookSession($access_token);
					$request = new FacebookRequest($session, 'POST', '/'.$msg['id'].'/'.$msg['type'] , $msg['msg']);
					$response[] = $request->execute()->getGraphObject()->asArray();
				}
			}
			elseif(is_string($msg['access_token']))
			{
				$response = $this->sendMessage($msg);
			}

		} 
		catch(FacebookResponseException $e) 
		{
		  	echo 'Graph returned an error: ' . $e->getMessage();
		  	exit;
		} 
		catch(FacebookSDKException $e) 
		{
		  	echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  	exit;
		}
		return $response;
	}

	private function newClientPage($facebook_id, $access_token)
	{
		ClientPage::create([
						'user_id' => Auth::user()->id,
						'facebook_id' => $facebook_id,
						'cp_access_token' => $access_token,
					]);
	}

}
