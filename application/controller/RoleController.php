<?php
/**
 * Created by IntelliJ IDEA.
 * User: linzhenhuan
 * Date: 2017/5/16
 * Time: 11:29
 */

namespace app\controller;

use app\model\RoleModel as Role;
use think\Controller;
use think\Request;


class RoleController extends Controller {

    public function __construct(Role $role) {
        $this->role = $role;
    }

    public function addRole() {
        $request = Request::instance();
        $role = array();
        $role['id']=$request->param('id');
        $role['role_name'] = $request->param('role_name');
        $role['status'] = $request->param('status');
        $this->role->addRole($role);

    }

    public function updateRole() {

        $request = Request::instance();
        $role = json_decode($request->getInput());
        $this->role->updateRole($role);
    }

    public function deleteRole() {
        $request = Request::instance();
        $role = json_decode($request->getInput());
        $this->role->deleteRole($role);
    }

    public function getAllRole() {
        return $result = $this->role->all();
    }


}