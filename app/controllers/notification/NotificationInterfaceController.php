<?php

namespace notification;

use User;
use Sentry;
use Cookie;
use View;	
use Helpdesk;
use Crypt;
use Notification;
use Redirect;
use Input;
use DB;

class NotificationInterfaceController extends \BaseController {

	
	
	public function getIndex()
	{
		$user = User::find(Sentry::getUser()->id);
		
		$unreadNotifications = $user->notifications()->orderBy('id','desc')->get();


		return View::make('notification.index')
					->with(compact('unreadNotifications'));
	}

	public function getRead($_id)
	{
		$id = Crypt::decrypt($_id);

		$notify = Notification::find($id)->read();

		return Redirect::back();
	}


	public function getNew()
	{
		$technic = DB::table('users')->lists('technic_name','id');

		return View::make('notification.new')
				->with(compact('technic'));
	}

	public function postNew()
	{
		$input =  Input::all();
		$users = User::where('id','=',$input['user'])->get();

		if(empty($input['user']))
		{
			$users = User::all();
		}

		foreach ($users as $u) 
		{
			$u->newNotification()
			    ->withType($input['type'])
			    ->withSubject($input['subject'])
			    ->withBody($input['body'])
			    ->deliver();
		}
		return Redirect::back();
	}

	public function getNotify()
	{
		$this->CheckNewNotify();

		$user = User::find(Sentry::getUser()->id);
		$notifications = $user->notifications()->unread()->count();
		$array = array("count"=>$notifications);

		Cookie::queue('notify_count', $notifications);
		

		return json_encode($array);
	}

	private function CheckNewNotify()
	{
		$user_id = 2;
		$nonotify = Helpdesk::nonotify()->get();

		foreach ($nonotify as $hd) 
		{
			$user = User::find($user_id);
			$user->newNotification()
			    ->withType('Helpdesk')
			    ->withSubject('แจ้งรายการ helpdesk ใหม่')
			    ->withBody($hd->contact_name.' : '.$hd->help_description)
			    ->regarding($hd)
			    ->deliver();

			$hd->is_notify = 1;
			$hd->save();
		}

	}


}