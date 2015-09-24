<?php

class Symptoms extends Eloquent {

	protected $table = 'symptom';
	protected $primaryKey = 'symptom_id';
	//protected $hidden = ['last_date','last_time'];

	public $timestamps = false;
}