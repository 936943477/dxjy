$("header").load("hearder.html");
$("footer").load("footer.html");
//****************************$.get();
var T="";
var www=window.location.href;
www=www.slice(-2,www.length);
var app=angular.module('myApp',[]);
app.controller('siteCtrl',function ($scope, $http) {
    function getjson(url){
        $http.get(url,{params:{id:www}}).success(function (response) {
            $scope.cp=response;
            T=response;
            console.log(T);
            get(T);
        });
    }
    getjson("data/listOne.php");
});//anglar.js 调用php
//*********************************  form
function get(T){
    var form=$("form");
    form[0].action+="?id="+www+"&chanpin="+T.chanpin+"&buybzj="+T.buybzj+"&baozhuang="+T.baozhuang+"&user=啦啦啦啦";
    form[1].action+="?id="+www+"&chanpin="+T.chanpin+"&buybzj="+T.buybzj+"&baozhuang="+T.baozhuang+"&user=啦啦啦啦";
}

