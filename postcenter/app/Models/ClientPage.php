<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class ClientPage extends Model {

	protected $table = 'client_page';
	protected $primaryKey = 'cp_id';
	protected $guarded = ['cp_id'];

	public static function updateStatus($user_id, $facebook_id, $status)
	{
		$client_page = self::where('facebook_id', $facebook_id)
							->where('user_id', $user_id)
							->first();
		$client_page->cp_status = $status;
		$client_page->save();
	}

	public static function getPageFromUserID($user_id, $status = null)
	{
		$page = \DB::table('client_page')
						->leftjoin('facebook_page', 'facebook_page.facebook_id', '=', 'client_page.facebook_id')
						->leftjoin('users', 'users.id', '=', 'client_page.user_id')
						->where('client_page.user_id', $user_id)
						->where('client_page.cp_status', 'like', '%'.$status.'%')
						->select('*')
						->orderBy('facebook_page.facebook_page_likes', 'DESC')
						->get();
		return $page;
	}

}
