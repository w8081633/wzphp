<?php
namespace core\lib\driver\log;

use core\lib\config;

class file{
    public $path;
    public function __construct()
    {
        $conf=config::get('option','log');
        $this->path=$conf['path'];
    }

    public function log($message,$file='log'){
       if(!is_dir($this->path.date('YmdH'))){
           mkdir($this->path.date('YmdH'),'0777',true);
       }
       $date=date('Y-m-d H:i:s');
        return file_put_contents( $this->path.date('YmdH').'/'.$file,$date.' '.json_encode($message,JSON_UNESCAPED_UNICODE).PHP_EOL,FILE_APPEND);
    }
}