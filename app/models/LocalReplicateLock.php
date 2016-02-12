<?php

class LocalReplicateLock extends Eloquent {

	protected $table = 'replicate_lock';

	protected $primaryKey = "computer_name";
	
	public $incrementing = false;

	public $timestamps = false;

	protected $fillable = array('computer_name', 'last_active');
}