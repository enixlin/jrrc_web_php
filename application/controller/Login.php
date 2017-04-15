<?php

namespace app\controller;

use think\Controller;
use app\model;
use app\model\User;

class Login extends Controller {
	// class Login {
	public function login() {
		if (\session ( 'id' ) != null) {
			$this->redirect('/jrrc_web_php/Main/index');
		} else {
			return $this->fetch ( 'login' );
		}
	}
	public function handle_login($id, $password) {
		// echo 'php server :'.$id."---------".$password;
		$result = 0;
		$users = $this->getAllUsers ();
		foreach ( $users as $u ) {
			if ($u ['id'] == $id && $u ['password'] == $password) {
				$result = 1;
				\session ( "name", $u ['name'] );
				\session ( 'id', $u ['id'] );
				\session ( 'ruler', "正式用户" );
			}
		}
		return $result;
	}
	public function getAllUsersName() {
		$user = model ( "User" );
		$result = $user->field ( 'name,id' )->select ();
		return $result;
	}
	public function getAllUsers() {
		$user = model ( "User" );
		$result = $user->select ();
		return $result;
	}
	
	public function logout(){
		\session(null);
	}
}
