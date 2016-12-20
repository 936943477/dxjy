<?php
/**
 * Created by PhpStorm.
 * User: gaojig
 * Date: 16/12/16
 * Time: 下午2:39
 */

require_once '../include.php';
/*checkLogined();

$user=$_SESSION['username'];*/
$user= "'李咏燋'";
$sql="select id,user,name,phone, idcard, bank,jyword, time from user where user={$user}";
$rows=fetchOne($sql);
echo json_encode($rows);
?>