<?php

class Balance extends Eloquent {

	protected $table = 'balances';
	public $timestamps = true;
	protected $softDelete = false;

    public function user()
    {
        return $this->belongsTo('Users');
    }

}