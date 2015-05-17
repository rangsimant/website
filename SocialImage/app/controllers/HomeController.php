<?php

class HomeController extends BaseController {

	public function index()
	{
		$subjects = Subject::all();
		return View::make('index')->with('subjects', $subjects);
	}

	public function getImage($dateStart, $dateEnd, $subject, $offset = 0)
	{
		$dateStart = $dateStart." 00:00:01";
		$dateEnd = $dateEnd." 23:59:59";
		$limit = 36;
		$skip = $offset * $limit;
		$image = DB::table('post')
						->join('author', 'post.author_id', '=', 'author.author_id')
						->where('post_subject', $subject)
						->where('post_created_time', '>=', $dateStart)
						->where('post_created_time', '<=', $dateEnd)
						->select('author.author_displayname', 'post.post_text', 'post.post_created_time', 'post.post_channel', 'post.post_link', 'post.post_subject', 'post.post_url_image')
						->orderBy('post_created_time', 'DESC')
						->take($limit)
						->skip($skip)
						->get();
		echo json_encode($image);
	}

}
