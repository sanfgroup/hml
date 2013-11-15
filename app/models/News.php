<?php

class News extends Eloquent {

	protected $table = 'news';
	public $timestamps = true;
	protected $softDelete = false;

    function getShortAttribute() {
        $string = strip_tags($this->content);
        return preg_match("/^((\S*\s*){45})/s", $string, $m) ? "<p>{$m[1]}...</p>" : $string;
    }

}