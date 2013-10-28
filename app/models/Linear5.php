<?php

class Linear5 extends Eloquent {

	protected $table = 'queue_linear_5';
	public $timestamps = true;
	protected $softDelete = false;
    protected $tarif = 5;

    public function pay() {
        $pos = $this->fnp();
        $ac = $this->whereAdmin(1)->where('id', '<=', $pos->id)->count();
        if($this->find(2*($pos->id+1-$ac))) {
            if($pos->admin == 1) {
                $pos->payed = 1;
                $pos->save();
                $pos = $this->find($pos->id+1);
            }
            $u = User::find($pos->user_id);
            if($u) {
//                $u->balans = 7.5+$u->balans;
                $summ = $this->tarif*1.5;
                $u->save();
                $pos->payed = 1;
                $pos->save();
            }
        }
    }


    public function user()
    {
        return $this->belongsTo('Users');
    }

    public static function fnp() {
        return Linear5::orderBy('id')->wherePayed(0)->first();
    }

}