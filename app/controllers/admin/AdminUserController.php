<?php
namespace Admin;

use View, User, Input, Redirect;

class AdminUserController extends \BaseController {

	/**
	 * Display a listing of the re source.
	 *
	 * @return Response
	 */
	public function index()
	{
        $id = Input::get('id');
        $names = Input::get('names');
        $data['s'] = $id;
        if($id != 0) {
            $data['users'] = User::whereId($id)->paginate(10);
        }
        elseif($names){
           $data['users'] = User::whereRaw('fio LIKE ?', array("%$names%"))->paginate(10);
        }
        else {
            $data['users'] = User::orderBy('id', 'desc')->paginate(10);
        }
		return View::make('admin.user.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $data['user'] = User::find($id);
        return View::make('admin.user.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = User::find($id);
        $user->fio = Input::get('fio');
        $new_pass = Input::get('new_pass');
        if(!empty($new_pass))
            $user->password = \Hash::make($new_pass);
        $user->email = Input::get('email');
        $user->skype = Input::get('skype');
        $user->perfectmoney = Input::get('perfectmoney');
        $user->okpay = Input::get('okpay');
        $user->save();
        return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
        \Balance::where('user_id', $id)->delete();
        \InvBuy::where('user_id', $id)->delete();
        $lin = \Linear5::where('user_id', $id)->get();
        foreach($lin as $v) {
            $v->payed=2;
            $v->admin=2;
            $v->save();
        }
        $lin = \Linear10::where('user_id', $id)->get();
        foreach($lin as $v) {
            $v->payed=2;
            $v->admin=2;
            $v->save();
        }
        $lin = \Linear15::where('user_id', $id)->get();
        foreach($lin as $v) {
            $v->payed=1;
            $v->admin=2;
            $v->save();
        }
        return Redirect::back();
	}
    public function loginBy($id){
        $us = User::find($id);
        \Auth::login($us);
        return Redirect::route('private.inv');
    }

}