<?php 
include("db_conn.php");
include("session.php");
if($_SESSION['access']==4){
	$query="SELECT * FROM `czhao10`.`Cafe_User_Account` WHERE `Name` = '$Session_user'";
}else{
	$query="SELECT * FROM `czhao10`.`Cafe_Staff` WHERE `Name` = '$Session_user'";
}
$result=mysql_query($query);
$row=mysql_fetch_array($result,MYSQL_ASSOC);

$card_number=$_POST['Card_Number'];
if($row['Card_Number']!=$card_number){
	header("Refresh:3;url=top_up.php");
	die("Error:Insert Failed:Invalid Card Number! This page will jump automatically after 3 seconds.");
}
$top_up_money=$_POST['Add_Balance'];
	$balance=$row['Balance']+$top_up_money;
	if($_SESSION['access']==4){
	$pay="UPDATE `Cafe_User_Account` SET `Balance`='$balance' WHERE `Name`='$Session_user'";
}else{
	$pay="UPDATE `Cafe_Staff` SET `Balance`='$balance' WHERE `Name`='$Session_user'";
}
if(mysql_query($pay)){
	echo "<script>alert('Top up successfully!');window.location.href='top_up.php'; </script>";
}
?>