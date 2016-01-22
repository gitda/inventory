<?php

namespace notification;

use User;
use Sentry;
use Cookie;
use View;	

class NotificationInterfaceController extends \BaseController {


	
	public function getIndex()
	{
		$user = User::find(Sentry::getUser()->id);

		//$user->newNotification()
		//     ->withType('RecipeFavorited')
		//     ->withSubject('Your recipe has been favorited.')
		//     ->withBody('<User X> has favorited your Caramel Cream Cakes recipe!')
		//     //->regarding($user2)
		//     ->deliver();
		
		$unreadNotifications = $user->notifications()->unread()->get();


		return View::make('notification.index')
					->with(compact('unreadNotifications'));
	}

	public function getNotify()
	{

		$user = User::find(Sentry::getUser()->id);
		$notifications = $user->notifications()->unread()->count();
		$array = array("count"=>$notifications);

		Cookie::queue('notify_count', $notifications);
		

		return json_encode($array);
	}


}