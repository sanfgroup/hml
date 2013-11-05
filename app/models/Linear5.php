<?php

class Linear5 extends Eloquent {

	protected $table = 'queue_linear_5';
	public $timestamps = true;
	protected $softDelete = false;
    protected $tarif = 5;

    public static function pay() {
        $pos = Linear5::fnp();
        $ac = Linear5::whereAdmin(1)->where('id', '<=', $pos->id)->count();
        if(Linear5::find(2*($pos->id+1-$ac))) {
            while($pos->admin == 1) {
                $pos->payed = 1;
                $pos->save();
                $pos = Linear5::find($pos->id+1);
            }
            $u = User::find($pos->user_id);
            if($u) {Cache::flush();
                $summ = $pos->tarif*1.5;
                $u->balance()->create(array(
                    'summa' => $summ,
                    'description' => 'Начисление по тарифу Light '.$pos->tarif.'$'
                ));

                $data['email'] = $u->email;
                $data['fio'] = $u->fio;
                $data['summa'] = 5;
                $data['summap'] = $data['summa']*1.5;
                $data['name'] = "Light";
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
                return "1";
            }
        }
    }


    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function fnp() {
        return Linear5::orderBy('id')->wherePayed(0)->first();
    }

}