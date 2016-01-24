<?php

class Helpdesk extends Eloquent {

	protected $table = 'helpdesk';
	protected $primaryKey = 'id';
	#protected $hidden = ['job','id'];

	public $timestamps = false;



	public function scopeNonotify($query)
	{
	    return $query->where('is_notify', '=', 0);
	}
}