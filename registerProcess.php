<?php 
header("Content-type: text/html; charset=utf-8");
//connect database
require ('conn/conn.php');
//get information
$name=$_POST['userName'];
$password=$_POST['password'];
$mail=$_POST['mail'];
//user_info(name,password,telephone,mail,address,userType,registerTime)VALUES('fsdf','fsdf','fsdf','fsdf','fsdf',1,'1991-02-02')
$resisterTime=date('Y-m-d H:m:s');
$query="insert into user_info(name,password,telephone,mail
,address,userType,registerTime) values ('$name','$password',
'','$mail','',1,'$resisterTime')";
//save register
echo $query;
$result=mysql_query($query,$link);
if($result){
	echo '注册成功！正跳转到登录页面...';
	//goto login page
	echo "<meta http-equiv=\"refresh\"content=\"3;url=login.php\">";
}else{
	echo '注册失败！';
}

?>