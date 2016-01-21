<?php

class News extends AbstractModel
{
    public $id = 1;
    public $title = '';
    public $img;
    public $intro = '';
    public $text = '';

    protected static $table = 'articles';
    protected static $class = 'News';

    public function getID()
    {
        return $this->id;
    }
}