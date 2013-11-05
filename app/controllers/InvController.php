<?php
/**
 * Created by PhpStorm.
 * User: vinnizp
 * Date: 31.10.13
 * Time: 15:21
 */

class InvController extends BaseController {

    public function buy($id=0) {
        return Redirect::back()->with('status', 'Покупка будет открыта только 05.11.2013');
        $s = Session::get('buy');
//        dd(($id==0 || ($s != null && $s+5 < time())));
        if($id==0 || ($s != null && $s+5 >= time()))
            return Redirect::back()->with('status', 'Вы не можете покупать тарифы так часто');

        $inv = Inv::find($id);
        if($inv != null && $inv->limit > 0) {
            $user = $this->user;
            if($user->balance >= $inv->cost) {
                $inv->limit--;
                $user->buys()->create(array(
                    'inv_id' => $id,
                    'col'=> 0
                ));
                Cache::flush();

                $data['email'] = $user->email;
                $data['fio'] = $user->fio;
                $data['summa'] = $inv->cost;
                $data['name'] = $inv->name;
                Mail::send('emails.inv', $data, function($message) use ($data)
                {
                    $message->to($data['email'], $data['fio'])->subject('Приобретение линейки тарифа '.$data['name'].'!');
                });
                Session::put('buy', time());
                $inv->save();
                $user->balance()->create(array(
                    'summa' => -$inv->cost,
                    'description' => 'Оплата тарифа '.$inv->name
                ));
                $data['email'] = $user->email;
                $data['fio'] = $user->fio;
                $ref = $user->mr();
                if(isset($ref->username)) {
                    $data['referal'] = $ref->username;
                    $data['summa'] = $inv->cost*0.07;
                    Mail::send('emails.referal', $data, function($message) use ($data)
                    {
                        $message->to($data['email'], $data['fio'])->subject('Реферальное вознаграждение!');
                    });

                    $ref->balance()->create(array(
                        'summa' => $inv->cost*0.07,
                        'description' => 'Начисление от реферала '.$user->username
                    ));
                    $data['email'] = $user->email;
                    $data['fio'] = $user->fio;
                    $ref = $ref->mr();
                    if(isset($ref->username)) {
                        $data['referal'] = $ref->username;
                        $data['summa'] = $inv->cost*0.03;
                        Mail::send('emails.referal', $data, function($message) use ($data)
                        {
                            $message->to($data['email'], $data['fio'])->subject('Реферальное вознаграждение!');
                        });
                        $ref->balance()->create(array(
                            'summa' => $inv->cost*0.03,
                            'description' => 'Начисление от реферала '.$user->username
                        ));
                    }
                }
            }
            else
                return Redirect::back()->with('status', 'У вас недостаточно денег на счету, пополните свой баланс!');
        }
        else
            return Redirect::back()->with('status', 'ЛИМИТ ИСЧЕРПАН. ОТКРЫТИЕ ЛИМИТОВ ПРОИСХОДИТ В 12.30 МСК И В 19.30 МСК.');
        return Redirect::back()->with('status', 'Вы успешно купили тариф '.$inv->name.' за '.$inv->cost.'$!');
    }

} 