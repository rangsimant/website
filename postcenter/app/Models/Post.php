<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

use Auth;

class Post extends Model {

	protected $table = 'post';
	protected $primaryKey = 'post_id';
	
	public static function getPostByPageID($page_id, $page = 0)
	{
		$user_id = Auth::id();
		$take = 20;
		$offset = $page*$take;
		$posts = ClientPage::
						leftJoin('facebook_page', 'facebook_page.facebook_id', '=', 'client_page.facebook_id')
						->leftJoin('post', 'post.Facebook_id', '=', 'facebook_page.facebook_id')								
						->leftJoin('author', 'author.author_social_id', '=', 'post.Author_social_id')								
						->where('facebook_page.facebook_page_id', $page_id)
						->where('client_page.user_id', $user_id)
						->where('post.post_type', 'post')
						->select(
							'facebook_page.facebook_page_id',
							'facebook_page.facebook_page_name',
							'post.*',
							'post.post_created_at as posted_time',
							'author.author_name',
							'author.author_channel'
							)
							->skip($page)
							->take($take)
							->orderBy('posted_time', 'DESC')
							->get();
							
		return $posts;
						
	}


}
