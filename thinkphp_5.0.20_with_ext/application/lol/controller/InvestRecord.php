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

//        $invest = InvestModel::where('id', $invest_id)->find();
        $invest = InvestModel::where('id', $invest_id)->find();
        if(empty($invest)){
            return '没有此下注信息';
        }
        $matchinfo = MatchInfoModel::where('id', $invest->matchinfo_id)->find();

        $sql_investcreatetime = 'select * from lol_invest where id ='.$invest_id;
        $row_investcreatetime = Db::query($sql_investcreatetime);
        if(empty($row_investcreatetime)){
            return 'error';
        }
        $phptime_investcreatetime = strtotime($row_investcreatetime[0]['create_time']);

        $sql_matchtime = 'select * from lol_match where id = '.$matchinfo->match_id;
        $row_matchtime = Db::query($sql_matchtime);
        $phptime_matchtime = strtotime($row_matchtime[0]['matchtime']);


        $difmins_createtime = (time() - $phptime_investcreatetime) / 60;
        if($difmins_createtime > 5){
            return '下注超过五分钟';
        }
        else{
            $difmins_matchtime = ($phptime_matchtime - time()) / 60;
            if($difmins_matchtime < 5){
                return '距离开赛不到五分钟';
            }else{
                if($invest->status <> 0){
                    return '当前比赛不允许撤销';
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

                    return '撤销成功';
                }
            }
        }
    }

    public function GetInvestRecord(){

        $result = Db::view('invest', ['id', 'ydc', 'create_time' => 'invest_create_time', 'status', 'result', 'bill'])
            ->view('match_info', ['caption', 'rate'], 'invest.matchinfo_id = match_info.id')
            ->view('match', 'matchtime', 'match_info.match_id = match.id')
            ->where(['invest.user_id' => Session::get('id')])
            ->order('invest.create_time', 'desc')
            ->select();


        foreach($result as $record){
//            dump($record);
            echo '比赛名称：'.$record['caption'].'<br/>';
            echo '比赛时间：'.$record['matchtime'].'<br/>';
            echo '下注额度：'.$record['ydc'].'<br/>';
            echo '下注时间：'.$record['invest_create_time'].'<br/>';
            echo '赔率：'.$record['rate'].'<br/>';
            echo '操作：<span id="result'.$record['id'].'">'.$record['result'].'</span><br/>';
            echo '结算：<span id="bill'.$record['id'].'">'.$record['bill'].'</span><br/>';

            $phptime_investcreatetime = strtotime($record['invest_create_time']);
            $phptime_matchtime = strtotime($record['matchtime']);


            $difmins_createtime = (time() - $phptime_investcreatetime) / 60;
            $difmins_matchtime = ($phptime_matchtime - time()) / 60;

            if($record['status'] == 0 && $difmins_createtime <= 5 && $difmins_matchtime >= 5){
                echo '<input type="submit" value="撤销" id="revoke'.$record['id'].'"  onclick="InvestRevoke('.$record['id'].')" /><br />';
            }
            echo '<br />';

        }




    }

}