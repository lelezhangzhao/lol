
function MatchInfoInvest(url) {
    window.open(url);
}


$(function(){



    $("li#match").click(function(){
        
    });
    $("li#xiazhujilu").click(function(){
        alert("xiazhujilu");
    });
    $("li#charge").click(function(){
        MatchInfoInvest("/index.php/lol/charge/index");
    });
    $("li#tixian").click(function(){
        alert("tixian");
    });
    $("li#zhuanzhang").click(function(){
        alert("zhuanzhang");
    });
    $("li#zhuanzhangjilu").click(function(){
        alert("zhuanzhangjilu");
    });
    $("li#displaypersoninfo").click(function(){
        MatchInfoInvest("/index.php/lol/account_info/index");
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

    // $("input").click(function(){
    //     alert($(this).attr("name"));
    // });

});

