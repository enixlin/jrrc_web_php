<?php
/**
 * Created by IntelliJ IDEA.
 * User: linzhenhuan
 * Date: 2017/5/1
 * Time: 10:21
 */
namespace app\model;
use think\Model;


class RoleModel extends Model{

    public function getRoleById($Id){
        $condition['id']=$Id;
        return $this->where($condition)->select();
    }


}