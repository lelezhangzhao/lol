<?php

namespace app\lol\controller;

use think\Controller;
use think\Request;
use think\Db;


use app\lol\model\Account as AccountModel;
use app\lol\model\Match as MatchModel;
use app\lol\model\MatchInfo as MatchInfoModel;
use app\lol\model\Invest as InvestModel;
use app\lol\api\User as UserApi;

class MatchConfirm extends Controller{
    public function Index(){
        if(!UserApi::IsCurAdmin()){
            return '用户没有权限';
        }

        $matchs = Db::view('match', ['id' => 'matchid','caption','matchtime','status'])
            ->where('status', 'in','0,1')
            ->select();


        $this->assign('matchconfirmlist', $matchs);

        $matchinfos = Db::view('match_info', ['id' => 'matchinfoid', 'caption'])
            ->view('match', 'matchtime', 'match.id = match_info.match_id')
            ->where('match_info.status', 0)
            ->select();

        $this->assign('matchinvestconfirmlist', $matchinfos);

        return $this->fetch();
    }

    public function MatchConfirm(Request $request){
        if(!UserApi::IsCurAdmin()){
            return '用户没有权限';
        }

        $status = $request->param('status');
        $matchid = $request->param('match_id');

        $match = MatchModel::where('id', $matchid)->find();
        $match->status = $status;
        $match->allowField(true)->save();

        return '更新成功';
    }

    public function MatchInvestWin(Request $request){
        if(!UserApi::IsCurAdmin()){
            return '用户没有权限';
        }


        $match_info_id = $request->param('matchinfo_id');

        //matchinfo
        //invest
        //account

        $matchinfo = MatchInfoModel::where('id', $match_info_id)->find();
        $matchinfo->status = 1;
        $matchinfo->allowField(true)->save();

        $invests = InvestModel::where('status', 0)
            ->where('matchinfo_id', $match_info_id)
            ->select();
        foreach($invests as $single_invest){
            $invest = InvestModel::where('id', $single_invest->id)->find();
            $invest->status = 2;
            $invest->bill = $single_invest->ydc * $matchinfo->rate;
            $invest->result = '胜';
            $invest->allowField(true)->save();

            $account = AccountModel::where('user_id', $single_invest->user_id)->find();
            $account->ydc += $single_invest->ydc * $matchinfo->rate;
            $account->allowField(true)->save();

        }


    }

    public function MatchInvestDefeat(Request $request){
        if(!UserApi::IsCurAdmin()){
            return '用户没有权限';
        }



        $match_info_id = $request->param('matchinfo_id');
        //matchinfo
        //invest

        $matchinfo = MatchInfoModel::where('id', $match_info_id)->find();
        $matchinfo->status = 2;
        $matchinfo->allowField(true)->save();

        $invests = InvestModel::where('status', 0)
            ->where('matchinfo_id', $match_info_id)
            ->select();
        foreach($invests as $single_invest){
            $invest = InvestModel::where('id', $single_invest->id)->find();
            $invest->status = 2;
            $invest->bill = -$invest->ydc;
            $invest->result = '负';
            $invest->allowField(true)->save();


        }

    }


}
