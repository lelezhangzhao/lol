<?php
namespace app\lol\controller;

use think\Controller;
use think\Request;
use think\Db;

use app\lol\model\User as UserModel;
use app\lol\model\Account as AccountModel;
use app\lol\model\AccountInfo as AccountInfoModel;

class LoginIn extends Controller
{
    public function Index()
    {
        return $this->fetch();
    }

    public function loginin(Request $request)
    {

        //先验证验证码
        if(!captcha_check($request->param('identify')))
        {
            $this->error('验证码错误');
        }
        else
        {
            //username不为空，且长度大于等于5，且唯一
            $username = $request->param('username');
//            if(empty($username))
//                return '用户名不能为空';
//            else if(strlen($username) < 5)
//                return '用户名长度至少是5';
            if(!empty(UserModel::where('username', $username)->find()))
            {
                $this->error( '当前用户名已存在');
            }

            //password不为空，且长度大于等于5，不能和username相同
            $password = $request->param('password');
//            if(empty($password))
//                return '密码不能为空';
//            else if(strlen($password) < 5)
//                return '密码长度至少是5';
            if($username === $password)
                $this->error('账户和密码不能相同');

            //tel不为空，且长度是11
            $tel = $request->param('tel');
//            if(empty($tel))
//                return '手机号不能为空';
//            else if(strlen($tel) != 11)
//                return '请输入正确的手机号';
            if(!empty(UserModel::where('tel', $tel)->find()))
            {
                $this->error('当前手机号已存在');
            }

            //rank_pre如果不为空，必需是已存在username
            $rank_pre = $request->param('rank_pre');
            if(!empty($tel))
            {
                if(!empty(UserModel::where('username', $username)->find()))
                {
                    $this->error('推荐码有误');
                }
            }

            $user = new UserModel;
            $user->username = $username;
            $user->password = $password;
            $user->tel = $tel;
            $user->rank_pre = $rank_pre;
            $user->create_time = '2018-07-05 17:00:00';
//            return $user->create_tiem;
            $user->update_time = '2018-07-05 17:00:00';
            $result = $this->validate($user, 'User');
            if(true !== $result)
                return $result;
            else
            {
                $user->allowField(true)->save();

                //注册成功后，数据库中插入account和accountinfo信息
                $account = new AccountModel();
                $account->user_id = $user->id;
                $account->ydc = 0;
                $account->allowField(true)->save();


                $accountinfo = new AccountInfoModel();
                $accountinfo->user_id = $user->id;
                $accountinfo->status = 1;
                $accountinfo->allowField(true)->save();




                $this->success('注册成功', 'lol/login_up/index');
            }
        }
    }
}