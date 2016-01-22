<?php

class Variables
{

    public static function Host()
    {
        return "http://" . $_SERVER['HTTP_HOST'];
    }

    public static function urlAddNews( $ctrl = 'News' )
    {
        return Variables::Host() . "/index.php?ctrl=" . $ctrl . "&act=New";
    }

    public static function urlDelNews( $ctrl = 'News' )
    {
        return Variables::Host() . "/index.php?ctrl=" . $ctrl . "&act=Del";
    }

    public static function urlAllNews( $ctrl = 'News' )
    {
        return Variables::Host() . "/index.php?ctrl=" . $ctrl . "&act=All";
    }

}
//$url_add_news = $host . "/index.php?ctrl=AdminNews&act=New";
//$url_all_news = $host . "/index.php?ctrl=AdminNews&act=All";