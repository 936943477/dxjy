<?php
/**
 * Created by PhpStorm.
 * User: gaojig
 * Date: 16/12/15
 * Time: 下午2:37
 */

require_once 'mysql.func.php';
connect();

$id=$_REQUEST['id'];


    // 删除操作
    $where="id={$id}";
    $res=delete("chujia",$where);
    if($res){
        $mes="删除成功!";
    }else{
        $mes="删除失败!";
    }
    echo $mes;



?>