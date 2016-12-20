$("header").load("../hearder.html");
$("footer").load("../footer.html");
/******************************** 手机号判断 ***************************************/
var rel = /^(\d{16}|\d{19})$/;
var judge="";
var random="";
$("input[name*=bank]").keyup(function (){
    judge=rel.test($(this).val());
});
$("input[name*=banks]").keyup(function (){
    if ($(this).val()==$("input[name*=bank]").val()&&judge){
        $(".button").removeAttr("disabled");
        $(".div").removeClass("dis");
    }else{
        $(".button")[0].disabled="disabled";
        $(".div").addClass("dis");
    }
});