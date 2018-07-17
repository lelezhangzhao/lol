<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:98:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\login_up\index.html";i:1531702546;s:80:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\layout.html";i:1531702546;s:80:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\header.html";i:1531734134;s:80:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\footer.html";i:1531702546;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=3"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />

    <script type="text/javascript">

    </script>
    <code class="hljs xml"><span class="hljs-tag"><span class="hljs-tag"><</span><span class="hljs-name"><span class="hljs-tag"><span class="hljs-name">script</span></span></span><span class="hljs-tag"> </span><span class="hljs-attr"><span class="hljs-tag"><span class="hljs-attr">src</span></span></span><span class="hljs-tag">=</span><span class="hljs-string"><span class="hljs-tag"><span class="hljs-string">"1.js?ver=1"</span></span></span><span class="hljs-tag">></span></span><span class="undefined"></span><span class="hljs-tag"><span class="undefined"></span><span class="hljs-tag"></</span><span class="hljs-name"><span class="hljs-tag"><span class="hljs-name">script</span></span></span><span class="hljs-tag">></span></span></code>
</head>


</html>

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

