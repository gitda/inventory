<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

//implements UserInterface, RemindableInterface
class User extends Eloquent implements UserInterface, RemindableInterface {

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


	public function getRememberToken()
	{
	    return $this->remember_token;
	}
	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}
	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	public function getAuthIdentifier()
	{
	    return $this->getKey();
	}
	public function getAuthPassword()
	{
	    return $this->password;
	}
	public function getReminderEmail()
	{
	    return $this->email;
	}


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