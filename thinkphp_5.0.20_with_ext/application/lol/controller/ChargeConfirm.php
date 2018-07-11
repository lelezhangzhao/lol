<?php

namespace app\lol\controller;

use think\Controller;
use think\Session;
use think\Db;
use think\Request;


use app\lol\model\User as UserModel;
use app\lol\model\Invest as InvestModel;
use app\lol\model\Cash as CashModel;
use app\lol\model\Account as AccountModel;
use app\lol\model\AccountInfo as AccountInfoModel;



class ChargeConfirm extends Controller{
    public function Index(){
        $user = UserModel::where('id', Session::get('id'))->find();
        if(empty($user)){
            return $this->error('用户不存在');
        }else{
            if($user->role !== 0){
                return $this->error('用户没权限');
            }
            else{
//                $caselist = CashModel::all(['type' => 0, 'status' => 0]);

                $result = Db::view('user', ['id' => 'user_id'])
                    ->view('account_info', 'name, banknum, alipaynum', 'account_info.user_id = user.id')
                    ->view('cash', ['id' => 'cash_id', 'ydc', 'create_time'], 'cash.user_id = user.id')
                    ->where(['cash.type' => 0, 'cash.status' => 0])
                    ->select();

                $this->assign('cashlist', $result);
                $this->assign('cashlistcount', count($result));

                return $this->fetch();
            }
        }
    }

    public function ConfirmSuccess(Request $request){
        //更新数据库
        //cash
        //account
        $cash_id = $request->param('cash_id');
        $user_id = $request->param('user_id');
        $ydc = $request->param('ydc');

        $cash = CashModel::where('id', $cash_id)->find();
        $cash->status = 1;
        $cash->allowField(true)->save();

        $account = AccountModel::where('user_id', $user_id)->find();
        $account->ydc += $ydc;
        $account->allowField(true)->save();


    }

    public function ConfirmFailed(Request $request){
        //更新数据库
        //cash
        //account
        $cash_id = $request->param('cash_id');


        $cash = CashModel::where('id', $cash_id)->find();
        $cash->status = -1;
        $cash->allowField(true)->save();

    }


}
