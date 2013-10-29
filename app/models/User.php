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
        return $this->hasOne('Users', 'referral_id');
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

    public function l5pos() {
        $count = Linear5::wherePayed(1)->count();
        $u = $this->linear5()->orderBy('id')->first();
        if($u)
            return $u->id - $count;
        return 0;
    }

    public function l10pos() {
        $count = Linear10::wherePayed(1)->count();
        $u = $this->linear10()->orderBy('id')->first();
        if($u)
            return $u->id - $count;
        return 0;
    }

    public function l15pos() {
        $count = Linear15::wherePayed(1)->count();
        $u = $this->linear15()->orderBy('id')->first();
        if($u)
            return $u->id - $count;
        return 0;
    }

    public function balance()
    {
        return $this->hasMany('Balance');
    }

    public function getBalanceAttribute() {
        $b = $this->balance()->sum('summa');
        if(!$b)
            return 0;
        return $b;
    }

}