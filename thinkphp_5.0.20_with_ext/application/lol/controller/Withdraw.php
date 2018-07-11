<?php
namespace app\lol\controller;

use think\Controller;
use think\Request;

use app\lol\model\Account as AccountModel;
use app\lol\model\Cash as CashModel;
use app\lol\model\AccountInfo as AccountInfoModel;

class Withdraw extends Controler
{
    public function Index(){
        return $this->fetch();
    }

    public function Withdraw(Request $request){
        $ydc = $request->param('ydc');
        $secondpassword = $request->param('secondpassword');

        $user_id = Session::get('id');

        $accountinfo = AccountInfoModel::where('user_id', $user_id);
        if(empty($accountinfo)){
            return $this->error('accountinfo not exist');
        }

        $account = AccountModel::where('user_id', $user_id);
        if(empty($account)){
            return $this->error('account not exist');
        }

        $cash = new CashModel();
        $cash->type = 1;
        $cash->ydc = $ydc;
        $cash->create_time = date('Y-m-d H:i:s');
        $cash->update_time = date('Y-m-d H:i:s');
        $cash->status = 0;
        $cash->user_id = $user_id;

        $cash->allowField(true)->save();

    }


}