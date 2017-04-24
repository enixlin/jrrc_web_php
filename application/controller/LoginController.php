<?php

namespace app\controller;

use think\Controller;
use app\model;
use app\model\UserModel as User;
use think\Request;

class LoginController extends Controller
{


    public function __construct(Request $request, User $user)
    {
        parent::__construct();
        $this->request = $request;
        $this->User = $user;

    }

    // 用户登录界面
    /**
     * @return mixed
     */
    public function login()
    {
        // 先通过session用户是否已经登录，
        if (\session('id') != null) {
            $this->redirect('/jrrc_web_php/Main/index');
        } else {
            // 没有登录，返回登录界面
            return $this->fetch('login');
        }
    }




    public function handle_login($id, $password)
    {

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

    public function getAllUsersName()
    {
        $result = $this->User->getAllUserName();
        return $result;
    }

    public function getAllUsers()
    {
        $result = $this->User->getAllUsers();
        return $result;
    }

    public function logout()
    {
        \session(null);
    }
}
