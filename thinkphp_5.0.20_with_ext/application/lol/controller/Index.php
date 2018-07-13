<?php
namespace app\lol\controller;

use think\Controller;
use think\Session;
use think\Request;
use think\Db;

use app\lol\model\User as UserModel;
use app\lol\model\Match as MatchModel;


class Index extends Controller
{
    public function Index()
    {
        if(!Session::has('username'))
        {
            $this->error('先登录', '/index.php/lol/login_up/index');
        }
        return $this->fetch();
    }

    public function GetMatch(){
        $matchs = MatchModel::where('matchtime', '>', date('Y-m-d H:i:s'))
            ->where('status', 0 )
            ->select();

        if(empty($matchs)){
            echo '暂时没有合适比赛';
        }

        foreach($matchs as $match){
            echo '比赛名称：'.$match['caption'].'<br/>';
            echo '比赛时间：'.$match['matchtime'].'<br/>';
            echo '<input type="submit" value="下注" onClick="MatchInvest('.$match['id'].')" /><br/>';

        }



    }

}
