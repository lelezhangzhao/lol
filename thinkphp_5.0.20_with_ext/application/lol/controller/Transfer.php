<?php
namespace app\lol\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\lol\api\Helper as HelperApi;

use app\lol\model\User as UserModel;
use app\lol\model\Account as AccountModel;
use app\lol\model\AccountInfo as AccountInfoModel;
use app\lol\model\Score as ScoreModel;

class Transfer extends Controller{
    public function Index(){
        if(!HelperApi::IsLoginUp()){
            HelperApi::LoginUpFirst($this);
        }

        return $this->fetch();
    }

    public function Lock(Request $request){
        if(!HelperApi::IsLoginUp()){
            HelperApi::LoginUpFirst($this);
        }

        $theotherusername = $request->param('theotherusername');
        $ydc = $request->param('ydc');
        $secondpassword = $request->param('secondpassword');

        //用户状态
        $user = UserModel::where('id', Session::get('id'))->find();
        if(empty($user)){
            $this->error('用户不存在');
        }
        if($user->status == 0){
            $this->error('用户状态错误，请联系客服');
        }

        //二级密码
        $accountinfo = AccountInfoModel::where('user_id', $user->id)->find();
        if(empty($accountinfo)){
            $this->error('用户账户不存在');
        }
        if($accountinfo->status == 0){
            $this->error('账户被禁用，请联系客服');
        }
        if($accountinfo->secondpassword !== $secondpassword){
            $this->error('二级密码错误');
        }

        //theotherid是否存在
        $theotheruser = UserModel::where('username', $theotherusername)->find();
        if(empty($theotheruser)){
            $this->error('被转账号不存在');
        }
        if($theotheruser->status == 0){
            $this->error('对方账号已禁用');
        }

        //余额够不够
        $account = AccountModel::where('user_id', $user->id)->find();
        if(empty($account)){
            $this->error('账户不存在');
        }
        if($account->ydc < $ydc){
            $this->error('账户余额不足');
        }

        //锁定余额
        $account->ydc -= $ydc;
        $account->allowField(true)->save();

        //统一时间
        $date = date('Y-m-d H:i:s');

        //保存到score
        $score = new ScoreModel();
        $score->type = 1;
        $score->ydc = $ydc;
        $score->theotherusername = $theotherusername;
        $score->create_time = $date;
        $score->update_time = $date;
        $score->status = 0;
        $score->user_id = $user->id;
        $score->allowField(true)->save();

        //theotheruser保存到score
        $score = new ScoreModel();
        $score->type = 0;
        $score->ydc = $ydc;
        $score->theotherusername = $user->username;
        $score->create_time = $date;
        $score->update_time = $date;
        $score->status = 0;
        $score->user_id = $theotheruser->id;
        $score->allowField(true)->save();

        $this->success('锁定成功，等待对方转账');
    }
}