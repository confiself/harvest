<?php 
//connect database
require ('conn/conn.php');
$seedId=$_POST['seedId'];
$altitude=$_POST['altitude'];
$location=$_POST['location'];
$temperature=$_POST['temperature'];
$humidity=$_POST['humidity'];
$soilProperty=$_POST['soilProperty'];
$cropPhoto=$_POST['cropPhoto'];
$acreage=$_POST['acreage'];
$cropName=$_POST['cropName'];
$seedPrice=$_POST['seedPrice'];
$cropPrice=$_POST['cropPrice'];
$uploadContact=$_POST['uploadContact'];
$uploadTime=date('Y-m-d H:m:s');
$notes=$_POST['notes'];

$query="update seed_info set altitude=$altitude,location='$location',temperature=$temperature,humidity=$humidity,soilProperty='$soilProperty',cropPhoto='$cropPhoto',acreage=$acreage,cropName='$cropName',seedPrice=$seedPrice,cropPrice=$cropPrice,uploadContact='$uploadContact',uploadTime='$uploadTime',notes='$notes' where seedId=$seedId";
$array=array();
$result=mysql_query($query,$link);
if($result){
    echo "{\"status\":\"success\"}"; 
    
}else{
     echo "{\"status\":\"error\"}"; 
}



?>