<?php
namespace app\lol\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\lol\model\Cash as CashModel;

class Charge extends Controller
{

    public function Index(){
        return $this->fetch();
    }


    public function Charge(Request $request){
        $charge = new CashModel();
        $charge->type = 0;
        $charge->ydc = $request->param('ydc');
        $charge->create_time = date('Y-m-d H:i:s');
        $charge->update_time = date('Y-m-d H:i:s');
        $charge->status = 0;
        $charge->user_id = Session::get('id');

        $charge->allowField(true)->save();

        return $this->success('转账成功，请等待后台充值');
    }

}