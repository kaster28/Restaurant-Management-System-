<?php
include("session.php");
include("db_conn.php");

$username=$_POST['login_user_name'];
$password=$_POST['login_user_password'];
$c_query="SELECT * FROM `czhao10`.`Cafe_User_Account` WHERE Name ='$username'";
$result=mysql_query($c_query);
$row=mysql_fetch_array($result,MYSQL_ASSOC);

if($row['Name']!=$username||$username==""){
	check_staff();
}else {if ($row['Password']==md5($password)){
	$Session_user=$username;
	$_SESSION['user']=$Session_user;
	$_SESSION['access']=4;
	header('Location:./main_page.php');
}else{
	header("Refresh:3;url=main_page.php");
		die("Error:Invalid Password! This page will jump automatically after 3 seconds.");
}
}

function check_staff(){
	global $username,$password;
	$s_query="SELECT * FROM `czhao10`.`Cafe_Staff` WHERE Name ='$username'";
	$result=mysql_query($s_query);
$row=mysql_fetch_array($result,MYSQL_ASSOC);

if($row['Name']!=$username||$username==""){
	header("Refresh:3;url=main_page.php");
		die("Error:Invalid Username! This page will jump automatically after 3 seconds.");
}else {if ($row['Password']==md5($password)){
	$Session_user=$username;
	$_SESSION['user']=$Session_user;
	$_SESSION['access']=$row['Access'];
	$_SESSION['location']=$row['Location'];
	header('Location:./main_page.php');
}else{
	header("Refresh:3;url=main_page.php");
		die("Error:Invalid Password! This page will jump automatically after 3 seconds.");
}
}
}
mysql_close($con);
?>