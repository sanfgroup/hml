<?php

class Linear15 extends Eloquent {

	protected $table = 'queue_linear_15';
	public $timestamps = true;
	protected $softDelete = false;
    protected $tarif = 15;

    public static function pay() {
        $pos = Linear15::fnp();
        $ac = Linear15::whereAdmin(1)->where('id', '<=', $pos->id)->count();
        $post = 2*($pos->id+1-$ac);
        $del = Linear15::whereAdmin(2)->where('id', '<=', $post)->count();
        $post = 2*($pos->id+1-$ac)+$del;
        $ttt = Linear15::find($post);
        if(isset($ttt->admin) && $ttt->admin < 2 && $pos->admin != 2) {
            while($pos->admin == 1) {
                $pos->payed = 1;
                $pos->save();
                $pos = Linear15::find($pos->id+1);
            }
            $u = User::find($pos->user_id);
            if($u) {
                Cache::flush();
                $summ = $pos->tarif*1.5;
                $u->balance()->create(array(
                    'summa' => $summ,
                    'description' => 'Начисление по тарифу Super '.$pos->tarif.'$'
                ));

                $data['email'] = $u->email;
                $data['fio'] = $u->fio;
                $data['summa'] = 15;
                $data['summap'] = $data['summa']*1.5;
                $data['name'] = "Super";
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

    public function pos() {
        $count = Linear15::wherePayed(1)->count();
        return $this->orderBy('id')->first()->id - $count;
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function fnp() {
        return Linear15::orderBy('id')->wherePayed(0)->first();
    }

}