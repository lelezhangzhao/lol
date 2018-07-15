<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:106:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\withdraw_confirm\index.html";i:1531622611;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\layout.html";i:1531529567;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\header.html";i:1531622665;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\footer.html";i:1531528480;}*/ ?>
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
    <form method="post" action="" target="exec_target">
        <h2>提现(<?php echo $cashlistcount; ?>)</h2>
        <?php if(is_array($cashlist) || $cashlist instanceof \think\Collection || $cashlist instanceof \think\Paginator): $i = 0; $__LIST__ = $cashlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cash): $mod = ($i % 2 );++$i;?>
        <div>
            ID：<?php echo $cash['user_id']; ?><br/>
            姓名：<?php echo $cash['name']; ?><br/>
            银行卡号：<?php echo $cash['banknum']; ?><br/>
            支付宝账号：<?php echo $cash['alipaynum']; ?><br/>
            提现额度：<?php echo $cash['ydc']; ?><br/>
            提现时间：<?php echo $cash['create_time']; ?><br/>
            <input type="submit" value="确定" id="<?php echo $cash['cash_id']; ?>ok" onclick="WithdrawConfirm('confirmsuccess',<?php echo $cash['cash_id']; ?>,<?php echo $cash['user_id']; ?>,<?php echo $cash['ydc']; ?>)"  />
            <input type="submit" value="取消" id="<?php echo $cash['cash_id']; ?>cancel" onclick="WithdrawConfirm('confirmfailed',<?php echo $cash['cash_id']; ?>,<?php echo $cash['user_id']; ?>,<?php echo $cash['ydc']; ?>)" />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"></iframe>
</div>

</body>
