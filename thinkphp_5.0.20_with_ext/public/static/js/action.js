
var xmlhttp;
if (window.XMLHttpRequest){
    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
} else {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

//invest
function MatchInvest(match_id){
    window.open("/index.php/lol/invest/matchinvest?match_id="+match_id);
}

//index
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
    $("li#transfer").click(function(){
        OpenNewUrl("/index.php/lol/transfer/index");
    });
    $("li#transferrecord").click(function(){
        OpenNewUrl("/index.php/lol/transfer_record/index");
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
    xmlhttp.open("POST", "/index.php/lol/index/getmatch", true);
    xmlhttp.send()
}

//invest_record
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

//charge_confirm
function ChargeConfirm(type, cash_id, user_id, ydc) {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(cash_id + "ok").disabled = "disabled";
            document.getElementById(cash_id + "cancel").disabled = "disabled";
        }

    }
    xmlhttp.open("POST", "/index.php/lol/charge_confirm/" + type + "?cash_id=" + cash_id + "&user_id=" + user_id + "&ydc=" + ydc, true);
    xmlhttp.send()
}

//match_invest
function MatchInfoInvest(matchinfo_id, ydc){
    window.open("/index.php/lol/invest/matchinfoinvest?matchinfo_id="+matchinfo_id+"&ydc="+ydc);
}

//withdraw_confirm
function WithdrawConfirm(confirmtype, cash_id, user_id, ydc) {

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById(cash_id+"ok").disabled = "disabled";
            document.getElementById(cash_id+"cancel").disabled = "disabled";
        }

    }
    xmlhttp.open("POST", "/index.php/lol/withdraw_confirm/"+confirmtype+"?cash_id="+cash_id+"&user_id="+user_id+"&ydc="+ydc, true);
    xmlhttp.send()
}

//match_confirm

function MatchConfirm(match_id, match_status){
    // var textStatusId = "status" + match_id;
    // var textStatus = document.getElementById(textStatusId).value;
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("status"+match_id).disabled = "disabled";
            document.getElementById("confirm"+match_id).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/lol/match_confirm/matchconfirm?status="+match_status+"&match_id="+match_id, true);
    xmlhttp.send()
}

function MatchInvestWin(matchinfo_id){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("investconfirmwin"+matchinfo_id).disabled = "disabled";
            document.getElementById("investconfirmdefeat"+matchinfo_id).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/lol/match_confirm/matchinvestwin?matchinfo_id="+matchinfo_id, true);
    xmlhttp.send()
}

function MatchInvestDefeat(matchinfo_id){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("investconfirmwin"+matchinfo_id).disabled = "disabled";
            document.getElementById("investconfirmdefeat"+matchinfo_id).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/lol/match_confirm/matchinvestdefeat?matchinfo_id="+matchinfo_id, true);
    xmlhttp.send()
}

//transfer_record
function GetTransferRecord(){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("transferrecord").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "/index.php/lol/transfer_record/gettransferrecord", true);
    xmlhttp.send()
}

function TransferConfirm(btnid){
    document.getElementById("transferconfirm"+btnid).disabled = "disabled";
}









