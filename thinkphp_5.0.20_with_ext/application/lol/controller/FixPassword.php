<?php
namespace app\lol\controller;
use think\Controller;
use think\Request;

class FixPassword extends Controller
{
    public function Index()
    {

        return $this->fetch();
    }

    public function FixPassword(Request $request)
    {

    }
}