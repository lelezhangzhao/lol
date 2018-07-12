<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\withdraw\index.html";i:1531360224;}*/ ?>
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
        <h2>提现</h2>
        <div>
            提现金额：<input type="text" name="ydc"/>ydc<br/>
            二级密码：<input type="text" name="secondpassword"/><br/>
            <input type="submit" value="提现到支付宝" formaction=<?php echo url('lol/withdraw/withdraw'); ?> />
        </div>
    </form>
</div>

</body>
</html>