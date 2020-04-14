<?php 
include("db_conn.php");

$staff=$_POST['staff'];
foreach ($staff as $ID) {
 	//echo $ID;
		$delete="DELETE FROM `czhao10`.`Cafe_Staff` WHERE `ID` = '$ID'";
		if(mysql_query($delete)){
			header('Location:./staff_manage_page.php');
		}else{
			header("Refresh:3;url=staff_manage_page.php");
		die("Error:Delete Failed! This page will jump automatically after 3 seconds.");
		}
 } 
 mysql_close($con);
?>