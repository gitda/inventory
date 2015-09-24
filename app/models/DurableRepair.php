<?php

class DurableRepair extends Eloquent {

	protected $table = 'tb_durable_repair';
	protected $primaryKey = 'repair_id';
	#protected $hidden = ['job','id'];

	public $timestamps = false;
}