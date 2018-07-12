<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:105:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\forget_password\index.html";i:1530670411;}*/ ?>
<html>
<head>

</head>

<body>
<form method="post">
用户名 <input type="text" name="username" /><br />
手机号 <input type="text" name="tel" />
<input type="submit" value="获取验证码" formaction="<?php echo url('lol/forget_password/gettelidentify'); ?>" /><br />
输入手机验证码 <input type="text" name="telidentify" /><br />
<input type="submit" value="确定" formaction="<?php echo url('lol/forget_password/telidentifyok'); ?>" name="confirm"/>

</form>

</body>

</html>