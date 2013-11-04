<?php

class Payment extends Eloquent {

	protected $table = 'payments';
	public $timestamps = true;
	protected $softDelete = false;

	public function user()
	{
		return $this->belongsTo('User');
	}

}