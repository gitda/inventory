<?php
namespace Hosxp\Master;

class ReplicateLock extends \Eloquent {

	protected $table = 'replicate_lock';

	protected $primaryKey = null;

	public $incrementing = false;

	public $timestamps = false;

	protected $connection = 'hosxpmaster';

}