<?php
namespace app\lol\controller;


use think\Controller;
use think\Request;
use think\Session;

use app\lol\api\Helper as HelperApi;

use app\lol\model\User as UserModel;


class FixPassword extends Controller
{
    public function Index(){
        if(!HelperApi::IsLoginUp()){
            HelperApi::LoginUpFirst($this);
        }
        return $this->fetch();
    }

    public function FixPassword(Request $request){
        if(!HelperApi::IsLoginUp()){
            HelperApi::LoginUpFirst($this);
        }

        $userid = Session::get('id');
        $oldpassword = $request->param('oldpassword');
        $newpassword = $request->param('newpassword');

        //验证原密码
        $user = UserModel::where('id', $userid)->find();
        if($user->status === 0){
            $this->error('账户状态错误');
        }
        if($user->password !== $oldpassword){
            $this->error('原密码错误');
        }

        //新旧密码不能相同
        if($oldpassword === $newpassword){
            $this->error('新旧密码相同');
        }
        $user->password = $newpassword;
        $result = $this->validate($user, 'User');
        if(true !== $result){
            return $result;
        }
        $user->allowField(true)->save();
        $this->success('更新成功');
    }
}