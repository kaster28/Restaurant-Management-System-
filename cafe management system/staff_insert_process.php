<?php
include('db_conn.php');
$id=$_POST['ID'];
$name=$_POST['Name'];
$password=$_POST['Password'];
$encrypted_password=md5($password);
$location=$_POST['Location'];
$access=$_POST['Access'];
$search1="SELECT * FROM `Cafe_Staff` WHERE `Location`='$location'";
$result1=mysql_query($search1);
$cafestaff_num=mysql_num_rows($result1);//check total staff number in same place

$search2="SELECT * FROM `Cafe_Staff` WHERE `Location`='$location' AND `Access`='2'";
$result2=mysql_query($search2);
$manager_num=mysql_num_rows($result2);//check manager number in same place

$search3="SELECT * FROM `Cafe_Staff` WHERE `ID`='$id'";
$result3=mysql_query($search3);
$sameid_num=mysql_num_rows($result3);//check if there is same id

if($sameid_num>0){
	header("Refresh:3;url=staff_manage_page.php");
	die("Error:Insert Failed:ID already exists! This page will jump automatically after 3 seconds.");
}

if($cafestaff_num==2){
	header("Refresh:3;url=staff_manage_page.php");
	die("Error:Insert Failed:Maximum of Staff Number! This page will jump automatically after 3 seconds.");
}

if(($manager_num==1)&&($access=='2')){
	header("Refresh:3;url=staff_manage_page.php");
	die("Error:Insert Failed:Only one manager can be allocated! This page will jump automatically after 3 seconds.");
}

$insert="INSERT INTO `Cafe_Staff`(`ID`, `Name`, `Password`, `Location`, `Access`) VALUES ('$id','$name','$encrypted_password','$location','$access')";
if(mysql_query($insert)){
	header('Location:./staff_manage_page.php');
}else{
			header("Refresh:3;url=staff_manage_page.php");
		die("Error:Insert Failed! This page will jump automatically after 3 seconds.");
		}
mysql_close($con);
?>