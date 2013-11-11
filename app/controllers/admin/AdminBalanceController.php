<?php
namespace Admin;

class AdminBalanceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index($id=0)
    {
        $data['s'] = $id;
        $data['sort'] = \Input::get('sort');
        $data['users'] = \User::remember(10)->get();
        $b = \Balance::orderBy('id', 'desc');
        $p = \Payment::orderBy('id', 'desc');
        switch($data['sort']) {
            case 'mp':
                $b->where('summa', '>', 0);
                $b->where('type', '=', 0);
                $b->where('referal_id', '==', 0);
                break;
            case 'mm':
                $b->where('summa', '<', 0);
                $b->where('type', '=', 0);
                break;
            case 'in':
                $b->where('type', '=', 1);
                $b->where('referal_id', '==', 0);
                break;
            case 'out':
                $b->where('type', '=', 2);
                break;
            case 'ref':
                $b->where('referal_id', '!=', 0);
                break;
        }
        if($id == 0) {
            $data['balance'] = $b->where('user_id', '!=', 0)->paginate(10);
            $data['payments'] = $p->where('user_id', '!=', 0)->get();
        } else {
            $data['balance'] = $b->where('user_id', '=', $id)->paginate(10);
            $data['payments'] = $p->where('user_id', '=', $id)->get();
        }
        $data['balance']->appends('sort', $data['sort']);

        return \View::make('admin.balance',$data);
    }
    public function checkout($id=0)
    {
        $data['s'] = $id;
        $data['sort'] = \Input::get('sort');
        $data['users'] = \User::remember(10)->get();
        $p = \Payment::orderBy('id', 'desc');
        if($id == 0) {
            $data['payments'] = $p->where('user_id', '!=', 0)->paginate(10);
        } else {
            $data['payments'] = $p->where('user_id', '=', $id)->paginate(10);
        }
        $data['payments']->appends('sort', $data['sort']);

        return \View::make('admin.checkout',$data);
    }

    public function process() {
        $i = \Input::all();
        if($i['type'] == 'Delete') {
            foreach($i['pay'] as $v) {
                $p = \Payment::find($v);
                $p->payed = 2;
                $p->save();
            }
        } else if($i['type'] == 'Pay') {
            foreach($i['pay'] as $v) {
                $p = \Payment::find($v);
                if($p->payed == 0 && !empty($p->to) && preg_match('/U.*/', $p->to)) {
                    $pm = new \PerfectMoney();
                    $u = $p->user;
                    $account = $p->to;
                    $amount = $p->summa*0.95;
                    if($amount <= $u->balance) {
                        if($pm->pay($amount, $account)) {
                            $p->payed = 1;
                            $p->save();
                            $u->balance()->create(array(
                                'description' => 'Вывод денег на кошелек PerfectMoney: '.$p->to,
                                'summa' => -$p->summa,
                                'type' => 2
                            ));
                            \Eloquent::unguard();
                            \Balance::create(array(
                                'description' => 'Отчисление: '.$p->to,
                                'summa' => $p->summa*0.05,
                                'type' => 15,
                                'user_id'=>0
                            ));
                        }

                    } else {
                        return \Redirect::back()->with('status', 'Заявка не обработана, проверьте платёжную cистему');
                    }
                } else {
                    $ok = new \OkPay();
                    $u = $p->user;
                    $account = $p->to;
                    $amount = $p->summa*0.95;
                    if($amount <= $u->balances) {
                        if($ok->pay($amount, $account)) {
                            $p->payed = 1;
                            $p->save();
                            $u->balance()->create(array(
                                'description' => 'Вывод денег на кошелек OkPay: '.$p->to,
                                'summa' => -$p->summa,
                                'type' => 2
                            ));
                            \Eloquent::unguard();
                            \Balance::create(array(
                                'description' => 'Отчисление: '.$p->to,
                                'summa' => $p->summa*0.05,
                                'type' => 15,
                                'user_id'=>0
                            ));
                        } else {
                            return \Redirect::back()->with('status', 'Заявка не обработана, проверьте платёжную cистему');
                        }

                    }
                }
            }
        }
        return \Redirect::to('/admin/checkout');
    }

    public function add() {
        $i = \Input::all();
        if(!(empty($i['summa']) && empty($i['user_id']))) {
            $u = \User::find($i['user_id']);
            $u->balance()->create(array(
                'description' => $i['description'],
                'summa' => $i['summa'],
                'type' => $i['type'],
            ));
        }
        return \Redirect::back();
    }

    /*public function perfectPay() {
        $pm = new PerfectMoney();
        $u = $this->user;
        $account = $u->perfectmoney;
        $amount = Input::get('amount', 0);
        if($amount <= $u->balance) {
            if($pm->pay($amount, $account)) {
                $u->balance()->create(array(
                    'summa' => -$amount,
                    'description' => 'Вывод денег на кошелек PerfectMoney: '.$account
                    ));
            }

        }

        return Redirect::route('user.linear')->with('status', 'Деньги успешно зачислены на ваш счёт!');
    }*/

//    public function okpayPay() {
//        $ok = new OkPay();
//        $u = $this->user;
//        $account = $u->okpay;
//        $amount = Input::get('amount', 0);
//        if($amount <= $u->balance && !empty($account)) {
//
//            if($ok->pay($amount, $account)) {
//                $u->balance()->create(array(
//                    'summa' => -$amount,
//                    'description' => 'Вывод денег на кошелек OkPay: '.$account
//                ));
//            }
//
//        }
//    }
}