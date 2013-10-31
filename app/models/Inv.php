<?php

class Inv extends Eloquent {

	protected $table = 'invs';
	public $timestamps = false;
	protected $softDelete = false;

	public function buys()
	{
		return $this->hasMany('InvBuy');
	}

}