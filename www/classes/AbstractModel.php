<?php


abstract class AbstractModel implements IModel
{
    protected static $table;
    protected static $class;

    public static $id = 1;
    public static $title = '';
    public static $img;
    public static $intro = '';
    public static $text = '';

    public static function getAll()
    {
        $db = new DB;
        return $db->queryAll('SELECT * FROM ' . static::$table, static::$class);
    }

    public static function getOne($id)
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
        return $db->queryOne($sql, static::$class);
    }
}