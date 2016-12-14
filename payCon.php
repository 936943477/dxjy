<?php
    $password= $_REQUEST['password'];
    if($password==123456){
        $id= $_REQUEST['id'];
        $UnitPrice= $_REQUEST['UnitPrice'];
        $set= $_REQUEST['set'];
        $chanpin= $_REQUEST['chanpin'];
        $buybzj= $_REQUEST['buybzj'];
        $baozhuang= $_REQUEST['baozhuang'];
        $Total= $_REQUEST['Total'];
        $user= $_REQUEST['user'];
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
    <link rel="stylesheet/less" href="css/PayCon.less">
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
            <img src="image/pay-02.png" alt="">
        </div>
        <div>
            <?php
             echo '<form action="payWait.php?id='.$id.'&chanpin='.$chanpin.'&buybzj='.$buybzj.'&baozhuang='.$baozhuang.'&UnitPrice='.$UnitPrice.'&Total='.($UnitPrice*$set).'&buybzj='.$buybzj.'&set='.$set.'&user='.$user.'" method="post">';
            ?>
            <div>
                <p>购买定金</p>
                <p>银行卡</p>
                <p>手机验证码</p>
            </div>
                <div>
                <?php
                    echo '<p><span>'.$Total.'</span> 元</p>';
                ?>
                    <p><select><option>-请选择-</option></select></p>
                    <p><input type="text" name="verification"></p>
                </div>
                <p>
                    <button type="submit">确认</button>
                </p>
            </div>
        </form>
    </div>
</section>
<footer></footer>
<script type="text/javascript" src="js/payCon.js"></script>
</body>
</html>