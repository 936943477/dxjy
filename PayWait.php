<?php
<<<<<<< HEAD

    $password= $_REQUEST['password'];
    if($password==123456){
        $id= $_REQUEST['id'];
        $UnitPrice= $_REQUEST['buyUnitPric'];
        $set= $_REQUEST['buyset'];
=======
        require_once 'mysql.func.php';
        connect();

    $verification= $_REQUEST['verification'];
    if($verification==123456){

        $UnitPrice= $_REQUEST['UnitPrice'];
        $datas= $_REQUEST['set'];
>>>>>>> 936943477/master
        $chanpin= $_REQUEST['chanpin'];
        $buybzj= $_REQUEST['buybzj'];
        $baozhuang= $_REQUEST['baozhuang'];
        $Total= $_REQUEST['Total'];
<<<<<<< HEAD
    }else{
    echo "<p>密码错误,请重新输入！</p>";
    }




=======



        $act='buy';
        $pid=$_REQUEST['id'];
        $UnitPrice=$_REQUEST['UnitPrice'];

        $user=$_REQUEST['uesr'];  //用户

        $time=date('Y-m-d H:i:s',time());

        $result = compact("act", "pid", "UnitPrice", "datas", "user",  "time");

        $res=insert("chujia",$result);


        if($res){
        		//订单管理  当出价大于必卖价或者必买价 产生订单
        		if($act=="buy"){
        			//买价大于必卖价产生订单
                    echo $act;
        		}else if($act=="sell"){
        			//卖出价大于必买价产生订单
                    echo $act;

        		}

        	}else{
        		echo "出价失败";

        	}

    }else{
        echo "<p>验证码错误,请重新输入！</p>";
    }
>>>>>>> 936943477/master
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