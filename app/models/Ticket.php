<?php

class Ticket extends Eloquent {

	protected $table = 'tickets';
	public $timestamps = true;
	protected $softDelete = false;

}