<?php

namespace app\lol\controller;

use think\Controller;
use think\Db;

use app\lol\model\Match as MatchModel;

class MatchConfirm extends Controller{
    public function Index(){
        return $this->fetch();
    }

    public function RefreshMatchStatus{
        //刷新比赛状态
        $matchs = MatchModel::where('status', 0)->select();
        foreach($matchs as $match){
            if($match['matchtime'] <= date('Y-m-d H:i:s')){
                $updatematch = MatchModel::where('id', $match->id)->find();
                $updatematch->status = 1;
                $updatematch->allowField(true)->save();
            }
        }
    }

    public function MatchBalance(){
        //结算比赛
    }
}
