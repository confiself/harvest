<?php 
		require 'nav.php';
	?>
<?php
	require ('conn/conn.php'); 		//加载数据库配置文件 						//设定每页显示条目数
	if(isset($_GET['seedId'])&&$_GET['seedId']!='') {
		$seedId=$_GET['seedId'];
	}else{
		$seedId=-1;
	}
	//连表组合查询SQL语句
	$sql = "SELECT * FROM seed_info where seedId=".$seedId;
	$result = mysql_query($sql,$link);
	$rs=mysql_fetch_object($result)
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<head>
    <title>detail</title>
    <link rel="stylesheet" href="./assets/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./assets/css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./assets/css/detail.css" type="text/css" media="screen" />
    <style>
       .slider-wrapper { 
		width: 600px; 
        height:400px;
        padding-top:10px;
		margin: 0px auto;
		}
    </style>
</head>
<body> 
     <div id="detail-left">
        种子名称：<?php echo $rs->cropName?><br>
        海拔：<?php echo $rs->altitude?>米<br>
        位置：<?php echo $rs->location?><br>
        温度：<?php echo $rs->temperature?>℃<br>
        湿度：<?php echo $rs->humidity?><br>
        种子价格：<?php echo $rs->seedPrice?> 元/斤<br>
        农作物价格：<?php echo $rs->cropPrice?>元/斤<br>
        种植面积：<?php echo $rs->acreage?>公顷<br>
        土壤特性：<?php echo $rs->soilProperty?><br>
        上传者：<?php echo $rs->uploadContact?><br>
        上传时间：<?php echo $rs->uploadTime?><br>
        备注：<?php echo $rs->notes?><br>
    </div>
   
    <div id="wrapper">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php $photoArr = explode(';',$rs->cropPhoto);for ($x=0; $x<count($photoArr); $x++) {?>
                <img src="<?php echo $photoArr[$x] ?>" data-thumb="<?php echo $photoArr[$x] ?>" alt="" /> 
                <?php } ?>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="./assets/jquery.js"></script>
    <script type="text/javascript" src="./assets/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</body>
</html>