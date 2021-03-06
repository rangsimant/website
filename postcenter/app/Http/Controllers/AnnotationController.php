<?php namespace App\Http\Controllers;

session_start();

use Auth;
use App\Models\ClientPage;

class AnnotationController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$client_page = ClientPage::getPageFromUserID(Auth::user()->id, $status = 'on');
		$client_page = $this->processFormatObject($client_page);
		return view('annotation')->with('pages', $client_page);
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
}