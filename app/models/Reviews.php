<?php

class Reviews extends Eloquent {

	protected $table = 'reviews';
	public $timestamps = true;
	protected $softDelete = false;

	public function user()
	{
		return $this->belongsTo('Users');
	}

}