<?php
namespace app\lol\controller;
use think\Db;
use app\lol\model\User as UserModel;
use think\Session;
use think\Controller;
use app\lol\model\Match as MatchModel;
use app\lol\model\MatchInfo as MatchInfoModel;

class Index extends Controller
{
    public function index()
    {
        if(!Session::has('username'))
        {
            return $this->error('先登录', 'lol\login_up\index');
        }

        $match = MatchModel::where('matchtime' < strtotime('tomorror'))->select();
        return $this->fetch();
    }
}
