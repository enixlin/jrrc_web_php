<?php

namespace app\controller;

use think\Controller;
use app\model\User;
use think\Hook;

class MainController extends Controller
{


    public function getUserRoles(){

    }


    public function index()
    {

        $this->assign('name', \session('name'));
        $this->assign('ruler', \session('ruler'));
        return $this->fetch('index');
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

        foreach ($node as $key => $n) {
            if ($node[$key][0]['id'] != $n[0]['pid']) {
                $node[$n[0]['pid']]['child'][] = $n;
            }

        }

        dump($node);
     
    }
}
