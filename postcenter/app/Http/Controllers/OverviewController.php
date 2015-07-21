<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\ClientPage;

class AnnotationController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
}