<?php
namespace app\lol\controller;
use think\Controller;
use think\Request;
use app\lol\model\User as UserModel;
use think\Session;

class ForgetPassword extends Controller
{
    public function Index()
    {
        return $this->fetch();
    }


    public function GetTelIdentify(Request $request)
    {
        $username = $request->param('username');
        $tel = $request->param('tel');

        $result = UserModel::where(['username' => $username, 'tel' => $tel])->find();
        if(!empty($result))
        {
            $url = 'http://tp5.com/lol/post/index?mobile='.$tel;
            $ch = curl_init ();
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
            curl_setopt ( $ch, CURLOPT_POST, 1 ); //启用POST提交
            $file_contents = curl_exec ( $ch );
            Session::set('identify', $file_contents);
            Session::set('fixedusername', $username);
            curl_close ( $ch );
        }
        else
        {
            return '用户名和手机号不匹配';
        }
        return Session::get('identify');

    }

    public function TelIdentifyOk(Request $request)
    {
        $identify = $request->param('telidentify');


        if($identify - Session::get('identify') != 0)
        {
            $this->error('验证码错误');
//            return Session::get('identify').$identify;

        }
        else
        {
            Session::delete('identify');
            return $this->fetch();
//            $url = 'http://tp5.com/lol/fix_password/index?username='.Session::get('username');
//            $ch = curl_init ();
//            curl_setopt ( $ch, CURLOPT_URL, $url );
//            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
//            curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
//            curl_setopt ( $ch, CURLOPT_POST, 1 ); //启用POST提交
//            $file_contents = curl_exec ( $ch );
//            curl_close ( $ch );
        }

    }


    public function NewPasswordOk(Request $request)
    {
        $newpassword = $request->param('newpassword');
        $username = Session::get('fixedusername');

        $user = UserModel::where('username', $username)->find();
        $user->password = $newpassword;
        $result = $this->validate($user, 'User');
        if(true !== $result)
        {
            return $this->error($result, 'lol/forget_password/index');
        }
        else
        {
            $user->save();
        }
        Session::delete('fixedusername');
        $this->success('密码更新成功', 'lol/login_up/index');
    }
}