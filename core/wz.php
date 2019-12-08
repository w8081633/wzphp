<?php

namespace core;

use core\lib\log;
use core\lib\route;
use mysql_xdevapi\Exception;

class wz
{
    public static $classMap = [];
    public $assign;
    public static function run()
    {
        log::init();
        $route=new route();
        $controller=$route->ctrl;
        $action=$route->action;
        $controllerFile=APP.'/controllers/'.$controller.'Controller.php';
        $controller = '\\'.MODULE.'\controllers\\'.$controller.'Controller';
        if(is_file($controllerFile)){
            include $controllerFile;
            $ctrl=new $controller();
            $ctrl->$action();
            log::log('controller : '.$controller.' actioin : '.$action);
        }else{
            throw new \Exception('找不到该控制器'.$controller);
        }
    }

    public static function load($class)
    {
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = WZ .'/' . $class . '.php';
            if (is_file($file)) {
                include($file);
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }

    }

    public function assign($name,$val){
        $this->assign[$name]=$val;
    }

    public function display($file){
        $filePath=APP.'/views/'.$file;
        if(is_file($filePath)){
            $loader = new \Twig\Loader\FilesystemLoader(APP.'/views');
            $twig = new \Twig\Environment($loader, [
                'cache' => WZ.'/log/twig',
                'debug='=>DEBUG,
            ]);
            $template=$twig->loadTemplate($file);
            $template->display($this->assign?$this->assign:'');
        }
    }
}