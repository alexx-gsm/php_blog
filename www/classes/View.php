<?php

class View
{
    const PATH = __DIR__ . '/../views/';
    protected $data = [];

    public function __set( $key, $val ) {
        $this->data[$key] = $val;
    }

    public function __get( $key ) {
        return $this->data[$key];
    }

    public function assign( $str, $data ) {
        //echo 'str='.$str, $data;
        //var_dump($str); var_dump($data); die;
        $this->data[$str] = $data;
    }

    public function display( $template ) {
        // var_dump($this->data); die;
        foreach( $this->data as $key => $val )
        {
            if( is_array($val) ) {
                foreach( $val as $k => $v ) {
                    $$k = $v;
                    continue;
                }
            }
            $$key = $val;
        }
        include self::PATH . $template;
    }
}