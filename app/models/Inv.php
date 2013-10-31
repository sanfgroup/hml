<?php

class Inv extends Eloquent {

	protected $table = 'invs';
	public $timestamps = false;
	protected $softDelete = false;

	public function buys()
	{
		return $this->hasMany('InvBuy');
	}

    public function getPaymentAttribute() {
        return unserialize(base64_decode($this->payments));
    }

}