<?php
    $id= $_REQUEST['id'];
    $UnitPrice= $_REQUEST['UnitPrice'];
    $set= $_REQUEST['set'];
    $buySell= $_REQUEST['buySell'];
    $uesr= $_REQUEST['uesr'];
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
                    <p>总金额</p>
                    <p>包装快递费</p>
                    <p>总计</p>
                </div>
                <div>
                    <p>唐卡投票</p>
                    <p><?php echo $UnitPrice?></p>
                    <p>100套</p>
                    <p>1000元</p>
                    <p>1000*0.03=30元</p>
                    <p>1000*0.03=30元</p>
                    <p><span>1180</span>元</p>
                </div>
            </div>
            <div>
                <p>如果商品没有成交，支付定金将全额退回</p>
                <p>交易密码</p>
                <p>
                    <button type="button">确认卖出</button>
                </p>
            </div>
        </div>
    </div>
</section>
<footer></footer>
<script type="text/javascript" src="js/Payment.js"></script>
</body>
</html>