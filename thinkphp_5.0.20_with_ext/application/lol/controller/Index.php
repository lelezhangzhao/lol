<?php
namespace app\lol\controller;
use think\Db;
use app\lol\model\User as UserModel;
use think\Session;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        if(!Session::has('username'))
        {
            return $this->error('先登录', 'lol\login_up\index');
        }
        return $this->fetch();
    }
    public function addUser()
    {
        $user = new UserModel;

        $user->username = 'username';
        $user->password = 'password';
        $user->tel = '13113310202';
        $user->rank_pre = 1;
        $user->save();

        $this->success('注册成功');

    }
}
