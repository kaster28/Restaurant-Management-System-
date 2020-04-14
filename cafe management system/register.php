<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Y.E.O.M Register</title>
<link rel="stylesheet" type="text/css" href="css/register.css">
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
<script src="js/reg.js"></script>
</head>

<body>
<div id="top_user">
<h1><strong>Register</strong></h1>
</div>
<br />
<div id="top-line">
&nbsp;<strong><a href="main_page.php">Main Page</a></strong>&nbsp;&nbsp;>&nbsp;&nbsp;<strong>Register</strong></div>
<br />
<div style="border: 1">
	<center>
	<fieldset>
	<form id="signupForm" action="register_process.php" method="post">
	<table>
	<tr><td>User Name:</td><td><input type="text" name="username"></input></td></tr>
    <tr><td>Student/Staff ID:</td><td><input type="text" name="id"></input></td></tr>
	<tr><td>Email:</td><td><input type="text" name="email"></input></td></tr>
	<tr><td>Password:</td><td><input type="password" id="password" name="password" onchange="password_test()"></input><label id="error"></label></td></tr>
	<tr><td>Confirm Password:</td><td><input type="password" name="confirm_password"></input></td></tr>
	<tr><td>Phone Number</td><td><input type="text" name="Phone_Num"></input></td></tr>
	<tr><td>Credit Card Number</td><td><input type="text" name="Card_Num"></input></td></tr>
	<tr><td></td><td><input type="submit" id="register_submit_button" name="submit_button" value="submit"></td></tr>
</table>
</form>
</fieldset>
</center>
</div>
</br>
<div id="attention"><span>*Your password needs 6-12 characters in length,Containsat least 1 lower case letter, </br>1 uppercase letter,1 number and one of the following specialcharacters ~ ! # $</span></div>
<div id="bottom"><center>*Copyright belongs to Mark 24/3/2018</center></div>
</body>
</html>
