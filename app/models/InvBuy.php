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

    public function getLastAttribute() {
        return strtotime(date('d.m.Y 19:00:00', strtotime($this->updated_at)));
    }

}