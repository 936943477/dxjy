<?php
    require_once 'include.php';
    checkLogined();
    $sql="select id,user,name,phone, idcard, bank, province, city, region, address, time from user ";
    $rows=fetchAll($sql);
    echo json_encode($rows);
?>