<?php

namespace app\lol\api;

use think\Session;

use app\lol\model\User as UserModel;

class Helper{
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

    static public function IsLoginUp(){
        return Session::has('username') && Session::has('id');
    }

    static public function LoginUpFirst($controller){
        $controller->error('先登录', '/index.php/lol/login_up/index');
    }

}