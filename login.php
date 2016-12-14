<?PHP
header("content-type:text/html;charset=utf-8");
// if(!isset($_POST['submit'])){
//     exit('非法访问!');
// }
require_once 'include.php';
//注销登录
if($_GET['action'] == "logout"){
    $_SESSION = array(); // 把session清空。
    session_destroy();   // 彻底销毁session
    header("location:login.html");  // 跳到登录页面
    exit;
}
$username = htmlspecialchars($_POST['user']);
$password = $_POST['password'];

//包含数据库连接文件
include('conn.php');
$check_query = mysql_query("select id from user where user='$username' and password='$password' limit 1");
if($result = mysql_fetch_array($check_query)){
    //登录成功

    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['id'];

    header("location:my.php");  // 跳到登录页面
    exit;
} else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}


?>