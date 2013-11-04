<?php

class Token extends Eloquent {

	protected $table = 'password_reminders';
	public $timestamps = false;
	protected $softDelete = false;


}