<?php

class View
{
    const PATH = __DIR__ . '/../views/';
    protected $data = [];

    public function __set( $key, $val )
    {
        $this->data[$key] = $val;
    }

    public function __get( $key )
    {
        return $this->data[$key];
    }

    public function display($template)
    {
        foreach( $this->data as $key => $val )
        {
            $$key = $val;
        }
        include self::PATH . $template;
    }
}