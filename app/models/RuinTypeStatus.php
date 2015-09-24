<?php

class RuinTypeStatus extends Eloquent {

	protected $table = 'tb_ruin_type';
	protected $primaryKey = 'tb_ruin_type_id';
	//protected $hidden = ['last_date','last_time'];

	public $timestamps = false;
}