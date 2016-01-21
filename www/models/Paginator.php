<?php


class Paginator extends AbstractModel
{
    public $_pages;
    public $_page;

    public function __construct( $page = 1, $pages = 10)
    {
        $this->_page = $page-1;
        $this->_pages = $pages;
    }


    public function getPage()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table;
        $items = $db->queryAll($sql, static::$class);
        $page = [];
        $start = $this->_page * $this->_pages;
        $end = $start + $this->_pages;
        // echo $this->_page, $this->_pages, $start, $end;
        for( $i = $start; $i < $end; $i++) {
            $page[] = $items[$i];
            // echo 'i= '.$i.' ';
        }

        return $page;
    }


}