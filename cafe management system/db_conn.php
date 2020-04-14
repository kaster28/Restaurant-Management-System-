<?php
//connect to mysql
$con = mysql_connect('localhost','czhao10','zhao950208','czhao10');
$select=mysql_select_db('czhao10',$con);
if(!$con){
	printf("Connect failed:%s\n",mysqli_connect_error());
	exit();
}
?>