<?php
namespace Admin;

class AdminStatisticController extends \BaseController {

	/**
	 * Display a listing of the res ource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $sum = 0;
        $date_f = \Input::get('date_from', '2013-10-01').' 00:00:00';
        $date_t = \Input::get('date_to', date('Y-m-d')).' 23:59:59';
        $buysc = \Linear5::whereAdmin(0)->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->count();
        $payedc = \Linear5::whereAdmin(0)->wherePayed(1)->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->count();
        $data['linear'][] = array(
            'name' => 'Light 5$',
            'buys' => $buysc,
            'payed' => $payedc,
            'mm' => $buysc*5,
            'mp' => $payedc*7.5,
            'total' => $buysc*5-$payedc*7.5
        );
        $sum+= $buysc*5-$payedc*7.5;
        $buysc = \Linear10::whereAdmin(0)->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->count();
        $payedc = \Linear10::whereAdmin(0)->wherePayed(1)->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->count();
        $data['linear'][] = array(
            'name' => 'Happy 10$',
            'buys' => $buysc,
            'payed' => $payedc,
            'mm' => $buysc*10,
            'mp' => $payedc*15,
            'total' => $buysc*10-$payedc*15
        );
        $sum+= $buysc*10-$payedc*15;
        $buysc = \Linear15::whereAdmin(0)->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->count();
        $payedc = \Linear15::whereAdmin(0)->wherePayed(1)->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->count();
        $data['linear'][] = array(
            'name' => 'Super 15$',
            'buys' => $buysc,
            'payed' => $payedc,
            'mm' => $buysc*15,
            'mp' => $payedc*22.5,
            'total' => $buysc*15-$payedc*22.5
        );
        $sum+= $buysc*15-$payedc*22.5;
        $inv = \Inv::all();
        foreach($inv as $v) {            
            $data['invs'][$v->id]['name'] = $v->name;
            $data['invs'][$v->id]['buys'] = $v->buys()->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->count();
            $data['invs'][$v->id]['mm'] = $data['invs'][$v->id]['buys']*$v->cost;
            $data['invs'][$v->id]['mp'] = $v->totalPayed($date_f, $date_t);
            $data['invs'][$v->id]['total'] = $data['invs'][$v->id]['mm']-$data['invs'][$v->id]['mp'];
            $sum+= $data['invs'][$v->id]['total'];
        }

        $data['users']      = \User::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(5)->get();
        $data['sum'] = $sum;
        $data['date_f'] = $date_f;
        $data['date_t'] = $date_t;
        return \View::make('admin.statistic', $data);
	}

    public function process() {
        $input = \Input::all();
        $i = \Inv::find($input['type']);
        if($i != null) {
            $i->limit = $input['count'];
            $i->save();
        }
        return \Redirect::back()->with('status', 'Лимит установлен');
        /*switch($input['type']) {
            case 'l5':
                $t = 'Linear5';
                $s=5;
                break;
            case 'l10':
                $t = 'Linear10';
                $s=10;
                break;
            case 'l15':
                $t = 'Linear15';
                $s=15;
                break;
        }
        $count = $input['count'];
        for($i=0;$count*2>$i;$i++) {
            $linear2 = new $t();
            $linear2->admin = 1;
            $linear2->user_id = 0;
            $linear2->save();
            \Eloquent::unguard();
            \Balance::create(array(
                'user_id' => 0,
                'summa' => -$s*0.75,
                'description' => ''
            ));
            \Cache::flush();
        }*/
    }

}