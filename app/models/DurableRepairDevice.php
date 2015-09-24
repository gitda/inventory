<?php

class DurableRepairDevice extends Eloquent {

	protected $table = 'tb_durable_repair_device';
	protected $primaryKey = 'id';
	#protected $hidden = ['job','id'];

	public $timestamps = false;
}