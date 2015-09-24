<?php

use Intervention\Image\Image;	

class FaqController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{

		$question = Question::orderBy('pin','desc')->orderBy('pin','desc')->orderBy('updated_at','desc')->orderBy('question_id','desc')->get();
				

		return View::make('faq.index')
			->with(compact('question'));
	}

	public function getEdit($id)
	{
		$question = Question::find($id);
		return View::make('faq.new')
					->with(compact('question'));
	}
	public function postEdit($id)
	{
		$question = Question::find($id);
		$question->title = Input::get('title');
		$question->question = Input::get('question');
		$question->last_session = Session::getId();
		$question->answer = Input::get('answer');
		$question->is_visible = Input::get('is_visible','1');
		$question->pin = Input::get('pin','0');
		$question->save();


		return Redirect::to('faq');
	}


	public function getNew()
	{
		return View::make('faq.new');
	}

	public function postNew()
	{
		$question = new Question;
		$question->title = Input::get('title');
		$question->question = Input::get('question');
		$question->answer = Input::get('answer');
		$question->last_session = Session::getId();
		$question->create_by = 1;//Sentry::getUser()->id;
		$question->view_count = 0;
		$question->is_visible = Input::get('is_visible','1');
		$question->pin = Input::get('pin','0');
		$question->save();


		return Redirect::to('faq');
	}

	public function getDelete($id)
	{
		$question = Question::destroy(Crypt::decrypt($id));
	
		return Redirect::to('faq');
	}

	public function postUpload()
	{
		if(Input::hasFile('upload'))
		{
			$destinationPath  = public_path().'/assets/ckeditor/upload/';
			$file = Input::file('upload');
			$fileName = Str::random(4).'.'.$file->getClientOriginalExtension();
			Image::make($file->getRealPath())
			->save($destinationPath.'original/'.$fileName)
			->grab('100', '100')
			->save($destinationPath.'thumbnail/'.$fileName)
			->resize('280', '255', true) 
			->save($destinationPath.'resize/'.$fileName)
			->destroy();

			return 'success';
		}
		return App::abort(403, 'Unauthorized action.');
	}

	public function getBrowse()
	{
		if(!Input::has('CKEditor'))
		{
			return App::abort(403, 'Unauthorized action.');
		}

		$fnnumber = Input::get('CKEditorFuncNum');
		$path  = public_path().'\assets\ckeditor\upload\thumbnail';
		$allfiles = File::allFiles($path);
		$files = array();
		
		foreach ($allfiles as $file)
		{
		   	array_push($files, basename((string)$file));

		}

		return View::make('faq.filebrowse')
				->with(compact('files','fnnumber'));
	}
}