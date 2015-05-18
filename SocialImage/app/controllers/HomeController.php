<?php

class HomeController extends BaseController 
{

	public function index()
	{
		$subjects = Subject::all();
		return View::make('index')->with('subjects', $subjects);
	}

	public function getImage($dateStart, $dateEnd, $subject, $offset = 0)
	{
		$dateStart = $dateStart." 00:00:01";
		$dateEnd = $dateEnd." 23:59:59";
		$limit = 1000000;
		$skip = $offset * $limit;
		$image = Post::getPost($subject, $dateStart, $dateEnd, $limit, $skip);
		echo json_encode($image);
	}

}
