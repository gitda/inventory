<?php

class Durable extends Eloquent {

	protected $table = 'tb_durable';
	protected $primaryKey = 'durable_id';
	#protected $hidden = ['job','id'];

	public $timestamps = false;
}