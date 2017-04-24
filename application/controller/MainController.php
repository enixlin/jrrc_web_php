<?php

namespace app\controller;

use think\Controller;
use app\model\User;

class MainController extends Controller
{
    public function index()
    {
        if (\session('name') == null) {
            $this->redirect('/jrrc_web_php/Login/login');
        } else {
            $this->assign('name', \session('name'));
            $this->assign('ruler', \session('ruler'));
            return $this->fetch('index');
        }
    }

    public function getAuthor()
    {

        $rule = model("Rule");
        $list = $rule->order('pid asc,id asc')->select();
        $tree = array();
        $node = array();

        foreach ($list as $l) {
           // echo($l['id'] . "</br>");
            $node[$l['id']][] = $l;

        }
        dump($node[2][0]['name']);

        foreach($node as $key=>$n){
            if($node[$key][0]['id']!=$n[0]['pid']){
                $node[$n[0]['pid']]['child'][]=$n;
            }

        }


        dump($node);
        //echo ($list[0]['id']);
    }
}
