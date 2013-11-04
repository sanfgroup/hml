<?php

class Linear10 extends Eloquent {

	protected $table = 'queue_linear_10';
	public $timestamps = true;
	protected $softDelete = false;
    protected $tarif = 10;

    public static function pay() {
        $pos = Linear10::fnp();
        $ac = Linear10::whereAdmin(1)->where('id', '<=', $pos->id)->count();
        if(Linear10::find(2*($pos->id+1-$ac))) {
            if($pos->admin == 1) {
                $pos->payed = 1;
                $pos->save();
                $pos = Linear10::find($pos->id+1);
            }
            $u = User::find($pos->user_id);
            if($u) {
                $summ = $pos->tarif*1.5;
                $u->balance()->create(array(
                    'summa' => $summ,
                    'description' => 'Начисление по тарифу '.$pos->tarif
                ));

                $data['email'] = $u->email;
                $data['fio'] = $u->fio;
                $data['summa'] = 10;
                $data['summap'] = $data['summa']*1.5;
                $data['name'] = "Happy";
                Mail::send('emails.linear_off', $data, function($message) use ($data)
                {
                    $message->to($data['email'], $data['fio'])->subject('Выплата линейного тарифа '.$data['name'].'!');
                });

                $summ = $pos->tarif*0.25;

                $b = new Balance();

                $b->user_id = 0;
                $b->summa = $summ;
                $b->description = 'Начисление по тарифу '.$pos->tarif;
                $b->save();
                $u->save();
                $pos->payed = 1;
                $pos->save();
            }
        }
    }

    public function scopePos() {
        $count = Linear10::wherePayed(1)->count();
//        dd($u->{"linear".$this->$tarif}()->orderBy('id')->first()->id);
        return $this->orderBy('id')->first()->id - $count;
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function fnp() {
        return Linear10::orderBy('id')->wherePayed(0)->first();
    }

}