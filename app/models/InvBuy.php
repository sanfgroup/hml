<?php

class InvBuy extends Eloquent {

	protected $table = 'invs_buy';
	public $timestamps = true;
	protected $softDelete = false;

	public function inv()
	{
		return $this->belongsTo('Inv')->remember(5);
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

    public function getLastAttribute() {
        return strtotime(date('d.m.Y 20:00:00', strtotime($this->updated_at)));
    }

    public function getNextAttribute() {
        return date('d.m.Y', strtotime($this->updated_at)+(3*24*60*60));
    }

    public function getCreatedAttribute() {
        return date('d.m.Y H:i:s', strtotime($this->created_at));
    }

}