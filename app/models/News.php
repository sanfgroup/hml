<?php

class News extends Eloquent {

	protected $table = 'news';
	public $timestamps = true;
	protected $softDelete = false;

    function getShortAttribute() {
        $string = $this->content;
        $words=explode(" ",$string);
        return implode(" ",array_splice($words,0,60));
    }

}