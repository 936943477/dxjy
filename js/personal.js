$("header").load("../hearder.html");
$("footer").load("../footer.html");
/***** section id section_div*****/
function clickLoad() {
    var img=$(".section_default img")[0];//获取class为section_default img
    img.src="../"+(""+img.src).slice(-14).replace("-1","");//需改src svg
    var width=$(".section_details>span").css("width");//获得详情页的标题的width
    $(".section_details>p>span").css("width",width);//width的值付给红色条
}//class为section_default img  load修改svg
clickLoad();
//***** ***** annglar ***** *****
//***** anglar.js ****
angular.module('myApp', []).controller('siteCtrl', function($scope, $http) {
    function getjson(url,i){
        $http.get(url).success(function (response) {
            i===0?($scope.jy=response)
                :
                i==1?($scope.dd=response)
                :
                    ($scope.aq=response);
        });
    }
    getjson("../data/userChujia.php",0);
    getjson("../data/userInfo.php",2);
    transaction();
    });
function transaction() {
    window.setTimeout(function () {
        xianshi();
        clickAnglar();
    },1000);
}//交易明细的分页 每6tr为一页//延迟75ms
function xianshi() {
    $(".section_details tr.displayTr").removeClass("displayTr");
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
function clickAnglar(){
    var li=$("#section_div li");
    var span=$(".pass");
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
    li.click(function (event) {
        event.preventDefault();
        var divSon=$("#section_div>div");//获得所有#section_div 下的div
        var img=$(".section_default img")[0];//获取class为section_default img
        var src=(""+img.src).slice(-12);//img 的 src 字符串
        img.src="../"+src.slice(0,-4)+"-1"+src.slice(-4,src.length);//img的src赋值
        $(".section_span").removeClass("section_span");//当前class为 section_span class为 “”
        $(".section_details").removeClass("section_details");//当前class为 section_details class为 “”
        $(this).addClass('section_default').siblings('.section_default').removeClass('section_default');//当前li的class为section_default 其余的为“”
        $(this)[0].children[1].className="section_span";//当前li的class为section_span
        for (var i=0;i<divSon.length;i++){
            if (li[i].className=="section_default"){
                divSon[i].className="section_details";
                break;
            }
        }//循环给对应的div  附上class section_details $.trim($(this).val())
        clickLoad();//启动clickLoad()
        if ($.trim($(this).text())=="交易明细"||$.trim($(this).text())=="订单明细"){
            xianshi();//启动xiaoshi()
        }//只能 交易明细 订单明细 才能使用这fun
        if ($.trim($(this).text())=="安全中心"){
            if (span.text()==""){
                span.text("未设置");
            }else {
                span.text("已设置");
            }
        }
        Privacy();
    });//导航的li点击事件
}//*********************************页面完成后的 事件
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
//****************************************************  个人隐私
function Privacy(){
    var span=$(".privacy span:nth-child(2)");
    //span[0].innerHTML=(span[0].innerHTML.slice(0.6))+"***"+(span[0].innerHTML.slice(-4.,span[0].innerHTML.length));
    for (var i=0;i<span.length-1;i++){
        var html=span[i].innerHTML;
        span[i].innerHTML=(
            i==0?html.slice(0,4)+"***"+html.slice(-4,html.length)
                :
                i==1?html.slice(0,3)+"***"+html.slice(-4,html.length)
                    :
                    html.slice(0,3)+"***"+html.slice(-4,html.length)
        );
    }
}