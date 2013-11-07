<?php

class Payment extends Eloquent {

	protected $table = 'payments';
	public $timestamps = true;
	protected $softDelete = false;

	public function user()
	{
		return $this->belongsTo('User');
	}


    public function getCreatedAttribute() {
        return date('d.m.Y H:i:s', strtotime($this->created_at));
    }
}