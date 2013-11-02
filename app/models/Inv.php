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

    public function sumPayed($col=0) {
        $sum=0;
        for($i=0;$i<$col;$i++) {
            $sum += $this->payment[$i];
        }
        return $sum;
    }

    public function totalPayed($f='', $t='') {
        $q=$this->buys()->remember(10);
        if($f!='') {
            $q = $this->buys()->remember(10)->where('created_at', '>=', $f);
        }
            if($t!='') {
                $q = $this->buys()->remember(10)->where('created_at', '>=', $f)->where('created_at', '<=', $t);
            }


        $sum=0;
        foreach($q->get() as $v) {
            $sum += $this->sumPayed($v->col);
        }
        return $sum;
    }



    public static function process() {
        $invs = Inv::all();
        foreach($invs as $inv) {
            foreach($inv->buys()->where('col', '<', 7) as $v) {
                if(($v->last/*+(3*24*60*60)*/) <= time()) {

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