<?php

namespace app\lol\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;

use app\lol\model\Invest as InvestModel;
use app\lol\model\MatchInfo as MatchInfoModel;
use app\lol\model\Match as MatchModel;
use app\lol\model\Account as AccountModel;

class InvestRecord extends Controller{
    public function Index(){
        //可撤销
//        $result_revoke = Db::view('invest', ['id', 'ydc', 'create_time' => 'invest_create_time', 'status', 'result', 'bill'])
//            ->view('match_info', ['caption', 'rate'], 'invest.matchinfo_id = match_info.id')
//            ->view('match', 'matchtime', 'match_info.match_id = match.id')
//            ->where(['invest.user_id' => Session::get('id')])
//            ->where('invest.create_time', '>=', '-5 minutes')
//            ->where('match.matchtime', '<=', '+5 minutes')
//            ->where('invest.status', '=', 0)
//            ->order('invest.create_time', 'desc')
//            ->select();
//        $this->assign('investlistrevoke', $result_revoke);


        $result = Db::view('invest', ['id', 'ydc', 'create_time' => 'invest_create_time', 'status', 'result', 'bill'])
            ->view('match_info', ['caption', 'rate'], 'invest.matchinfo_id = match_info.id')
            ->view('match', 'matchtime', 'match_info.match_id = match.id')
            ->where(['invest.user_id' => Session::get('id')])
            ->order('invest.create_time', 'desc')
            ->select();
        $this->assign('investlist', $result);

        return $this->fetch();
    }

    public function InvestRevoke(Request $request){

        $invest_id = $request->param('invest_id');

        $invest = InvestModel::where('id', $invest_id)->find();
        if($invest->create_time < '-5 minutes'){
            return '下注超过五分钟';
        }else{
            $matchinfo = MatchInfoModel::where('id', $invest->matchinfo_id)->find();
            $match = MatchModel::where('id', $matchinfo->match_id);
            if($match->match_time > '+5 minutes'){
                $this->error('距离开赛不到五分钟');
            }else{
                if($invest->status <> 0){
                    $this->error('当前比赛不允许撤销');
                }else{
                    //可以撤销
                    //invest
                    //account
                    //matchinfo
                    $invest->update_time = date('Y-m-d H:i:s');
                    $invest->status = 1;
                    $invest->result = '撤销';
                    $invest->bill = 0;
                    $invest->allowField(true)->save();

                    $account = AccountModel::where('user_id', Session::get('id'))->find();
                    $account->ydc += $invest->ydc;
                    $account->allowField(true)->save();


                    $matchinfo->curinvest -= $invest->ydc;
                    $matchinfo->remaininvest += $invest->ydc;
                    $matchinfo->allowField(true)->save();

                    $this->success('撤销成功');
                }
            }
        }
    }
}