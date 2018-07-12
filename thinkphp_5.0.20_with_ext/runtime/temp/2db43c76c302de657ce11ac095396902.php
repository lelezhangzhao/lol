<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\login_up\index.html";i:1531098777;}*/ ?>
<html>
<head>

</head>

<body>
<form method="post">
    用户名 <input type="text" name="username" /><br />
    密码 <input type="text" name="password" /><br />
    验证码 <input type="text" name="identify" />
    <img src="<?php echo captcha_src(); ?>" onclick="this.src='/index.php/captcha?id='+Math.random()" style="cursor: pointer" /><br />
    <input type="submit" value="登录" formaction="<?php echo url('lol/login_up/loginup'); ?>" name="loginup" /><br />
    <input type="submit" value="忘记密码" formaction="<?php echo url('lol/login_up/forgetpassword'); ?>" name="forgetpassword" />
    <input type="submit" value="注册" formaction="<?php echo url('lol/login_up/loginin'); ?>" name="loginin"/>

</form>

</body>

</html>