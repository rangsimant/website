<?php

class HomeController extends BaseController 
{

	public function index()
	{
		$subjects = Subject::all();
		return View::make('index')->with('subjects', $subjects);
	}

	public function getImage()
	{
		$dateStart = Input::get('dateStart');
		$dateEnd = Input::get('dateEnd');
		$subject = Input::get('subject');
		$offset = Input::get('offset');
		$limit = 40;

		$dateStart = $dateStart." 00:00:01";
		$dateEnd = $dateEnd." 23:59:59";
		$skip = $offset * $limit;
		$image = Post::getPost($subject, $dateStart, $dateEnd, $limit, $skip);
		if (count($image) > 0) 
			echo json_encode($image);
		else
			echo json_encode(false);
	}

}
