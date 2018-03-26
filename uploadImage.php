<?php 
	session_start();
	require 'conn/conn.php';

	$photoPath=$_FILES['cropPhoto']['name'];
	$storage= new SaeStorage();// 创建SAE storage存储对象
	$domain = 'harvest';// 这里的$domain对应得名字就是自己起的名字
	//if($storage->fileExists($domain,$filename) == true)文件已存在判断
	$storage->upload( $domain,$photoPath,$_FILES['cropPhoto']['tmp_name']);
echo "{\"status\":\"success\"}";
?>