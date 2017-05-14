<?php

namespace app\controller;

use app\model\RuleModel as Rule;
use think\Controller;
use think\Request;

class RuleController extends Controller
{


    public function __construct(Request $request, Rule $rule)
    {
        parent::__construct();
        $this->request = $request;
        $this->Rule = $rule;

    }


    public function getAllRules($node)
    {
        $result = $this->Rule->getAllRules();
        $list = array();
        foreach ($result as $key => $r) {
            $list[$key]['id'] = $r['id'];
            $list[$key]['url'] = $r['url'];
            $list[$key]['title'] = $r['title'];
            $list[$key]['pid'] = $r['pid'];
            $list[$key]['functionName']=$r['functionName'];
            $list[$key]['child'] = array();
        }

        $pk = 'id';
        $pid = 'pid';
        $child = 'child';
        $root = $node;
        // 创建Tree
        $tree = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];

            }
            //dump($refer);
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];
                // echo ( ($data['condition']));


                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                } else {

                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =&$list[$key];
                    }


                }
            }
        }


        foreach ($refer as $key => $data) {

            if (count($data['child'],1)==0) {
                $refer[$key]["leaf"] = true;
            } else {
                $refer[$key]["leaf"] = false;
            }
        }

        return json($tree);

    }


    public function index()
    {

        return $this->fetch('index');
    }



    public function showRuleTable(){
//        return $this->Rule->getAllRules();
        return json($this->Rule->getAllRules());
    }



    public function addRule(){
        $request = Request::instance();
        $rule=$request->param();
        $this->Rule->addRule($rule);
    }

}