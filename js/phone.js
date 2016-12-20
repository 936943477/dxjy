$("header").load("../hearder.html");
$("footer").load("../footer.html");
/******************************** 手机号判断 ***************************************/
var rel=/^[1][3458][0-9]{9}$/;
var judge="";
var random="";
$("input[name*=phone]").keyup(function (){
    judge=rel.test($(this).val());
});
$("input[name*=verification]").keyup(function (){
    if ($(this).val()==$("input[name*=phone]").val()&&judge){
        $(".button").removeAttr("disabled");
        $(".div").removeClass("dis");
    }else{
        $(".button")[0].disabled="disabled";
        $(".div").addClass("dis");
    }
});