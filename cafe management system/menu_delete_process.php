<?php 
include("db_conn.php");
include("session.php");

$product=$_POST['menu'];
foreach ($product as $ID) {
 	//echo $ID;
		$delete="DELETE FROM `czhao10`.`Cafe_Menu_Product` WHERE `Cafe_Menu_Product`.`ID` = '$ID' AND `Location`='$Session_location'";
		if(mysql_query($delete)){
			header('Location:./menu_manage_page.php');
		}else{
			header("Refresh:3;url=menu_manage_page.php");
		die("Error:Delete Failed! This page will jump automatically after 3 seconds.");
		}
	
	//INSERT INTO `czhao10`.`Cafe_Menu_Product` (`ID`, `Location`) VALUES ('10004', 'Ref Cafe');
 } 
 mysql_close($con);
?>