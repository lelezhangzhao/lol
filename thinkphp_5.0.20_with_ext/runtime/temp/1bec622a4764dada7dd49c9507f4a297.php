<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\index\match_invest.html";i:1531025546;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=1"></script>

    <script type="text/javascript">
        function MatchInfoInvest(id){
            var xmlhttp;
            if (window.XMLHttpRequest){
                //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();
            }
            else
            {
                // IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("id").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "/index.php/lol/index/matchinfoinvest?id="+id, true);
            xmlhttp.send()

        }
    </script>
    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />

</head>
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
            <p id="id"></p>
            <input type="submit" value="下注" onClick="MatchInfoInvest(<?php echo $matchinfo['id']; ?>)" />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

    </form>
</div>

</body>
</html>