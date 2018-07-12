<?php
namespace app\lol\controller;


use think\Controller;
use think\Request;
use think\Session;



use app\lol\model\Account as AccountModel;
use app\lol\model\Cash as CashModel;
use app\lol\model\AccountInfo as AccountInfoModel;

class Withdraw extends Controller
{
    public function Index(){
        return $this->fetch();
    }

    public function Withdraw(Request $request){

        $ydc = $request->param('ydc');
        $secondpassword = $request->param('secondpassword');

        $user_id = Session::get('id');

        $accountinfo = AccountInfoModel::where('user_id', $user_id)->find();
        if(empty($accountinfo)){
            $this->error('accountinfo not exist');
        }else{
            if($accountinfo->secondpassword !== $secondpassword){
                $this->error('二级密码错误');
            }
        }

        $account = AccountModel::where('user_id', $user_id)->find();
        if(empty($account)){
            $this->error('account not exist');
        }else{
            if($account->ydc < $ydc){
                $this->error('剩余额度不够');
            }else{
                $account->ydc -= $ydc;
                $account->allowField(true)->save();
            }
        }

        $cash = new CashModel();
        $cash->type = 1;
        $cash->ydc = $ydc;
        $cash->create_time = date('Y-m-d H:i:s');
        $cash->update_time = date('Y-m-d H:i:s');
        $cash->status = 0;
        $cash->user_id = $user_id;

        $cash->allowField(true)->save();
        $this->success('提现成功，等待后台处理');

    }
}