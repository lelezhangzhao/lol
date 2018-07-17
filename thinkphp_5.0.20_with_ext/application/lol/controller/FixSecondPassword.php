<?php
namespace app\lol\controller;


use think\Controller;
use think\Request;
use think\Session;

use app\lol\api\Helper as HelperApi;

use app\lol\model\User as UserModel;
use app\lol\model\AccountInfo as AccountInfoModel;


class FixSecondPassword extends Controller
{
    public function Index(){
        if(!HelperApi::IsLoginUp()){
            HelperApi::LoginUpFirst($this);
        }
        return $this->fetch();
    }

    public function FixSecondPassword(Request $request){
        if(!HelperApi::IsLoginUp()){
            HelperApi::LoginUpFirst($this);
        }

        $userid = Session::get('id');
        $oldsecondpassword = $request->param('oldsecondpassword');
        $newsecondpassword = $request->param('newsecondpassword');

        //验证原密码
        $accountinfo = AccountInfoModel::where('user_id', $userid)->find();
        if($accountinfo->status === 0){
            $this->error('账户状态错误');
        }
        if($accountinfo->secondpassword !== $oldsecondpassword){
            $this->error('原二级密码错误');
        }

        //新旧密码不能相同
        if($oldsecondpassword === $newsecondpassword){
            $this->error('新旧二级密码相同');
        }
        $accountinfo->secondpassword = $newsecondpassword;
        $accountinfo->allowField(true)->save();
        $this->success('更新成功');
    }
}