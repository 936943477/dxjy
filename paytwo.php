<?php
    $id= $_REQUEST['id'];
    $UnitPrice= $_REQUEST['buyUnitPric'];
    $set= $_REQUEST['buyset'];
    $chanpin= $_REQUEST['chanpin'];
    $buybzj= $_REQUEST['buybzj'];
    $baozhuang= $_REQUEST['baozhuang'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新航线</title>
    <link rel="stylesheet/less" href="css/Payment.less">
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
            <img src="image/pay-01.png" alt="">
        </div>
        <div>
            <div>
                <div>
                    <p>购买产品</p>
                    <p>购买单价</p>
                    <p>购买数量</p>
                    <p>总金额</p>
                    <p>保证金</p>
                    <p>包装快递费</p>
                    <p>总计</p>
                </div>
                <div>
                <?php
                    echo "<p>".$chanpin."</p>";
                    echo "<p>".$UnitPrice."元</p>";
                    echo "<p>".$set."</p>";
                    echo "<p>".$UnitPrice*$set."元</p>";
                    echo "<p>".$buybzj."元</p>";
                    echo "<p>".$baozhuang."元</p>";
                    echo "<p><span>".($UnitPrice*$set+$buybzj+$baozhuang)."</span>元</p>";
                ?>
                </div>
            </div>
            <div>
            <?php
                echo '<form action="PayWait.php?id='.$id.'&chanpin='.$chanpin.'&buybzj='.$buybzj.'&baozhuang='.$baozhuang.'&UnitPrice='.$UnitPrice.'&Total='.$UnitPrice*$set.'&buybzj='.$buybzj.'" method="post">';
            ?>
                    <p>如果商品没有成交，支付定金将全额退回</p>
                    <p>交易密码 &nbsp;<input type="password" name="password"></p>
                    <p>
                        <button type="submit">确认卖出</button>
                    </p>
                 </form>
            </div>
        </div>
    </div>
</section>
<footer></footer>
<script type="text/javascript" src="js/paytwo.js"></script>
</body>
</html>