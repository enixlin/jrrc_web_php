<?php
/**
 * Created by IntelliJ IDEA.
 * User: linzhenhuan
 * Date: 2017/4/26
 * Time: 15:12
 */
namespace app\behavior;
use think\Controller;

class Author extends Controller {

    public function run(){

        if(session("name")==null or session('name')=="" ){
            //$this->redirect('/jrrc_web_php/index.php');
            echo "fail";
        }
    }



}