<?php

class UsersSubject extends Eloquent
{
	protected $table = 'user_subject';
	protected $primaryKey = 'us_id';

	public static function getSubject()
	{
		if (Auth::user()->hasRole('admin')) 
		{
			$subject = Subject::all();
		}
		else
		{
			$subject = self::select('subject.*')
						->where('user_subject.users_id', Auth::id())
						->join('users', 'id', '=' , 'user_subject.Users_id')
						->join('subject', 'subject.subject_id', '=' , 'user_subject.Subject_id')
						->orderBy('subject.subject_name' , 'ASC')
						->get();
		}
		return $subject;
	}
}