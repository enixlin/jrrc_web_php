<?php

namespace app\Controller;


use think\Controller;
use think\Request;
use app\model\UserModel as User;


class UserController extends Controller
{

//    protected $request;
    protected $user;


    /**
     * UserController constructor.
     * @param Request $request
     * @param User $user //构造函数时自动注入User实例
     * @param Role $role //构造函数时自动注入Role实例
     */
    public function __construct(User $user)
    {

        $this->user = $user;

    }


    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 新增用户.
     *
     * @return \think\Response
     */
    public function create()
    {
        $request = Request::instance();
        dump($request->getInput());
        $user['name']=$request->param('name');
        $user['password']=$request->param('password');
        $user['status']=1;
        $this->User->addUser($user);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {


    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit()
    {
        //
//        $request = Request::instance();
//        $user=json_decode($request->getInput());
//        //dump($user);
//        $condition=array();
//        foreach($user as $u){
//            array_push($condition,$u);
//        }
//        //dump($condition);
      //  $user=User::getAllUsers();

       // dump($this->user->getAllUsers());

        dump(model("user")->getAllUsers());





    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }


    /**
     * 查询所有的用户
     */
    public function getAllUsers()
    {
        $user=new UserModel();
       $result = $user->getAllUsers();
        return json($result);

    }

    /*
     * 添加用户
     * */
    public function addUser()
    {
        $request = Request::instance();
        $user=$request->param();
        $this->User->addRule($user);
    }


    public function getUserRole($UserId){
        return $this->User->getUserRole($UserId);
    }
}
