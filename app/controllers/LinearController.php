<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 28.10.13
 * Time: 13:22
 */

class LinearController extends BaseController {

    public function buy($tarif = 5) {
        switch($tarif) {
            case 5:
                $linear = new Linear5();
                break;
            case 10:
                $linear = new Linear10();
                break;
            case 15:
                $linear = new Linear15();
                break;
            default: $linear = false;
        }
        if(Auth::user()->balance < $tarif)
            return Redirect::route('user.privat');
        Auth::user()->balance()->create(array(
            'summa' => -$tarif,
            'description' => 'Оплата тарифа '.$tarif
        ));
        $linear->user_id = Auth::user()->id;
        $linear->save();

        $linear->pay();

        $t = 'Linear'.$tarif;
        $c = $t::where('payed', '=', 1, 'and')->where('admin', '=', 0, 'and')->count();
        if($c>0 && $c % 4 == 0) {
            $linear2 = new $t();
            $linear2->admin = 1;
            $linear2->user_id = 1;
            $linear2->save();
        }
        return Redirect::route('user.privat');
    }

} 