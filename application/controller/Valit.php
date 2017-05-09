<?php

namespace app\controller;

use think\Controller;

//验证用户是否已登录
class Valit extends Controller
{
    public function run()
    {
        if (\session("name") == null or \session("name")=="" ) {
            $this->redirect('/jrrc_web_php/Login/login');
        }
    }
}

?>