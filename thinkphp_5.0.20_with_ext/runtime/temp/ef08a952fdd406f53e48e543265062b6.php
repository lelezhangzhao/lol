<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\charge\index.html";i:1531289858;}*/ ?>
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
        <h2>充值</h2>
        <div>
            充值金额：<input type="text" name="ydc"/>ycb<br/>
            <input type="submit" value="已转账" formaction="<?php echo url('lol/charge/charge'); ?>" />
        </div>
    </form>
</div>

</body>
</html>