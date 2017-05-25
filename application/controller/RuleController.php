<?php
/**
 * Created by IntelliJ IDEA.
 * User: linzhenhuan
 * Date: 2017/5/16
 * Time: 11:29
 */

namespace app\controller;

use app\model\RuleModel as Rule;
use think\Controller;
use think\Request;

class RuleController extends Controller
{

    public function __construct(Rule $rule)
    {
        $this->rule = $rule;
    }

    public function addRule()
    {
        $request = Request::instance();
        $rule = array();
        $rule['id'] =  $request->param('id');
        $rule['rule_name'] = $request->param('rule_name');
        $rule['controller'] = $request->param('controller');
        $rule['type'] = $request->param('type');
        $rule['p_id'] = $request->param('p_id');
        $rule['level'] = $request->param('level');
        $rule['status'] = $request->param('status');
        $rule['js_file'] = $request->param('js_file');
        $this->rule->addRule($rule);
    }


    public function updateRule()
    {
        $request = Request::instance();
        $rule = json_decode($request->getInput());
       // dump($rule);
        $this->rule->updateRule($rule);
    }

    public function deleteRule()
    {
        $request = Request::instance();
        $rule = json_decode($request->getInput());
        $this->rule->deleteRule($rule);
    }

    public function getAllRule()
    {
        return $result = $this->rule->all();
    }


    public function makeRuleTree($node)
    {
        return $this->rule->makeRuleTree($node);
    }
}
