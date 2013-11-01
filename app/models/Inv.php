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



    public static function process() {
        $invs = Inv::all();
        foreach($invs as $inv) {
            foreach($inv->buys()->where('col', '<', 7) as $v) {
                if(($v->last+(3*24*60*60)) <= time()) {

                    $v->user()->balance()->create(array(
                        'summa' => $inv->payment[$v->col],
                        'description' => 'Выплата по тарифу '.$inv->name
                    ));
                    $v->col++;
                    $v->save();
                    $v->touch();
                }
            }
        }
    }

}