<?php

namespace app\model;

use think\Model;

class UserModel extends Model
{

    protected $name = 'user';

    //protected $id;
    public  function getAllUsers()
    {
        //dump('static call');
        $user=$this->get(125);
        //dump($user);
        return $user;
        //return $user[0]->getData();
    }


    public function getAllUserName()
    {
        return $this->field('name,id')->select();
    }

    public function getUserById($id)
    {
        $condition['id'] = $id;
        return $this->where($condition)->select();

    }

    /*
     * 通过用户编号查询该用户的所有角色
     *
     */
    public function getRoleByUser($UserId)
    {
        $codition['id'] = $UserId;

        return $this->table("userRole")->where($conditon)->select();

    }





    public function addUser($user){
        try{
            $this->table('jrrc_user')->insert($user);
            echo "1";
        }catch(\Exception $e){
            echo "0";
        }

    }


    public function edit($user){
       // dump($user);
//
//       $conditon=array();
//       foreach($user as $u){
//           $conditon['id']=$u->id;
//
//            $conditon['name']=$u->name;
//            $conditon['password']=$u->password;
//            $conditon['status']=$u->status;
//            $conditon['oa_name']=$u->oa_name;
//            $conditon['oa_password']=$u->oa_password;
//
//           $reuslt=$this->where($conditon)->select();
//           $reuslt->save();
//        }



        $conditon=array();
        $conditon['id']=95;
     return   $reuslt=self::get();
//        echo $reuslt['name'];
       // dump($reuslt);
       // $conditon['status']='444';
//        $reuslt->update($conditon,$conditon['id']);
//        dump($reuslt);
        //dump($reuslt=$this->where($conditon)->select());

    }

}
