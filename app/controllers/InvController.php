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
        if($id==0 || $s+5 <= time())
            return Redirect::back();

        $inv = Inv::find($id);
        if($inv != null && $inv->limit > 0) {
            $user = Auth::user();
            if($user->balance >= $inv->cost) {
                $inv->limit--;
                $inv->save();
                $user->balance()->create(array(
                    'summa' => -$inv->cost,
                    'description' => 'Оплата тарифа '.$inv->name
                ));
                $user->buys()->create(array(
                    'inv_id' => $id,
                    'col'=> 0
                ));
                Session::put('buy', time());
            }
        }
    }

    public function process() {
        $invs = Inv::all();
        foreach($invs as $inv) {
            foreach($inv->buys()->where('col', '<', 7) as $v) {
                if(($v->last+(3*24*60*60)) <= time()) {

                    $v->user()->balance()->create(array(
                        'summa' => $inv->payment[$v->col],
                        'description' => 'nYfaxnbcakntyabnt apna '.$inv->name
                    ));
                    $v->col++;
                    $v->save();
                    $v->touch();
                }
            }
        }
    }

} 