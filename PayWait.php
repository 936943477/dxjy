<?php

    $password= $_REQUEST['password'];
    if($password==123456){
        $id= $_REQUEST['id'];
        $UnitPrice= $_REQUEST['buyUnitPric'];
        $set= $_REQUEST['buyset'];
        $chanpin= $_REQUEST['chanpin'];
        $buybzj= $_REQUEST['buybzj'];
        $baozhuang= $_REQUEST['baozhuang'];
        $Total= $_REQUEST['Total'];
    }else{
    echo "<p>密码错误,请重新输入！</p>";
    }




?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新航线</title>
    <link rel="stylesheet/less" href="css/PayWait.less">
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/less.min.js"></script>
    <script type="text/javascript" src="js/src/angular.min.js"></script>
</head>
<body>
<header></header>
<section>
    <div>
        <img src="image/pay-00.png" alt="">
    </div>
    <div></div>
    <div>
        <div>
            <img src="image/pay-03.png" alt="">
        </div>
        <div>
            <img src="image/pay-04.png" alt="">
            <h2>出价成功！<br>请您耐心等待成交，您也可在个人中心查看最新进展。</h2>
            <a href="#">确认</a>
        </div>
    </div>
</section>
<footer></footer>
<script type="text/javascript" src="js/PayWait.js"></script>
</body>
</html>