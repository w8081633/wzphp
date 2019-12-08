<?php


namespace core\lib;


class route
{
   public $ctrl=[];
   public $action=[];
 public function __construct()
 {
     if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/' ){
         $path=$_SERVER['REQUEST_URI'];
         $pathArr=explode('/',trim($path,'/'));

         if(isset($pathArr[0])){
             $this->ctrl=$pathArr[0];
             unset($pathArr[0]);
         }
            unset($_GET[$path]);
         if(isset($pathArr[1])){
             $this->action=$pathArr[1];
             unset($pathArr[1]);
         }else{
             $this->action=config::get('action','route');
         }
         //url多余部分 转换成get
         $count=count($pathArr)+2;
         $i=2;
         while($i<$count){
             if(isset($pathArr[$i+1])){
                 $_GET[$pathArr[$i]]=$pathArr[$i+1];
             }
            $i=$i+2;
         }

     }else{
         $this->ctrl=config::get('controller','route');
         $this->action=config::get('action','route');
     }
 }
}