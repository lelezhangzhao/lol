<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\login_in\index.html";i:1531009940;}*/ ?>
<html>
<head>

</head>

<body>
<form method="post" action="<?php echo url('lol/login_in/loginin'); ?>">
    用户名 <input type="text" name="username" />*<br />
    密码 <input type="text" name="password" />*<br />
    手机号 <input type="text" name="tel" />*<br />
    验证码 <input type="text" name="identify" />*
    <img src="<?php echo captcha_src(); ?>" onclick="this.src='/index.php/captcha?id='+Math.random()" style="cursor: pointer" /><br />
    推荐人 <input type="text" name="rank_pre" /><br />
    <input type="submit" value="注册" name="loginin" />

</form>

</body>

</html>