<?php 
header("Content-type: text/html; charset=utf-8");
//connect database
require ('conn/conn.php');

//define date
$uploadTime=date('Y-m-d H:m:s');
//上传到sae storage中
preg_match_all('/\d+/',$uploadTime,$timePath);
$timePath = join('',$timePath[0]).rand(1000, 9999);
//define path
$photoPath=$timePath.$_FILES['cropPhoto']['name'];//
$storage= new SaeStorage();// 创建SAE storage存储对象
$domain = 'farmer';// 这里的$domain对应得名字就是自己起的名字
//if($storage->fileExists($domain,$filename) == true)文件已存在判断
$storage->upload( $domain,$photoPath,$_FILES['cropPhoto']['tmp_name']);

//get information,need client do some reject
$cropName=$_POST['cropName'];
$altitude=$_POST['altitude'];
$location=$_POST['location'];
$temperature=$_POST['temperature'];
$humidity=$_POST['humidity'];
$soilProperty=$_POST['soilProperty'];
$acreage=$_POST['acreage'];
$seedPrice=$_POST['seedPrice'];
$cropPrice=$_POST['cropPrice'];
$uploadContact=$_POST['uploadContact'];
$notes=$_POST['notes'];

$query="insert into seed_info(altitude,location,temperature,humidity
,soilProperty,cropPhoto,acreage,cropName,seedPrice,cropPrice,uploadContact,uploadTime,notes) 
values ($altitude,'$location',$temperature,$humidity,'$soilProperty','$photoPath',$acreage,
'$cropName',$seedPrice,$cropPrice,'$uploadContact','$uploadTime','$notes')";
//echo "$query";
$result=mysql_query($query,$link);
if($result){
	echo '提交成功...';
}else{
	echo '提交失败...';
}
echo "<meta http-equiv=\"refresh\"content=\"3;url=seeEdit.php\">";
?>