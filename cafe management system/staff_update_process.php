<?php
include('db_conn.php');
$id=$_POST['ID'];
$name=$_POST['Name'];
$password=$_POST['Password'];
$encrypted_password=md5($password);
$location=$_POST['Location'];
$access=$_POST['Access'];

$search1="SELECT * FROM `Cafe_Staff` WHERE `Location`='$location' AND `Access`='2'";
$result1=mysql_query($search1);
$manager_num=mysql_num_rows($result1);//check manager number in same place
$row=mysql_fetch_array($result1);

$search2="SELECT * FROM `Cafe_Staff` WHERE `ID`='$id'";
$result2=mysql_query($search2);
$sameid_num=mysql_num_rows($result2);//check if there is same id

if($sameid_num==0){
	header("Refresh:3;url=staff_manage_page.php");
	die("Error:Insert Failed:Invaild ID! This page will jump automatically after 3 seconds.");
}

if($manager_num==1){
	if(($row['ID']!=$id)&&($row['Location']==$location)&&($access==2)){
		header("Refresh:3;url=staff_manage_page.php");
	die("Error:Insert Failed:Only one manager can be set! This page will jump automatically after 3 seconds.");
	}
	
}

$update="UPDATE `Cafe_Staff` SET `Name`='$name',`Password`='$encrypted_password',`Location`='$location',`Access`='$access' WHERE `ID` = $id";
if(mysql_query($update)){
	header('Location:./staff_manage_page.php');
}else{
			header("Refresh:3;url=staff_manage_page.php");
		die("Error:Update Failed! This page will jump automatically after 3 seconds.");
		}


?>