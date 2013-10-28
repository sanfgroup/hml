<?php

class Linear5 extends Eloquent {

	protected $table = 'queue_linear_5';
	public $timestamps = true;
	protected $softDelete = false;
    protected $tarif = 5;

    public function pay() {
        $pos = Linear5::fnp();
        $ac = Linear5::whereAdmin(1)->where('id', '<=', $pos->id)->count();
        if(Linear5::find(2*($pos->id+1-$ac))) {
            if($pos->admin == 1) {
                $pos->payed = 1;
                $pos->save();
                $pos = $this->find($pos->id+1);
            }
            $u = User::find($pos->user_id);
            if($u) {
                $summ = $this->tarif*1.5;
                $u->balance()->create(array(
                    'summa' => $summ,
                    'description' => 'Начисление по тарифу '.$this->tarif
                ));
                $summ = $this->tarif*0.25;
                $b = new Balance();

                $b->user_id = 0;
                $b->summa = $summ;
                $b->description = 'Начисление по тарифу '.$this->tarif;
                $b->save();
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