<?php


namespace core\lib;


class log
{
    static $class;
    public static function init(){
        $drive=config::get('drive','log');
        $class='\core\lib\driver\log\\'.$drive;
        self::$class=new $class;
    }

    public static function log($message,$file='log'){
        self::$class->log($message,$file);
    }
}