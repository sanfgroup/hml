<?php

class News extends Eloquent {

	protected $table = 'news';
	public $timestamps = true;
	protected $softDelete = false;

    function getShortAttribute() {
        $string = $this->content;
        $words=explode("</p>",$string);
        return $words[0]."</p>";
    }

}