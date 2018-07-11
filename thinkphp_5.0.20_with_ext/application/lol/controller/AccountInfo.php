<?php
namespace app\lol\controller;

use think\Controller;
use think\Request;

use app\lol\model\User as UserModel;
use app\lol\model\AccountInfo as AccountInfoModel;


class AccountInfo extends Controller{
    public function Index(){
        return $this->fetch();
    }

    public function SetAccountInfo(Request $request){
        $user_id = Session::get('id');

        $accountinfo = AccountInfoModel::where('user_id', $user_id)->find();
        if(empty($accountinfo)){
            //新建

            $accountinfo = new AccountInfoModel();
            $accountinfo->name = $request->param('name');
            $accountinfo->idcard = $request->param('idcard');
            $accountinfo->secondpassword = $request->param('secondpassword');
            $accountinfo->banknum = $request->param('banknum');
            $accountinfo->bankname = $request->param('bankname');
            $accountinfo->alipaynum = $request->param('alipaynum');
            $accountinfo->status = 1;
            $accountinfo->user_id = $user_id;

            $accountinfo->allowField(true)->save();

        }else{
            //更新
        }



    }
}