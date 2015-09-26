<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::controller('auth','AuthController');


Route::group(array('prefix' => 'mobile'),function(){

	Route::group(array('prefix' => 'api'),function(){

		Route::resource('repair','api\RepairController');

	});




	Route::get('api/repair',function(){
		return Input::all();
	});

	Route::get('durable/{bcode}', function($id){
		$durable = DB::table('tb_durable')->where('durable_barcode','=',$id)->first();
		return Response::json($durable)->setCallback(Input::get('callback'));
	});

	Route::post('durable', function(){
		return Input::all();
	});

});



Route::group(array('prefix' => '/', 'before' => 'sentry'),function(){


	Route::get('/',function(){
		return View::make('hello');
	});

	Route::get('time',function(){return Crypt::encrypt(date('U'));});

	Route::get('combo/subdept',function(){
		$data = DB::table('tb_sub_dept')->where('dept_id','=',Input::get('id'))->where('sub_dept_status','=','1')
				->orderBy('sub_dept_name','asc')->get();

		return $data;
	});

	Route::get('combo/symptoms',function(){
		$data = DB::table('symptom')->where('ruin_type_id','=',Input::get('id'))->where('is_status','=','1')
				->orderBy('symptom_id','asc')->get();

		return $data;
	});


	Route::get('dashboard', function()
	{
		return View::make('ajax.dashboard');
	});

	Route::controller('durable','DurableController');
	Route::controller('helpdesk','HelpdeskController');
	Route::controller('faq','FaqController');

<<<<<<< HEAD

	Route::group(array('prefix' => 'report'),function(){

		Route::controller('report-helpdesk', 'RHelpdeskController');
		Route::controller('durable', 'report\DurableController');

	});
	
=======
	Route::controller('report/report-helpdesk', 'RHelpdeskController');
	Route::controller('report/report-gap', 'GapController');
>>>>>>> origin/master


	Route::group(array('prefix' => 'admin'),function(){

		Route::get('/',function(){
			return View::make('admin.index');
		});
		Route::controller('privilege','admin\PrivilegeController');


		Route::group(array('prefix' => 'durable'),function(){
		
			Route::controller('symptoms','admin\durable\SymptomsController');

		});

	});


});


