/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    $("#content").load("card.php?cid=1");
    var dt=null;
    $("#main #tit h3").mouseover(function(){
        var obj=$(this);
        dt=setTimeout(function(){
            obj.addClass("titin").siblings("h3").removeClass("titin");
            $("#centent").load(obj.children("a").eq(0).attr("href"));
        },250);        
    }).mouseout(function(){
        clearTimeout(dt);
    });
});
