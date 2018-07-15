<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:98:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\withdraw\index.html";i:1531530325;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\layout.html";i:1531529567;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\header.html";i:1531528433;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\footer.html";i:1531528480;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=5"></script>

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
        <h2>提现</h2>
        <div>
            提现金额：<input type="text" name="ydc"/>ydc<br/>
            二级密码：<input type="text" name="secondpassword"/><br/>
            <input type="submit" value="提现到支付宝" formaction=<?php echo url('lol/withdraw/withdraw'); ?> />
        </div>
    </form>
</div>

</body>
