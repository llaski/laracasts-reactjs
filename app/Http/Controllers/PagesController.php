<?php namespace App\Http\Controllers;

class PagesController extends Controller {

	/**
	 * @return Response
	 */
	public function index($lessonNum)
	{
		return view('lesson-'.$lessonNum);
	}

}
