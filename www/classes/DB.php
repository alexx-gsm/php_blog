<?php


class DB
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new PDO("mysql:dbname=blog_php; host=localhost", 'php', '123');
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function queryAll( $sql, $class = 'stdClass' )
    {
        $res = $this->dbh->query($sql);

        if( false === $res ) {
            return false;
        }
        $ret = [];
        while( $row = $res->fetchObject($class) ) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function queryOne( $sql, $class = 'stdClass' )
    {
        return $this->queryAll($sql, $class)[0];
    }

    public function query( $sql )
    {

        return $this->dbh->query($sql);
    }

    public function getID()
    {
        return $this->dbh->lastInsertId();
    }

}