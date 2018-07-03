<?php
namespace app\lol\model;

use think\Model;

class User extends Model
{

    protected $type=[

        'create_time' => 'timestamp:Y/m/d H:i:s',
        'update_time' => 'timestamp:Y/m/d H:i:s',
    ];


    protected $autoWriteTimestamp = true;
    protected $insert = ['status' => 1];

}