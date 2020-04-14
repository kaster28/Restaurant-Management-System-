<?php 
include("db_conn.php");
include("session.php");

$product=$_POST['foodlist'];
foreach ($product as $ID) {
 	//echo $ID;
 	$query="SELECT * FROM `czhao10`.`Cafe_Menu_Product` WHERE `ID` = '$ID' AND `Location`='$Session_location'";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	//echo $num;
	if($num==0){
		echo $num;
		$insert="INSERT INTO `czhao10`.`Cafe_Menu_Product` (`ID`, `Location`) VALUES ('$ID', '$Session_location');";
		if(mysql_query($insert)){
			header('Location:./menu_manage_page.php');
		}else{
			header("Refresh:3;url=menu_manage_page.php");
		die("Error:Insert Failed! This page will jump automatically after 3 seconds.");
		}
	}else{
		header("Refresh:3;url=menu_manage_page.php");
		die("Error:Product already exists! This page will jump automatically after 3 seconds.");
	}
	
	//INSERT INTO `czhao10`.`Cafe_Menu_Product` (`ID`, `Location`) VALUES ('10004', 'Ref Cafe');
 } 
 mysql_close($con);
?>