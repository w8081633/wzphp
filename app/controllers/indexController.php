<?php
namespace app\controllers;

use app\model\cate;
use core\lib\config;
use core\lib\log;
use core\lib\model;
use core\wz;

class indexController extends wz
{
    public function index(){
//        $cateModel=new cate();
//        dump($cateModel->lists());
//        dump($cateModel->deleteOne(4));
//        dump($cateModel->getOne(5));
//$data=['cate_name'=>'123'];
//        dump($cateModel->setOne(5,$data));
        //p($model->insert('cate',['cate_name'=>'666']));
        $data='hello world';
        $title='this is title';
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display('index.html');

    }
}