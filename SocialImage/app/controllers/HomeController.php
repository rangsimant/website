<?php

class HomeController extends BaseController 
{

	public function all()
	{
		$subjects = Subject::all();
		return View::make('index')->with('subjects', $subjects);
	}

	public function getAll()
	{
		$dateStart = Input::get('dateStart');
		$dateEnd = Input::get('dateEnd');
		$subject = Input::get('subject');
		$offset = Input::get('offset');
		$limit = 40;

		$dateStart = $dateStart." 00:00:01";
		$dateEnd = $dateEnd." 23:59:59";
		$skip = $offset * $limit;
		$image = Post::getPostAll($subject, $dateStart, $dateEnd, $limit, $skip);
		if (count($image) > 0) 
			echo json_encode($image);
		else
			echo json_encode(false);
	}

	public function getFacebook()
	{
		$dateStart = Input::get('dateStart');
		$dateEnd = Input::get('dateEnd');
		$subject = Input::get('subject');
		$offset = Input::get('offset');
		$limit = 40;

		$dateStart = $dateStart." 00:00:01";
		$dateEnd = $dateEnd." 23:59:59";
		$skip = $offset * $limit;
		$image = Post::getPostFacebook($subject, $dateStart, $dateEnd, $limit, $skip);
		if (count($image) > 0) 
			echo json_encode($image);
		else
			echo json_encode(false);
	}

}
