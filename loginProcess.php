<?php 
//connect database
session_start();
require ('conn/conn.php');
$name=$_POST['userName'];
$password=$_POST['password'];
$query="select * from user_info where name='$name' and password='$password'";
$result=mysql_query($query,$link) or die ('Error querying database.');
$rs=mysql_fetch_object($result);
if ($rs) {
	echo '登录成功,正跳转到主页...';
	echo "<meta http-equiv=\"refresh\"content=\"3;url=index.php\">";
	$_SESSION['loginName']=$name;
}else{
	echo '用户名或密码不正确！';
	echo "<meta http-equiv=\"refresh\"content=\"3;url=login.php\">";
}
?>