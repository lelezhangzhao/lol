<?php
namespace app\lol\controller;
use think\Db;
use app\lol\model\User as UserModel;
use think\Session;
use think\Controller;
use think\Request;

use app\lol\model\Match as MatchModel;


class Index extends Controller
{
    public function index()
    {
        if(!Session::has('username'))
        {
            return $this->error('先登录', 'lol\login_up\index');
        }

        $match = MatchModel::all();

        $this->assign('list', $match);
        $this->assign('count', count($match));

        return $this->fetch();
    }

}
