<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // 生成应用公共文件
    '__file__' => ['common.php', 'config.php', 'database.php'],

    // 定义demo模块的自动生成 （按照实际定义的文件名生成）
    'lol'     => [
        '__dir__'    => ['controller', 'model', 'view'],
        'controller' => ['LoginIn', 'LoginUp', 'FixPassword', 'FixSecondPassword', 'SetAccountInfo', 'Invest', 'Charge', 'Withdraw', 'Transfer', 'IdentifyTel', 'ForgetPassword', 'TransferRecord'],
        'model'      => ['User', 'AccountInfo', 'Account', 'Cash', 'Score', 'Invest', 'Profit', 'Match', 'MatchInfo'],
        'view'       => ['index/index', 'index/loginin', 'index/loginup', 'index/fixpassword', 'index/fixsecondpassword', 'index/setaccountinfo', 'index/invest', 'index/charge', 'index/withdraw', 'index/transfer', 'index/identifytel', 'transrecord'],
    ],
    // 其他更多的模块定义
];
