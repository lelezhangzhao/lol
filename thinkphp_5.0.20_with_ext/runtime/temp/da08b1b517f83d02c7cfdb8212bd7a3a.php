<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:103:"H:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\invest_record\index.html";i:1531396526;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=1"></script>
    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />

    <script type="text/javascript">
        function InvestRevoke(invest_id){
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
                    document.getElementById("bill"+invest_id).innerHTML = xmlhttp.responseText;
//                    document.getElementById("bill"+invest_id).innerHTML = "0";
                    document.getElementById("revoke"+invest_id).disabled = "disabled";
                }
            }
            xmlhttp.open("POST", "/index.php/lol/invest_record/investrevoke?invest_id="+invest_id, true);
            xmlhttp.send()

        }
    </script>

</head>
<body >
<div id="top">

</div>



<div id="center_right">



</div>


<div id="bottom">
    <form method="post" target="exec_target">
        <h2>下注记录</h2>
        <?php if(is_array($investlist) || $investlist instanceof \think\Collection || $investlist instanceof \think\Paginator): $i = 0; $__LIST__ = $investlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$invest): $mod = ($i % 2 );++$i;?>
        <div class="info">
            比赛名称：<?php echo $invest['caption']; ?><br/>
            比赛时间：<?php echo $invest['matchtime']; ?><br/>
            下注额度：<?php echo $invest['ydc']; ?><br/>
            下注时间：<?php echo $invest['invest_create_time']; ?><br/>
            赔率：<?php echo $invest['rate']; ?><br/>
            结算：<span id="bill<?php echo $invest['id']; ?>"> <?php echo $invest['bill']; ?></span><br/>
            <input type="submit" value="撤销" id="revoke<?php echo $invest['id']; ?>" onClick=InvestRevoke(<?php echo $invest['id']; ?>) />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"/>
</div>

</body>
</html>