<?php 
include("db_conn.php");

$product=$_POST['foodlist'];
foreach ($product as $ID) {
 	//echo $ID;
		$delete="DELETE FROM `czhao10`.`Cafe_Foodlist` WHERE `ID` = '$ID'";
		if(mysql_query($delete)){
			header('Location:./foodlist_manage_page.php');
		}else{
			header("Refresh:3;url=foodlist_manage_page.php");
		die("Error:Delete Failed! This page will jump automatically after 3 seconds.");
		}
	
	//INSERT INTO `czhao10`.`Cafe_Menu_Product` (`ID`, `Location`) VALUES ('10004', 'Ref Cafe');
 } 
 mysql_close($con);
?>