<?php

namespace app\Controller;


use app\model\UserModel as User;
use think\Controller;
use think\Request;


class UserController extends Controller {

    //    protected $request;
    protected $user;


    /**
     * UserController constructor.
     * @param Request $request
     * @param User $user //构造函数时自动注入User实例
     * @param Role $role //构造函数时自动注入Role实例
     */
    public function __construct(User $user) {

        $this->user = $user;

    }


    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index() {
        //
    }

    /**
     * 新增用户.
     *
     * @return \think\Response
     */
    public function addUser() {
        $request = Request::instance();
        // dump($request);
        $user = array();
        $user['name'] = $request->param('name');
        $user['password'] = $request->param('password');
        $user['status'] = $request->param('status');
        $user['oa_name'] = $request->param('oa_name');
        $user['oa_password'] = $request->param('oa_password');

        $this->user->addUser($user);


    }



    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function updateUser() {
        $request = Request::instance();
        $user = json_decode($request->getInput());
        $this->user->updateUser($user);

    }





    /**
     * 查询所有的用户
     */
    public function getAllUsers() {
        $user = $this->user->order("id desc")->select();
        return json($user);

    }


    //删除用户
    public function deleteUser() {
        $request = Request::instance();
        $user = json_decode($request->getInput());
       // dump($user);
        $this->user->deleteUser($user);
    }
}
