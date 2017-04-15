<?php

namespace app\controller;

use think\Controller;
use app\model\User;

class Main extends Controller {
	
	public function index(){
		if(\session('name')==null){
			$this->redirect('/jrrc_web_php/Login/login');
		}else{
			 $this->assign('name',\session('name'));
			 $this->assign('ruler',\session('ruler'));
			return $this->fetch('index');
		}
	}
	
	
	
	
	
	
}
