<?php
/**
 * Created by PhpStorm.
 * User: vinnizp
 * Date: 31.10.13
 * Time: 15:21
 */

class InvController extends BaseController {

    public function buy($id=0) {
        $s = Session::get('buy');
//        dd(($id==0 || ($s != null && $s+5 < time())));
        if($id==0 || ($s != null && $s+5 >= time()))
            return Redirect::back();

        $inv = Inv::find($id);
        if($inv != null && $inv->limit > 0) {
            $user = Auth::user();
            if($user->balance >= $inv->cost) {
                $inv->limit--;
                $user->buys()->create(array(
                    'inv_id' => $id,
                    'col'=> 0
                ));
                Session::put('buy', time());
                $inv->save();
                $user->balance()->create(array(
                    'summa' => -$inv->cost,
                    'description' => 'Оплата тарифа '.$inv->name
                ));
                $ref = $user->referral();
                if(isset($ref->username)) {
                    $ref->balance()->create(array(
                        'summa' => $inv->cost*0.07,
                        'description' => 'Начисление от реферала '.$user->username
                    ));
                    $ref = $ref->referral();
                    if(isset($ref->username)) {
                        $ref->balance()->create(array(
                            'summa' => $inv->cost*0.03,
                            'description' => 'Начисление от реферала '.$user->username
                        ));
                    }
                }
            }
        }
        return Redirect::back();
    }

} 