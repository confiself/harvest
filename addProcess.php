<?php 
	session_start();
	require 'conn/conn.php';
	//check weather the submit is empty
	if ($_POST['submit']=='') {
		echo 'submit is null';
	}else {
		echo 'begin process';
		if (!is_dir('./upfile')) {
			mkdir('./upfile');
		}
		//define date
		$upDate=date('Y-m-d H:m:s');
		//define path
		$path='./upfile'.$_FILES['picture']['name'];
		//upload
		move_uploaded_file($_FILES['picture']['tmp_name'], $path);
		//insert into table
		$fileName=$_POST['fileName'];
		$query="insert into tb_up_file(file_test,up_date,file_name)" 
			. "values('$path','$upDate','$fileName')";
		mysql_query($query);
		echo "upload success please wait...";
		echo "<meta http-equiv=\"refresh\"content=\"3;url=add.php\">";
	}
?>