<?php
/**
 * Created by IntelliJ IDEA.
 * User: linzhenhuan
 * Date: 2017/4/28
 * Time: 16:14
 */

namespace  app\model;
use think\Model;


class RuleModel extends  Model{

    public  $_child=array();
    public $name;

    /**
     *取得所有的权限记录
     */
    public function getAllRules(){

        return $this->select();
    }

    //添加用户权限
    public function addRule($rule){
        $this->insert($rule);
    }

    public function deleteRule($id){
        $this->delete($id);
    }

    public function modifyRule($rule){

    }

    public function getRuleByUser($userId){



    }

    public function getRuleByGroup($group){
        $condition['group']=$group;
        $result=$this->where($condition)->select();
        return $result;

    }

    public function getRuleNode($parentNodeId){
        $condition['pid']=$parentNodeId;
        return $this->where($condition)->select();
    }


}