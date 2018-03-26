<?php
header("Content-type: text/html; charset=utf-8");
session_start();
$_SESSION['loginName']=""; 
echo "正在退出...";
echo "<meta http-equiv=\"refresh\"content=\"3;url=login.php\">";
?>