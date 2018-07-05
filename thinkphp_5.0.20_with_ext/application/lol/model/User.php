<?php
namespace app\lol\model;

use think\Model;

class User extends Model
{
    protected $autoWriteTimestamp = false;
    protected $insert = ['status' => 1];

}