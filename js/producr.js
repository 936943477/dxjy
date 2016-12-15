$("header").load("../hearder.html");
$("footer").load("../footer.html");
/***** section id section_div*****/
//var html_tbody="",html_select_op="";//************************************************** anglar.js 生成的html
function clickLoad() {
    var width=$(".section_details>span").css("width");//获得详情页的标题的width
    $(".section_details>p>span").css("width",width);//width的值付给红色条
}//class为section_default img  load修改svg
clickLoad();
//***** anglar *****
angular.module('myApp', []).controller('siteCtrl', function($scope, $http) {
    function getjson(url,i){
        $http.get(url).success(function (response) {
            i===0?($scope.cp=response)
                :
                i===1?($scope.yh=response)
                    :
                    ($scope.cj=response);
            if (i==2){
                $scope.sl=option($scope.cj);
            }
        });
    }
    getjson("../data/listPro.php",0);
    getjson("../data/listuser.php",1);
    getjson("../data/listChujia.php",2);
});
transaction();
function transaction() {
    window.setTimeout(function () {
        //html_tbody=$("#section_div>div:nth-child(1)>div>div:not(.form_div,.editDetails) tbody");
        //html_select_op=$(".select_op");
        xianshi();
        clickAnglar();
    },1000);
}//anglar 执行完后
function xianshi() {
    $(".section_details tr.ng-scope.displayTr").removeClass("displayTr");
    var all=ctra();
    if ((all[1][0].innerHTML)!="1"){
        all[1][0].innerHTML="1";
    }
    for (var i=0;i<(all[0].length>6?6:all[0].length);i++){
        all[0][i].className+=" displayTr";
    }//默认的第一页 获得class displayTr
}//交易明细的分页 每6tr为一页//延迟500ms
function ctra(){
    var tr=$(".section_details tr:not(:nth-child(1))");//获得#section_div>div:nth-child(2) tr
    var a=$(".section_details .a-yeshu");
    var c=parseInt(tr.length/6);//计算出会有多少页
    if (c*6<tr.length){
        c++;
    }//如果c有小数点 进1
    return [tr,a,c];
}//分页换页的相应数据
function a_lirit(c,tr,a) {
    var x=parseInt(a.innerHTML);
    if (c==1){
        if (x==c){
            return "";
        }else {
            x--;
        }
    }else {
        if (x==c){
            return "";
        }else {
            x++;
        }
    }
    a.innerHTML=x;
    $(".section_details tr.displayTr").removeClass("displayTr");
    for (var i=(x-1)*6;i<x*6;i++){
        if (i==tr.length){
            break;
        }
        tr[i].className+=" displayTr";
    }
}//换页
/**********************************************************************************/
//***********************************  个人隐私 简写
function Privacy(){
    var tr=$("#section_div>div>div>div:nth-child(6) tr:not(:nth-child(1))");
    $.each(tr,function (i, index) {
        var html03=index.children[3].innerText;
        var html04=index.children[4].innerText;
        index.children[3].innerText=html03.slice(0,3)+"***"+html03.slice(-4,html03.length);
        index.children[4].innerText=html04.slice(0,3)+"***"+html04.slice(-4,html03.length);
    });
}
//*********************************** 删除  编辑 确认
function deletes(ids,cla,url) {
    $("#delete_Determine").click(function (event) {
        event.preventDefault();
        $.get(url,{id:ids,act:cla},function (data) {
            $("#promptBox").html('<div id="promptBox"> <div> <img src="../image/Confirm-02.png" alt=""> <span>'+data+'</span> </div> </div>');
            window.setTimeout(function () {
                window.location.href="index.php";
            },1000);
        });
    });
}
//********************************** anglar 完成后 click
function clickAnglar(){
    var li=$("#section_div li");//获得所有#section_div 下的li
    var html_divT=$("#BidManagement").html();//获得内容 #BidManagement
    var op=$(".select_op");//得到 .select_op
    var judge=$.trim(op.val());
    var tr="";
        /********************************   添加新产品   **********************************/
    $(".addpro").click(function (event) {
        event.preventDefault();
        $(".section_details").removeClass("section_details");
        $(".form_div").addClass("section_details");
        var width=$(".form_div>form>div>span").css("width");//获得详情页的标题的width
        $(".form_div>form>div>p>span").css("width",width);//width的值付给红色条
    });
    /********************************   编辑产品   **********************************/
    $(".edit").click(function (event) {
        event.preventDefault();
        $(".section_details").removeClass("section_details");
        $(".editDetails").addClass("section_details");
        var width=$(".editDetails>form>div>span").css("width");//获得详情页的标题的width
        $(".editDetails>form>div>p>span").css("width",width);//width的值付给红色条
    });
    //************************************ 删除  编辑
    $(".delete").click(function (event) {
        event.preventDefault();
        var url="../data/delUpdate.php";
        $(".delete_Confirm").css("display","block");
        var names=$(this)[0].name;
        var cla=$(this)[0].className;
        deletes(names,cla,url);
    });
    $("#Span_delete_Cancel").click(function (event) {
        event.preventDefault();
        $(".delete_Confirm").css("display","none");
    });
    $("#delete_Cancel").click(function (event) {
        event.preventDefault();
        $(".delete_Confirm").css("display","none");
    });
    $(".a-left").click(function (event) {
        event.preventDefault();
        var all=ctra();
        a_lirit(1,all[0],all[1][0]);
    });
    $(".a-right").click(function (event) {
        event.preventDefault();
        var all=ctra();
        a_lirit(all[2],all[0],all[1][0]);
    });
    op.mouseleave(function () {
        var val=$.trim($(this).val());//selest 的 value
        if (val!="-请选择-"){
            if (judge=="-请选择-"){
                tr=select_op(val);
            }else if (judge!="-请选择-"&&judge!=val){
                $("#BidManagement").html(function () {
                    var Xhtml="<tr><td>出价人</td><td>产品</td><td>方向</td><td>单价</td><td>数量</td><td>出价时间</td><td>操作</td></tr>";
                    for (var i=0;i<tr.length;i++){
                        Xhtml+="<tr>"+tr[i].innerHTML+"</tr>";
                    }
                    return Xhtml;
                });
                xianshi();//启动分页
            }
            judge=val;
        }
    });
    /*******************************************************************************************/
    li.click(function (event) {
        event.preventDefault();
        var divSon=$("#section_div>div>div>div:not(.form_div,.editDetails)");//获得所有#section_div 下的div
        $(".section_span").removeClass("section_span");//当前class为 section_span class为 “”
        $(".section_details").removeClass("section_details");//当前class为 section_details class为 “”
        $(this).addClass('section_default').siblings('.section_default').removeClass('section_default');//当前li的class为section_default 其余的为“”
        $(this)[0].children[0].className="section_span";//当前li的class为section_span
        for (var i=0;i<divSon.length;i++){
            if (li[i].className=="section_default"){
                divSon[i].className="section_details";
                break;
            }
        }//循环给对应的div  附上class section_details
        clickLoad();//启动clickLoad()
        if ($(this).text()=="出价管理"){
            $("#BidManagement").html(html_divT);
            $(".cjdelete").click(function (event) {
                event.preventDefault();
                var url="../data/delChujia.php";
                $(".delete_Confirm").css("display","block");
                var names=$(this)[0].name;
                var cla=$(this)[0].className.slice(2);
                deletes(names,cla,url);
            });//  出价管理 click事件
        }
        xianshi(); //**************分页
        if ($(this).text()=="用户管理"){
            Privacy();
        }
    });//导航的li点击事件
}//*********************************页面完成后的 事件
//********************************** option select
function option(x){
    var all=[];
    for (var i=0;i<x.length;i++){
        all[all.length]=x[i].chanpin;
    }
    var tmp = [];
    for (var r in all) {
        if (tmp.indexOf(all[r]) == -1) {
            tmp.push(all[r]);
        }
    }
    return tmp;
}//************************ selest 获得不相同的 option
function select_op(val){
    var tr=$('.section_details table tr:not([name*="'+val+'"])');//获得非 value的tr
    tr.splice(0,1);// 去掉第一个tr
    tr.remove();//删除 被选中tr
    xianshi();//启动分页
    return tr;//返回 被选中的tr
}