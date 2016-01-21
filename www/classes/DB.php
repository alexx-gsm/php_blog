<?php


class DB
{
    protected $db_name = 'blog_php';
    protected $db_host = 'localhost';
    protected $db_user = 'php';
    protected $bd_pass = '123';

    private $dbh;

    public function __construct()
    {
        $this->dbh = new PDO("mysql:dbname=$this->db_name; host=$this->db_host", $this->db_user, $this->bd_pass);
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

    public function getCountRows( $sql )
    {
        $sel = $this->queryAll($sql);
        return count($sel);
    }

}