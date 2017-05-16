<?php

namespace app\model;

use think\Model;

class UserModel extends Model {

    //设置模型对应的数据库表为：用户表
    protected $name = 'user';

    /**
     * 查询所有用户的信息
     * @return static
     */
    public function getAllUsers() {
        //dump('static call');
        $user = $this->all();
        //dump($user);
        return $user;
        //return $user[0]->getData();
    }


    /**
     * 取得所有用户的用户名复印件
     * @return static
     */
    public function getAllUserName() {
        return $this->field('name,id')->select();
    }


    /**
     * 更新用户信息
     * @param $user 用户（对象数组）
     * @return 成功返回 1
     */
    public function updateUser($user) {
        try {
            foreach ($user as $u) {
                $this->update($u);
            }
            echo "1";
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";;
        }
    }


    /**
     * 添加用户
     * @param $user 用户
     * @return 成功返回 1
     */
    public function addUser($user) {
        try {
            $this->create($user);
            echo "1";
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";;
        }

    }


    /**
     * 删除用户
     * @param $user 删除的用户*（对象数组）
     * @return 成功返回 1
     */
    public function deleteUser($user) {
        try {
            foreach ($user as $u) {
                $this->where('id=' . $u->id)->delete();
            }
            echo "1";
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";;
        }
    }

}
