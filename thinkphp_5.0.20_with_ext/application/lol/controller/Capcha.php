<?php
namespace app\index\controller;
use think\Controller;

class Captcha extends Controller
{

// 验证码表单
    public function index()
    {
        return $this->fetch();
    }
}