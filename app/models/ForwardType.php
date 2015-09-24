<?php

class ForwardType extends Eloquent {

	protected $table = 'forward_type';
	protected $primaryKey = 'forward_type_id';
	#protected $hidden = ['job','id'];

	public $timestamps = false;
}