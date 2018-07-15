<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:102:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\account_info\index.html";i:1531529606;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\layout.html";i:1531529567;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\header.html";i:1531622665;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\footer.html";i:1531528480;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=6"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />

    <script type="text/javascript">

    </script>
    <code class="hljs xml"><span class="hljs-tag"><span class="hljs-tag"><</span><span class="hljs-name"><span class="hljs-tag"><span class="hljs-name">script</span></span></span><span class="hljs-tag"> </span><span class="hljs-attr"><span class="hljs-tag"><span class="hljs-attr">src</span></span></span><span class="hljs-tag">=</span><span class="hljs-string"><span class="hljs-tag"><span class="hljs-string">"1.js?ver=1"</span></span></span><span class="hljs-tag">></span></span><span class="undefined"></span><span class="hljs-tag"><span class="undefined"></span><span class="hljs-tag"></</span><span class="hljs-name"><span class="hljs-tag"><span class="hljs-name">script</span></span></span><span class="hljs-tag">></span></span></code>
</head>


</html>
<body >
<div id="top">

</div>



<div id="center_right">



</div>


<div id="bottom">
    <form method="post" >
        <h2>个人信息(<?php echo $accountinfocount; ?>)</h2>
        <div>
            姓名：<input type="text" name="name" value="<?php echo $accountinfoname; ?>"/><br/>
            身份证：<input type="text" name="idcard" value="<?php echo $accountinfoidcard; ?>"/><br/>
            二级密码：<input type="text" name="secondpassword" value="<?php echo $accountinfosecondpassword; ?>"/><br/>
            银行卡号：<input type="text" name="banknum" value="<?php echo $accountinfobanknum; ?>"/><br/>
            开户银行：<input type="text" name="bankname" value="<?php echo $accountinfobankname; ?>"/><br/>
            支付宝账号：<input type="text" name="alipaynum" value="<?php echo $accountinfoalipaynum; ?>"/><br/>
            <input type="submit" value="确定" formaction="<?php echo url('lol/account_info/setaccountinfo'); ?>" />
        </div>
    </form>
</div>

</body>
