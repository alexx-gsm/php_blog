<?php


class Paginator extends AbstractModel
{
    protected static $table = 'articles';
    protected static $class = 'News';

    public $limit;
    public $page;

    public function __construct( $page, $limit)
    {
        $this->page = $page-1;
        $this->limit = $limit;
    }

    public function getPage()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table;
        $items = $db->queryAll($sql, static::$class);
        $page = [];
        $start = $this->page * $this->limit;
        $end = $start + $this->limit;
        for( $i = $start; $i < $end; $i++ ) {
            if( $items[$i] ) {
                $page[] = $items[$i];
            } else break;
        }

        // var_dump($page); die;

        return [
                'items' => $page,
                'num_entries' => count($items),
                ];
    }


}