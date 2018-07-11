<?php
namespace app\lol\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\lol\model\User as UserModel;
use app\lol\model\AccountInfo as AccountInfoModel;


class AccountInfo extends Controller{
    public function Index(){

        $accountinfo = AccountInfoModel::where('user_id', Session::get('id'))->find();
//        $accountinfo = AccountInfoModel::all();

//        $this->assign('accountinfolist', $accountinfo);
        $this->assign('accountinfoname', $accountinfo->name);
        $this->assign('accountinfoidcard', $accountinfo->idcard);
        $this->assign('accountinfosecondpassword', $accountinfo->secondpassword);
        $this->assign('accountinfoalipaynum', $accountinfo->alipaynum);
        $this->assign('accountinfobanknum', $accountinfo->banknum);
        $this->assign('accountinfobankname', $accountinfo->bankname);


        $this->assign('accountinfocount', count($accountinfo));

        return $this->fetch();
    }

    public function SetAccountInfo(Request $request){
        $user_id = Session::get('id');

        $accountinfo = AccountInfoModel::where('user_id', $user_id)->find();
        if(empty($accountinfo)){
            //新建

            $accountinfo = new AccountInfoModel();
            $accountinfo->status = 1;
        }

        $accountinfo->name = $request->param('name');
        $accountinfo->idcard = $request->param('idcard');
        $accountinfo->secondpassword = $request->param('secondpassword');
        $accountinfo->banknum = $request->param('banknum');
        $accountinfo->bankname = $request->param('bankname');
        $accountinfo->alipaynum = $request->param('alipaynum');
        $accountinfo->user_id = $user_id;

        $accountinfo->allowField(true)->save();

        return $this->success('保存成功');
    }
}