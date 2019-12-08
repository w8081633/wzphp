<?php
namespace app\model;

class cate extends \core\lib\model
{
    public $table='cate';

    public function lists(){
        return $this->select($this->table,['cate_name']);
    }

    public function getOne($id){
        return $this->get($this->table,'*',['cate_id'=>$id]);
    }

    public function setOne($id,$data){
        return $this->update($this->table,$data,['cate_id'=>$id]);
    }

    public function deleteOne($id){
        $this->delete($this->table,['cate_id'=>$id]);
    }
}