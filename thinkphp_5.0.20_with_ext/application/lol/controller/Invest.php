<?php
namespace app\lol\controller;

use think\Controller;
use think\Request;
use think\Session;


use app\lol\model\MatchInfo as MatchInfoModel;
use app\lol\model\Match as MatchModel;
use app\lol\model\User as UserModel;
use app\lol\model\Account as AccountModel;
use app\lol\model\Invest as InvestModel;
use app\lol\model\Profit as ProfitModel;

class Invest extends Controller
{

    public function MatchInvest(Request $request)
    {
        $match_id = $request->param('match_id');


        $matchinfo = MatchInfoModel::where('match_id', $match_id)->select();


        $this->assign('matchinfolist', $matchinfo);
        $this->assign('matchinfocount', count($matchinfo));

        return $this->fetch();

    }

    public function MatchInfoInvest(Request $request)
    {
        $matchinfoid = $request->param('id');

        $ydc = $request->param('ydc');

        //用户未禁用
        $user = UserModel::where('username', Session::get('username'))->find();
        if(empty($user)){
            return $this->error('用户不存在');
        }else{
            if($user->status == 0){
                return $this->error('用户被禁用');
            }
        }



        ///当前项目可下注
        //时间
        //剩余额度
        $matchinfo = MatchInfoModel::where('id', $matchinfoid)->find();
        if(empty($matchinfo)){
            return $this->error('比赛不存在');
        }else{
            if($matchinfo->remaininvest < $ydc){
                return $this->error('剩余额度不够');
            }else if($matchinfo->cutofftime < date('Y-m-d H:i:s')){
                return $this->error('下注已停止');
            }else{
                $match = MatchModel::where('id', $matchinfo->match_id)->find();
                if($match->status <> 0){
                    return '下注已停止';
                }
            }
        }

        //用户余额够
        $account = AccountModel::where('user_id', $user->id)->find();
        if(empty($account)){
            return $this->error('先完善账户信息');
        }else{
            if($account->ydc < $ydc){
                return $this->error('余额不足');
            }
        }

        ///下注
        //先减项目额度
        //再减用户额度
        //记录用户下注信息
        $matchinfo = MatchInfoModel::where('id', $matchinfoid)->find();
        if(empty($matchinfo)){
            return $this->error('比赛不存在');
        }else{
            $matchinfo->curinvest += $ydc;
            $matchinfo->remaininvest -= $ydc;
        }
        $matchinfo->allowField(true)->save();


        $account->ydc -= $ydc;
        $account->allowField(true)->save();

        $invest = new InvestModel();
        $invest->ydc = $ydc;
        $invest->create_time = date('Y-m-d H:i:s');
        $invest->update_time = date('Y-m-d H:i:s');
        $invest->status = 0;
        $invest->user_id = Session::get('id');
        $invest->matchinfo_id = $matchinfoid;

        $invest->allowField(true)->save();

        return $this->success('下注成功');



    }
}