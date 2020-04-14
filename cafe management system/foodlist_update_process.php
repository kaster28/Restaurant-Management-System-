<?php
include('db_conn.php');
$id=$_POST['ID'];
$name=$_POST['Name'];
$price=$_POST['Price'];
$image=$_POST['Image'];
$description=$_POST['Description'];
$type=$_POST['Type'];
$search="SELECT * FROM `Cafe_Foodlist` WHERE `ID` = $id";
$result=mysql_query($search);
if ($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
	$update="UPDATE `Cafe_Foodlist` SET `Name`='$name',`Price`='$price',`Image File`='$image',`Description`='$description',`Type`='$type' WHERE `ID` = $id";
if(mysql_query($update)){
	header('Location:./foodlist_manage_page.php');
}else{
			header("Refresh:3;url=foodlist_manage_page.php");
		die("Error:Update Failed! This page will jump automatically after 3 seconds.");
		}
}

mysql_close($con);
?>