<?php
namespace app\lol\controller;

use think\Controller;


class TransferRecord extends Controller{
    public function Index(){
        return $this->fetch();
    }
}