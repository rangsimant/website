<?php namespace App\Http\Controllers;

session_start();

use App\Models\FacebookHelper;
use App\Models\FacebookPage;
use App\Models\ClientPage;
use Auth;
use Request;
use Session;

class SocialController extends Controller {

	public $facebook;

	public function __construct()
	{
		$this->middleware('auth');
		$this->facebook = new FacebookHelper();
	}

	public function index()
	{
		$data = null;
		$status_check_all = "";
		$user_id = Auth::user()->id;
		$facebook_page = ClientPage::getPageFromUserID($user_id);

		if (isset($facebook_page[0])) 
		{
			$status_check_all = self::checkStatusPageAll($facebook_page);
			$data = self::processFormatObject($facebook_page);
		}

		$getLoginUrl = $this->facebook->getLoginUrl();
		return view('social.index')
						->with('url_facebook_login', $getLoginUrl)
						->with('status_check_all', $status_check_all)
						->with('pages', $data);
	}

	public function authFacebook()
	{
		$data = $this->facebook->getAccessTokenPageFromUser();
		if ($data) 
		{
			$this->facebook->saveAccessToken($data);
		}
		return redirect('social');
	}

	private static function processFormatObject($facebook_page)
	{
		$data = array();
		$pages = array();
		foreach ($facebook_page as $key => $page) 
		{
			$pages['id'] = $page->facebook_id;
			$pages['page_id'] = $page->facebook_page_id;
			$pages['name'] = $page->facebook_page_name;
			$pages['likes'] = $page->facebook_page_likes;
			$pages['url_image'] = $page->facebook_page_url_image;
			$pages['status']= $page->cp_status;
			$pages['category']= $page->facebook_page_category;
			if ($key == 0) 
			{
				$total_likes = 0;
				foreach ($facebook_page as $val) 
				{
					$total_likes += $val->facebook_page_likes;
				}
			}
			$pages['total_likes'] = $total_likes;
			$data[] = $pages;
		}
		return $data;
	}

	private static function checkStatusPageAll($data)
	{
		$count = count($data);
		$status_count = '0';
		$status_check_all = '';
		foreach ($data as $val) 
		{
			if ($val->cp_status == 'on') 
			{
				$status_count++;
			}
		}

		if ($count == $status_count) 
		{
			$status_check_all = 'checked';
		}

		return $status_check_all;
	}

	public function remove()
	{
		$client_id = Auth::id();
		$channel = Request::get('channel');
		if ($channel == 'facebook') 
		{
			$result = ClientPage::removeClientPage($client_id);
		}
		if ($result > 0) 
		{
			Session::flash('message.text', 'Remove Facebook Page success.');
			Session::flash('message.title', 'Delete');
			Session::flash('message.type', 'danger');
		}
		
		return redirect('social');
	}

}
