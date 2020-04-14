<?php 
include("db_conn.php");
include("session.php");
$username=$_POST['username'];
$id=$_POST['id'];
$email=$_POST['email'];
$password=$_POST['password'];
$c_password=$_POST['confirm_password'];
$phone=$_POST['Phone_Num'];
$card=$_POST['Card_Num'];
$username_query="SELECT * FROM `czhao10`.`Cafe_User_Account` WHERE Name='$username'";
$result=mysql_query($username_query);
if($row=mysql_num_rows($result)||$username==""){
	header("Refresh:3;url=register.php");
		die("Error:Username already exists or invaild! This page will jump automatically after 3 seconds.");
}else{if(($password==$c_password)&&($password!="")){//md5
	$password=md5($password);
	$insert_query="INSERT INTO `Cafe_User_Account`(`Name`, `Password`, `Student/Employee ID`, `Email`, `Phone`, `Card_Number`, `Balance`, `Access`) VALUES ('$username','$password','$id','$email','$phone','$card','0','4')";
	if(mysql_query($insert_query)){echo "string";}
	$_SESSION['user']=$username;
	$_SESSION['access']=4;
	header('Location:./main_page.php');
}else{
	header("Refresh:3;url=register.php");
		die("Error:The retype password is different from password or invaild! This page will jump automatically after 3 seconds.");
	//????
	//header('Location:./register.php?error=The retype password is different from password or invaild!');
}
}

mysql_close($con);
?>