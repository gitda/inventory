<?php

class Helpdesk extends Eloquent {

	protected $table = 'helpdesk';
	protected $primaryKey = 'id';
	#protected $hidden = ['job','id'];

	public $timestamps = false;
}