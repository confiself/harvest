<?php 
//connect database
require ('conn/conn.php');
//get information
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

$query="insert into seed_info(altitude,location,temperature,humidity,soilProperty,cropPhoto,acreage,cropName,seedPrice,cropPrice,uploadContact,uploadTime,notes) values ($altitude,'$location',$temperature,$humidity,'$soilProperty','$cropPhoto',$acreage,'$cropName',$seedPrice,$cropPrice,'$uploadContact','$uploadTime','$notes')";
$array=array();
$result=mysql_query($query,$link);
if($result){
   $query="select max(seedId) as seedId from seed_info where  uploadContact='$uploadContact'";
   $result=mysql_query($query,$link);
    if(mysql_num_rows($result)){
       echo "{\"status\":\"success\",\"result\":[";
		$i=1;
		while($row=mysql_fetch_assoc($result)) {
		   if($i != 1){
            echo ",";
            echo json_encode($row);
           }else{
       		echo json_encode($row) ;
           }
		$i++;
        
        }//while
    echo "]}";
    }else{
       echo "{\"status\":\"error\"}"; 
    }
    
}else{
    echo "{\"status\":\"error\"}"; 
}



?>