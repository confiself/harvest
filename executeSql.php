<?php 
//connect database
require ('conn/conn.php');
@header("Content-type: text/json; charset=utf-8");
$query=$_POST["sql"];
$result=mysql_query($query,$link);
$array=array();
if ($result) {
	$array[0]=array("status"=>"success");
	$i=1;
	if(stripos($query, "from")>0){
		while($row=mysql_fetch_assoc($result)) {
			$array[$i]=$row;
			$i++;
		}
	}
}else {
	$array[0]=array("status"=>"error");
}
$str=json_encode($array);
echo $str;
?>