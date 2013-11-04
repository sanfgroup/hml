<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    protected $fillable = array('*');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    public function referral()
    {
        return $this->hasOne('User', 'referal_id');
    }

    public function mr()
    {
        return $this->belongsTo('User', 'referal_id');
    }

    public function linear5()
    {
        return $this->hasMany('Linear5');
    }
    public function linear10()
    {
        return $this->hasMany('Linear10');
    }
    public function linear15()
    {
        return $this->hasMany('Linear15');
    }

    public function balance()
    {
        return $this->hasMany('Balance');
    }

    public function buys()
    {
        return $this->hasMany('InvBuy');
    }

    public function getL5posAttribute() {
        $arr = array();
        $count = Linear5::wherePayed(1)->remember(1)->count();
        $u = $this->linear5()->wherePayed(0)->remember(1)->orderBy('id')->get();
        if($u != null)
        foreach($u as $v) {
            if($v)
                $arr[] = $v->id - $count;
        }
        return $arr;
    }

    public function getL10posAttribute() {
        $arr = array();
        $count = Linear10::wherePayed(1)->remember(1)->count();
        $u = $this->linear10()->wherePayed(0)->orderBy('id')->remember(1)->get();
        if($u != null)
        foreach($u as $v) {
            if($v)
                $arr[] = $v->id - $count;
        }
        return $arr;
    }

    public function getL15posAttribute() {
        $arr = array();
        $count = Linear15::wherePayed(1)->remember(1)->count();
        $u = $this->linear15()->wherePayed(0)->remember(1)->orderBy('id')->get();
        if($u != null)
        foreach($u as $v) {
            if($v)
                $arr[] = $v->id - $count;
        }
        return $arr;
    }

    public function getBalanceAttribute() {
        $b = $this->balance()->sum('summa');
        if(!$b)
            return 0;
        return round($b,2);
    }

    public function getReflinkAttribute() {
        return URL::to('/').'/?ref='.$this->username;
    }

    public function getRefnameAttribute() {
        if($this->referal_id == 0)
            return "";
        return $this->referral()->first()->username;
    }

    public function payments()
    {
        return $this->hasMany('Payment');
    }

}