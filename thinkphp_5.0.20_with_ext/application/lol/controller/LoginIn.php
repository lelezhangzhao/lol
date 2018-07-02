<?php
namespace app\lol\controller;
use think\Controller;
use app\lol\model\User as UserModel;

class LoginIn extends Controller
{
    public function Index()
    {
        return $this->fetch();
    }

    public function loginin()
    {
        return 'this is login in';
    }
}