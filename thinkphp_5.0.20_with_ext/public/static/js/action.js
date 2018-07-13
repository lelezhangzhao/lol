
var xmlhttp;
if (window.XMLHttpRequest){
    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
} else {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

//Invest
function MatchInvest(match_id){
    window.open("/index.php/lol/invest/matchinvest?match_id="+match_id);
}

//Index
function OpenNewUrl(url) {
    window.open(url);
}

$(function(){

    $("li#match").click(function(){
        GetMatch();
    });
    $("li#investrecord").click(function(){
        OpenNewUrl("/index.php/lol/invest_record/index");
    });
    $("li#charge").click(function(){
        OpenNewUrl("/index.php/lol/charge/index");
    });
    $("li#withdraw").click(function(){
        OpenNewUrl("/index.php/lol/withdraw/index");
    });
    $("li#zhuanzhang").click(function(){
        alert("zhuanzhang");
    });
    $("li#zhuanzhangjilu").click(function(){
        alert("zhuanzhangjilu");
    });
    $("li#displaypersoninfo").click(function(){
        OpenNewUrl("/index.php/lol/account_info/index");
    });
    $("li#xiugaimima").click(function(){
        alert("xiugaimima");
    });
    $("li#xiugaierjimima").click(function(){
        alert("xiugaierjimima");
    });

    $("li#xitonggonggao").click(function(){
        alert("xitonggonggao");
    });
});


function GetMatch(){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("index_match").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "/index.php/lol/index/getmatch", true);
    xmlhttp.send()
}

//InvestRecord
function InvestRevoke(invest_id){
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

function GetInvestRecord(){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("investrecord").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "/index.php/lol/invest_record/getinvestrecord", true);
    xmlhttp.send()

}





