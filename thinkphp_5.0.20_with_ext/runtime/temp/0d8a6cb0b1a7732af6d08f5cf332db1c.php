<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\index\index.html";i:1531381698;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=3"></script>

    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />

    <script type="text/javascript">
        function MatchInvest(id){

            window.open("/index.php/lol/invest/matchinvest?id="+id);
//            var xmlhttp;
//            if (window.XMLHttpRequest){
//                //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
//                xmlhttp=new XMLHttpRequest();
//            }
//            else
//            {
//                // IE6, IE5 浏览器执行代码
//                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//            }
//            xmlhttp.onreadystatechange = function(){
//                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
//                    alert(xmlhttp.responseText);
//                    document.getElementById("id").innerHTML = xmlhttp.responseText;
//                }
//
//            }
//            xmlhttp.open("GET", "/index.php/lol/index/matchinvest?id="+id, true);
//            xmlhttp.send()

        }
    </script>

</head>
<body >
<div id="top">

</div>

<div id="center_left" class="menuDiv">
    <ul>
        <li id="match"><a href="#">赛事列表</a></li>
        <li id="investrecord"><a href="#">下注记录</a></li>
        <li id="chongzhitixian"><a href="#">充值提现</a>
            <ul>
                <li id="charge"><a href="#">充值</a></li>
                <li id="withdraw"><a href="#">提现</a></li>
                <li id="zhuanzhang"><a href="#">转账</a></li>
                <li id="zhuanzhangjilu"><a href="#">转账记录</a></li>
            </ul>
        </li>
        <li id="personinfo"><a href="#">个人信息</a>
            <ul>
                <li id="displaypersoninfo"><a href="#">显示个人信息</a></li>
                <li id="xiugaimima"><a href="#">修改密码</a></li>
                <li id="xiugaierjimima"><a href="#">修改二级密码</a></li>
            </ul>
        </li>
        <li id="xitonggonggao"><a href="#">系统公告</a></li>

    </ul>

</div>

<div id="center_right">



</div>


<div id="bottom">
    <form method="post" >
        <h2>赛事列表（<?php echo $count; ?>）</h2>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$match): $mod = ($i % 2 );++$i;?>
        <div class="info">
            比赛名称：<?php echo $match['caption']; ?><br/>
            比赛时间：<?php echo $match['matchtime']; ?><br/>
            <input type="submit" value="下注" onClick="MatchInvest(<?php echo $match['id']; ?>)" />

            <!--<input type="submit" value="下注" formaction="<?php echo url('index.php/lol/index/matchinvest?id=1'); ?>" />-->
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

    </form>
</div>

</body>
</html>