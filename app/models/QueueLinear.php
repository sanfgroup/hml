<?php

class QueueLiear extends Eloquent {

	protected $table = 'queue_linear';
	public $timestamps = true;
	protected $softDelete = false;

	public function user()
	{
		return $this->hasOne('Users');
	}

}