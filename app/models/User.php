<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

//implements UserInterface, RemindableInterface
class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public function notifications()
    {
        return $this->hasMany('Notification');
    }
 
    public function newNotification()
    {
        $notification = new Notification;
        $notification->user()->associate($this);
 
        return $notification;
    }
	

}