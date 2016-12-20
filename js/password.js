$("header").load("../hearder.html");
$("footer").load("../footer.html");
/**************************  ********************************/
var rel=/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,19}$/;
var rels=/^\d+$/;
var div=$(".Prompt");
var input=$("input[name*=password]");
var again=$("input[name*=again]");
input.focusout(function () {
    div[0].className="Prompt ul";
    if ($(this).val() == "") {
        div[1].className="Prompt div dis";
    } else if (rel.test($(this).val()) == false) {
        div[0].className= "Prompt ul dis";
        div[1].className="Prompt div";
    }
});// 失去焦点
input.focusin(function () {
    if ($.trim($(this).val())==""){
        div[0].className+=" dis";
        div[1].className="Prompt div";
    }
});// 获得焦点
input.keyup(function () {
    if (rel.test($(this).val())){
        div[0].className="Prompt ul dis";
        div[1].className="Prompt div";
        $(".ul_i").addClass("iback");
    }else{
        div[0].className="Prompt ul dis";
        $(".ul_i").removeClass("iback");
    }
});// 按键释放
again.focusout(function () {
    if ($("input[name*=password]").val()!=""){
        if ($("input[name*=password]").val()!=$(this).val()&&$(this).val()!=""){
            div[2].className += " dis";
            div[2].innerHTML="两次输入密码不一致";
        }else if ($(this).val()==""){
            div[2].className += " dis";
            div[2].innerHTML="不能为空";
        }
    }else{
        div[2].className += " dis";
        div[2].innerHTML="不能为空";
    }
});
again.keyup(function () {
    if ($("input[name*=password]").val()==$(this).val()){
        div[2].className="Prompt div";
        $(".button").removeAttr("disabled");
    }else {
        $(".button")[0].disabled = "disabled";
    }
});