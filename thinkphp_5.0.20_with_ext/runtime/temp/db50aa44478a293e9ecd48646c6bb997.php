<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:103:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\match_confirm\index.html";i:1531553395;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\layout.html";i:1531529567;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\header.html";i:1531528433;s:80:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\application\lol\view\footer.html";i:1531528480;}*/ ?>
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
<body>
<div id="top"></div>

<div id="center_right"></div>

<div id="bottom">
    <form method="post" target="exec_target" >
        <h2>比赛进度</h2>
        <?php if(is_array($matchconfirmlist) || $matchconfirmlist instanceof \think\Collection || $matchconfirmlist instanceof \think\Paginator): $i = 0; $__LIST__ = $matchconfirmlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$matchconfirm): $mod = ($i % 2 );++$i;?>
            <div>
                比赛名称：<?php echo $matchconfirm['caption']; ?><br/>
                比赛时间：<?php echo $matchconfirm['matchtime']; ?><br/>
                比赛状态：<input type="text" id="status<?php echo $matchconfirm['matchid']; ?>" value="<?php echo $matchconfirm['status']; ?>" />
                <input type="submit" value="确定" id="confirm<?php echo $matchconfirm['matchid']; ?>" onclick="MatchConfirm(<?php echo $matchconfirm['matchid']; ?>)"/>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        <h2>下注胜负</h2>
        <?php if(is_array($matchinvestconfirmlist) || $matchinvestconfirmlist instanceof \think\Collection || $matchinvestconfirmlist instanceof \think\Paginator): $i = 0; $__LIST__ = $matchinvestconfirmlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$matchinvestconfirm): $mod = ($i % 2 );++$i;?>
            <div id="matchinvestconfirmlist">
                比赛名称：<?php echo $matchinvestconfirm['caption']; ?><br/>
                比赛时间：<?php echo $matchinvestconfirm['matchtime']; ?><br/>
                <input type="submit" value="胜" id="investconfirmwin<?php echo $matchinvestconfirm['matchinfoid']; ?>" onclick="MatchInvestWin(<?php echo $matchinvestconfirm['matchinfoid']; ?>)" />
                <input type="submit" value="负" id="investconfirmdefeat<?php echo $matchinvestconfirm['matchinfoid']; ?>" onclick="MatchInvestDefeat(<?php echo $matchinvestconfirm['matchinfoid']; ?>)" />
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"/>
</div>

</body>
