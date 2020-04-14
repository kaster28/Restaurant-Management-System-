<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/register.css">
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
<script src="js/reg.js"></script>
<?php 
include("db_conn.php");
include("session.php");
$query="SELECT * FROM `czhao10`.`Cafe_User_Account` WHERE `Name` = '$Session_user'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);

if(isset($_POST['submit_button'])){
	$id=$_POST['id'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$c_password=$_POST['confirm_password'];
	$phone=$_POST['Phone_Num'];
	$card=$_POST['Card_Num'];
	if(($password==$c_password)&&($password!="")){//md5
	$password=md5($password);
	$update="UPDATE `Cafe_User_Account` SET `Password`='$password',`Student/Employee ID`='$id',`Email`='$email',`Phone`='$phone',`Card_Number`='$card' WHERE `Name`='$Session_user'";
	mysql_query($update);
	echo "<script>alert('Changed successfully!');window.location.href='user_account.php'; </script>";
}else{
	header("Refresh:3;url=user_account.php");
	die("Error:The retype password is different from password or invaild! This page will jump automatically after 3 seconds.");
}
}
?>
</head>
<body>
<center>
	<h2>Change Account Detail</h2>
<form id="signupForm" action="" method="post">
	<table>
    <tr><td>Student/Staff ID:</td><td><input type="text" name="id" value="<?php echo $row['Student/Employee ID']?>"></input></td></tr>
	<tr><td>Email:</td><td><input type="text" name="email" value="<?php echo $row['Email']?>"></input></td></tr>
	<tr><td>Password:</td><td><input type="password" id="password" name="password" onchange="password_test()"></input><label id="error"></label></td></tr>
	<tr><td>Confirm Password:</td><td><input type="password" name="confirm_password"></input></td></tr>
	<tr><td>Phone Number</td><td><input type="text" name="Phone_Num" value="<?php echo $row['Phone']?>"></input></td></tr>
	<tr><td>Credit Card Number</td><td><input type="text" name="Card_Num" value="<?php echo $row['Card_Number']?>"></input></td></tr>
	<tr><td></td><td><input type="submit" name="submit_button" value="submit"></td></tr>
</table>
</form>
</center>
</body>
</html>