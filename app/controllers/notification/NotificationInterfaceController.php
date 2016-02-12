<?php

namespace notification;

use Cache;
use Carbon\Carbon;
use Cookie;
use Crypt;
use DB;
use Helpdesk;
use Input;
use Notification;
use Redirect;
use Sentry;
use User;
use View;	
use LocalReplicateLock;

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
		$this->CheckReplicate();
		

		$user = User::find(Sentry::getUser()->id);
		$notifications = $user->notifications()->unread()->count();
		$array = array("count"=>$notifications);

		Cookie::queue('notify_count', $notifications);
		

		return json_encode($array);
	}

	private function CheckReplicate()
	{
		if(Cache::has('notify_replication_active')==false)
		{
			$master = \Hosxp\Master\ReplicateLock::all();
			foreach ($master as $key => $value) {
				$lrl = LocalReplicateLock::firstOrNew(array('computer_name'=>$value->computer_name));
				$lrl->last_active = $value->last_active;
				$lrl->save();
			}

			$result = LocalReplicateLock::select('computer_name','last_active',DB::raw('NOW() as currenttime'))
					->get();

			foreach ($result as $value) {

				$diff = Carbon::parse($value->last_active)->diffInSeconds(Carbon::now());

				if($diff>120 && Cache::has('notify_replication_active')==false)
				{

					$user = User::all();
					foreach ($user as $u) {
						$u->newNotification()
						    ->withType('Replicate')
						    ->withSubject('แจ้งรายการ Replicate')
						    ->withBody("กรุณาตรวจสอบการ replication ข้อมูลของ computer name ".$value->computer_name)
						    ->deliver();
					}

					Cache::put('notify_replication_active', Carbon::now(), 60);
				}
			}
		}
	}

	private function CheckNewNotify()
	{
		$user_id = 6;
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