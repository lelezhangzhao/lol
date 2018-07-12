<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:104:"E:\share\lol.git\trunk\thinkphp_5.0.20_with_ext\public/../application/lol\view\charge_confirm\index.html";i:1531357371;}*/ ?>
<html>
<head>
    <title>LOL</title>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js?version=1"></script>

    <script type="text/javascript" src="/static/js/action.js?version=1"></script>
    <link rel="stylesheet" href="/static/css/style.css" type="text/css" />

    <script>
        function CashConfirm(type, cash_id, user_id, ydc) {

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
                    document.getElementById(cash_id+"ok").disabled = "disabled";
                    document.getElementById(cash_id+"cancel").disabled = "disabled";
                }

            }
            xmlhttp.open("GET", "/index.php/lol/charge_confirm/"+type+"?cash_id="+cash_id+"&user_id="+user_id+"&ydc="+ydc, true);
            xmlhttp.send()


//            xmlHttp.open("POST", "/index.php/lol/cashconfirm/confirmsuccess?cash_id=1&user_id=1&ydc=100", true);
//            xmlHttp.open("POST", "/index.php/lol/cash_confirm/"+type+"?cash_id="+cash_id+"&user_id="+user_id+"&ydc="+ydc, true);
        }
    </script>
</head>
<body >
<div id="top">

</div>



<div id="center_right">



</div>
<!--
$result = Db::view('user', 'id')
->view('account_info', 'name, banknum, alipaynum', 'account_info.user_id = user.id')
->view('cash', ['id' => 'cash_id', 'ydc', 'create_time'], 'cash.user_id = user.id')
->where(['cash.type' => 0, 'cash.status' => 0])
->select();


-->

<div id="bottom">
    <form method="post" action="" target="exec_target">
        <h2>充值(<?php echo $cashlistcount; ?>)</h2>
        <?php if(is_array($cashlist) || $cashlist instanceof \think\Collection || $cashlist instanceof \think\Paginator): $i = 0; $__LIST__ = $cashlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cash): $mod = ($i % 2 );++$i;?>
        <div>
            ID：<?php echo $cash['user_id']; ?><br/>
            姓名：<?php echo $cash['name']; ?><br/>
            银行卡号：<?php echo $cash['banknum']; ?><br/>
            支付宝账号：<?php echo $cash['alipaynum']; ?><br/>
            充值额度：<?php echo $cash['ydc']; ?><br/>
            充值时间：<?php echo $cash['create_time']; ?><br/>
            <input type="submit" value="确定" id="<?php echo $cash['cash_id']; ?>ok" onClick=CashConfirm("confirmsuccess",<?php echo $cash['cash_id']; ?>,<?php echo $cash['user_id']; ?>,<?php echo $cash['ydc']; ?>)  />
            <input type="submit" value="取消" id="<?php echo $cash['cash_id']; ?>cancel" onClick=CashConfirm("confirmfailed",<?php echo $cash['cash_id']; ?>,<?php echo $cash['user_id']; ?>,<?php echo $cash['ydc']; ?>) />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <iframe hidden id="exec_target" name="exec_target"></iframe>
</div>

</body>
</html>