<?php

class AdminController extends BaseController {

	public function getIndex()
	{
		$subjects = Subject::all();
		return View::make('admin.index')->with('subjects', $subjects);
	}

}
