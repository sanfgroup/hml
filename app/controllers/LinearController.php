<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 28.10.13
 * Time: 13:22
 */

class LinearController extends BaseController {

    public function buy($tarif = 5) {
        return Redirect::back()->with('status', 'Покупка будет открыта только 05.11.2013');
        switch($tarif) {
            case 5:
                $linear = new Linear5();
                $tname = "Light";
                break;
            case 10:
                $linear = new Linear10();
                $tname = "Happy";
                break;
            case 15:
                $linear = new Linear15();
                $tname = "Super";
                break;
            default:
                return Redirect::back()->with('status', 'Не существует такого тарифа!');
        }
        if($this->user->balance < $tarif)
            return Redirect::back()->with('status', 'У вас недостаточно денег на счету, пополните свой баланс!');
        $this->user->balance()->create(array(
            'summa' => -$tarif,
            'description' => 'Оплата тарифа '.$tarif
        ));
        $linear->user_id = $this->user->id;
        $linear->save();

        $data['email'] = $this->user->email;
        $data['fio'] = $this->user->fio;
        $data['summa'] = $tarif;
        $data['name'] = $tname;
        Mail::send('emails.linear', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['fio'])->subject('Приобретение линейного тарифа '.$data['name'].'!');
        });
        Cache::flush();

//        $t = 'Linear'.$tarif;
//        $c = $t::where('payed', '=', 1, 'and')->where('admin', '=', 0, 'and')->count();
//        if($c>0 && $c % 4 == 0) {
//            $linear2 = new $t();
//            $linear2->admin = 1;
//            $linear2->user_id = 1;
//            $linear2->save();
//            $linear2 = new $t();
//            $linear2->admin = 1;
//            $linear2->user_id = 1;
//            $linear2->save();
//        }
        return Redirect::back()->with('status', 'Вы успешно купили тариф за '.$tarif.'$!');
    }

} 