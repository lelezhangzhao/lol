<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:103:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\invest_record\index.html";i:1531463998;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=1"></script>
    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />

    <script type="text/javascript">
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

        function investrevoke(invest_id){
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
//                    document.getElementById("bill"+invest_id).innerHTML = xmlhttp.responseText;
                    document.getElementById("bill"+invest_id).innerHTML = "0";
                    document.getElementById("result"+invest_id).innerHTML = "撤销";
                    document.getElementById("revoke"+invest_id).disabled = "disabled";
                }
            }
            xmlhttp.open("POST", "/index.php/lol/invest_record/investrevoke?invest_id="+invest_id, true);
            xmlhttp.send()

        }

//        function ShowRevokeButton(btnId, investStatus, investCreateTime, matchTime){
//            if(investStatus != 0){
//                document.getElementById(btnId).style.display = 'none';
//            }
//
//            var cur_time = new Date() / 1000;
//            var invest_createtime = Date.parse(investCreateTime) / 1000;
//            var match_time = Date.parse(matchTime) / 1000;
//
//            var investcreatetime_to_now_minus = (cur_time - invest_createtime) / 60;
//            var now_to_matchtime_minus = (match_time - cur_time) / 60;
//            if(investcreatetime_to_now_minus >= 5){
//                document.getElementById(btnId).style.display = 'none';
//            }
//            if(now_to_matchtime_minus <= 5){
//                document.getElementById(btnId).style.display = 'none';
//            }
//        }

        function getinvestrecord(){
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("investrecord").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "/index.php/lol/invest_record/getinvestrecord", true);
            xmlhttp.send()

        }

    </script>

</head>
<body onload="getinvestrecord()">
<div id="top">

</div>



<div id="center_right">



</div>


<div id="bottom">
    <form method="post" target="exec_target">
        <h2>下注记录</h2>
        <div id="investrecord">
        </div>
    </form>
    <iframe hidden id="exec_target" name="exec_target"/>
</div>

</body>
</html>