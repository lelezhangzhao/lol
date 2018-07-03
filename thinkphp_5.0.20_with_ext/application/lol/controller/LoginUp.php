<?php
namespace app\lol\controller;
use think\Controller;
use think\Request;
use think\Db;
use app\lol\model\User as UserModel;

class LoginUp extends Controller
{
    public function Index()
    {
        return $this->fetch();
    }

    public function LoginUp(Request $request)
    {
        //先验证验证码
        if(!captcha_check($request->param('identify')))
        {
            $this->error('验证码错误');
        }

        //用户名不为空，至少五个字符
        $username = $request->param('username');
        if(empty($username))
            return '用户名不能为空';
        else if(strlen($username) < 5)
            return '用户名长度至少是5';


        //密码不为空，至少五个字符，不能和用户名相同
        $password = $request->param('password');
        if(empty($password))
            return '密码不能为空';
        else if(strlen($password) < 5)
            return '密码长度至少是5';
        else if($username === $password)
            return '账户和密码不能相同';

        //查询数据库，用户名和密码全部匹配
        $user = UserModel::where(['username' => $username, 'password' => $password])->find();
        if(!empty($user))
        {
            $this->success('登录成功', 'lol/index/index');
        }
    }

    public function ForgetPassword()
    {
        $this->success('正在跳转', 'lol/forget_password/index', 0, 1);
//        header(url('lol/forget_password/index'));
    }


    public function LoginIn()
    {
        $this->success('正在跳转', 'lol/login_in/index', 0, 1);

//        header(url('lol/login_in/index'));

//        file_get_contents(url('lol/login_in/index','',true,true));
    }
}