<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启框架
 */
define('WZ',realpath(__DIR__));
define('CORE',WZ.'/core');
define('APP',WZ.'/app');
define('DEBUG',true);
define('MODULE','app');

include 'vendor/autoload.php';
if(DEBUG){
    $whoops = new \Whoops\Run;
    $errorTitle='框架出错了';
    $option=new \Whoops\Handler\PrettyPageHandler();
  //  $option->setPageTitle($errorTitle);
    $whoops->prependHandler($option);
    $whoops->register();
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}
include CORE.'/common/function.php';
include CORE.'/wz.php';

spl_autoload_register('\core\wz::load');

\core\wz::run();

