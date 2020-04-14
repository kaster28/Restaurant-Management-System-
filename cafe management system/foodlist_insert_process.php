<?php 
include('db_conn.php');
$name=$_POST['Name'];
$price=$_POST['Price'];
$image=$_POST['Image'];
$description=$_POST['Description'];
$type=$_POST['Type'];

$insert="INSERT INTO `Cafe_Foodlist`(`Name`, `Price`, `Image File`, `Description`, `Type`) VALUES ('$name','$price','$image','$description','$type')";
if(mysql_query($insert)){
	header('Location:./foodlist_manage_page.php');
}else{
			header("Refresh:3;url=foodlist_manage_page.php");
		die("Error:Insert Failed! This page will jump automatically after 3 seconds.");
		}
mysql_close($con);
?>