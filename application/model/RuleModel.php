<?php
/**
 * Created by IntelliJ IDEA.
 * User: linzhenhuan
 * Date: 2017/5/1
 * Time: 10:21
 */
namespace app\model;

use think\Exception;
use think\Model;


class RuleModel extends Model {

    //添加角色
    public function addRule($rule) {
        try {
            $this->create($rule);
            echo "1";
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";;
        }

    }

    //更新角色
    public function updateRule($rule) {
        // dump($rule);
        try {
            foreach ($rule as $r) {
                $this->update($r);
            }
            echo "1";
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

    }

    //删除角色
    public function deleteRule($role) {
        try {
            foreach ($rule as $r) {
                $this->where('id=' . $r->id)->delete();
            }
            echo "1";
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";;
        }
    }

    //取得所有的角色
    public function getAllRule() {
        return $result = $this->all();
    }


    public function makeRuleTree($node) {
        $result = $this->getAllRule();
        $list = array();
        foreach ($result as $key => $r) {
            //             fields: ['id', 'controller', 'rule_name', 'p_id', 'leaf', 'js_file'],
            $list[$key]['id']           = $r['id'];
            $list[$key]['rule_id']      = $r['rule_id'];
            $list[$key]['controller']   = $r['controller'];
            $list[$key]['rule_name']    = $r['rule_name'];
            $list[$key]['p_id']         = $r['p_id'];
            $list[$key]['js_file']      = $r['js_file'];
            $list[$key]['child']        = array();
        }

        $pk = 'rule_id';
        $pid = 'p_id';
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
                        $parent[$child][] =& $list[$key];
                    }


                }
            }
        }

        foreach ($refer as $key => $data) {

            if (count($data['child'], 1) == 0) {
                $refer[$key]["leaf"] = true;
            } else {
                $refer[$key]["leaf"] = false;
            }
        }

        return json($tree);
    }


}