<?php
/**
 * Created by PhpStorm.
 * User: gaojig
 * Date: 16/12/15
 * Time: 下午4:06
 */



require_once '../include.php';
/*checkLogined();
$user=$_SESSION['username'];*/
$user= "'李咏燋'";
$sql="select p.chanpin, c.user, c.act, c.UnitPrice, c.datas, c.time from chujia as c join product p on c.pid=p.id where c.user={$user}";
$rows=fetchAll($sql);
echo json_encode($rows);
?>