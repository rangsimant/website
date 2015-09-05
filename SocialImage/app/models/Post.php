<?php

class Post extends Eloquent
{
	protected $table = 'post';
	protected $primaryKey = 'post_id';

	public static function getPostAll($subject, $dateStart, $dateEnd, $limit, $skip, $channel = null)
	{
		$post = DB::table('post')
				->join('author', 'post.author_id', '=', 'author.author_id')
				->where('post_subject', $subject)
				->where('post_created_time', '>=', $dateStart)
				->where('post_created_time', '<=', $dateEnd)
				->where('post_channel', 'like', '%'.$channel)
				->select('author.author_displayname', 'author.author_picture', 'post.post_text', 'post.post_created_time', 'post.post_channel', 'post.post_link', 'post.post_subject', 'post.post_url_image')
				->orderBy('post_created_time', 'DESC')
				->take($limit)
				->skip($skip)
				->get();

		return $post;
	}	
}