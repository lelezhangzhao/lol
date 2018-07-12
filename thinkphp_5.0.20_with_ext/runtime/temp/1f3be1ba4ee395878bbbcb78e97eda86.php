<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\account_info\index.html";i:1531275278;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=1"></script>
    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />

</head>
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
</html>