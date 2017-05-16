<?php

namespace app\controller;

use app\model\UserModel as User;
use think\Controller;
use think\Request;

class LoginController extends Controller {


    //这是一个测试的文件
    public function show() {
    }

    public function __construct(Request $request, User $user) {
        parent::__construct();
        $this->request = $request;
        $this->User = $user;

    }

    // 用户登录界面
    /**
     * @return mixed
     */
    public function login() {

        return $this->fetch('login');

    }


    public function handle_login($id, $password) {

        $result = 0;
        $users = $this->getAllUsers();
        foreach ($users as $u) {
            if ($u ['id'] == $id && $u ['password'] == $password) {
                $result = 1;
                \session("name", $u ['name']);
                \session('id', $u ['id']);
                \session('ruler', "正式用户");
            }
        }
        return $result;
    }

    /**
     * 获得所有用户的名字
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAllUsersName() {
        $result = $this->User->getAllUserName();
        return $result;
    }

    /**获得所有用户
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAllUsers() {
        $result = $this->User->getAllUsers();
        return $result;
    }

    public function logout() {
        \session(null);
    }
}
