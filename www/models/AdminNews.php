<?php


class AdminNews extends AbstractModel
{
    protected static $table = 'articles';
    protected static $class = 'AdminNews';

    public static function update()
    {
        $db = new DB;

        $sql = "UPDATE " . static::$table . " SET title='" . static::$title
            . "', intro='" . static::$intro . "', text='" . static::$text
            . "' WHERE id=" . static::$id;
        $db->query($sql);
        return $db->getId();
    }

    public static function save()
    {
        $db = new DB;

        $val = "'" . static::$title . "', '" . static::$intro . "', '" . static::$text . "'";
        $sql = 'INSERT INTO ' . static::$table . " (title, intro, text) VALUES ($val)";
        $db->query($sql);
        return $db->getId();
    }

    public static function del()
    {
        $db = new DB;

        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=' . static::$id;
        $db->query($sql);
    }
}