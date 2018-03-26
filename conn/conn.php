<?php

	$SAE_MYSQL_HOST_M='w.rdc.sae.sina.com.cn';
	$SAE_MYSQL_PORT=3307;
	$SAE_MYSQL_USER='on41z1n4kj';
	$SAE_MYSQL_PASS='h20y0zm0jm35y110jwijkj40i52zhxx3z3zj0x3y';
	$SAE_MYSQL_DB='app_farmer';
	$link = mysql_connect($SAE_MYSQL_HOST_M.':'.$SAE_MYSQL_PORT,$SAE_MYSQL_USER,$SAE_MYSQL_PASS);

// 连从库
// $db = mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	
	if ($link) {
    mysql_select_db($SAE_MYSQL_DB, $link);
    // ...
    }else{
        die("Connect Server Failed: " . mysql_error());
    }

	
?>