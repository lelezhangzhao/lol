<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:103:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\invest\match_invest.html";i:1531530284;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\layout.html";i:1531529567;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\header.html";i:1531528433;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\footer.html";i:1531528480;}*/ ?>
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
        <h2>赛事列表（<?php echo $matchinfocount; ?>）</h2>
        <?php if(is_array($matchinfolist) || $matchinfolist instanceof \think\Collection || $matchinfolist instanceof \think\Paginator): $i = 0; $__LIST__ = $matchinfolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$matchinfo): $mod = ($i % 2 );++$i;?>
        <div class="info">
            比赛名称：<?php echo $matchinfo['caption']; ?><br/>
            赔率：<?php echo $matchinfo['rate']; ?><br/>
            当前可下注额度：<?php echo $matchinfo['remaininvest']; ?><br/>
            下注截止时间：<?php echo $matchinfo['cutofftime']; ?><br/>
            <input type="text" value="2000" id="ydc<?php echo $matchinfo['id']; ?>" />
            <input type="submit" value="下注" onClick="MatchInfoInvest('<?php echo $matchinfo['id']; ?>', document.getElementById('ydc<?php echo $matchinfo['id']; ?>').value)" />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

    </form>
</div>

</body>
