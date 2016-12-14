<?php
/**
 * Created by PhpStorm.
 * User: gaojig
 * Date: 16/12/14
 * Time: 下午3:18
 */
session_start();
require_once 'data/mysql.func.php';
connect();

function checkLogined(){
    if($_SESSION['userid']==""&&$_COOKIE['userid']==""){
        alertMes("请先登陆","login.html");
    }
}

function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}