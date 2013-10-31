<?php

class InvBuy extends Eloquent {

	protected $table = 'invs_buy';
	public $timestamps = true;
	protected $softDelete = false;

	public function inv()
	{
		return $this->belongsTo('Inv');
	}

	public function user()
	{
		return $this->belongsTo('Users');
	}

}