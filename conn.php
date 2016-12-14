<?PHP
header("content-type:text/html;charset=utf-8");


//包含数据库连接文件
mysql_connect("43.254.53.186:3307","puxun","puxun2015");    //连接数据库
mysql_select_db("xhangxian");   //选择数据库
mysql_query("set names utf8");  //设定字符集

?>