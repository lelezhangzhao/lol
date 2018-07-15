<?php

namespace app\lol\api;

use think\Session;

use app\lol\model\User as UserModel;

class User{
    static public function IsCurAdmin(){
        $user = UserModel::where('id', Session::get('id'))->find();
        if(empty($user)){
            return false;
        }else{
            if($user->role <> 0){
                return false;
            }else{
                return true;
            }
        }
    }
}