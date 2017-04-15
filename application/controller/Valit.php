<?php 

namespace app\controller;
use think\Controller;
//验证用户是否已登录
class Valit extends Controller{
	
	public function  valitLogin(){
		if(\session("name")!=""){
			return true;
		}else{
			return false;
		}
	}
}

?>