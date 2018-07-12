
function OpenNewUrl(url) {
    window.open(url);
}


$(function(){

    $("li#match").click(function(){
        
    });
    $("li#investrecord").click(function(){
        // OpenNewUrl("/index.php/lol/charge/index");
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

    // $("input").click(function(){
    //     alert($(this).attr("name"));
    // });

});

