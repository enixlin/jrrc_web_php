<?php
/**
 * Created by IntelliJ IDEA.
 * User: linzhenhuan
 * Date: 2017/5/1
 * Time: 10:21
 */
namespace app\model;

use think\Exception;
use think\Model;


class RoleModel extends Model {

    //添加角色
    public function addRole($role) {
        try {
            foreach ($role as $r) {
                $this->insert($r);
            }
            echo "1";
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

    }

    //更新角色
    public function updateRole($role) {
        try {
            foreach ($role as $r) {
                $this->update($r);
            }
            echo "1";
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

    }

    //删除角色
    public function deleteRole($role) {
        try {
            foreach ($role as $r) {
                $this->delete($r);
            }
            echo "1";
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    //取得所有的角色
    public function getAllRole() {
        return $result = $this->all();
    }


}