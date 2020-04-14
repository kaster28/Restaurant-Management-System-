<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/top_up.css">
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
?>
</head>
<body>
<center>
<form action="./top_up_process.php" method="post">
<ul style="list-style: none;">
<h3><strong>Current Balance: <?php echo $row['Balance']?>$</strong></h3></br>
<li>Name on card</br><input type="text" name="Name_On_Card" required></li><img src="img/payment.png"></br>
<li>Credit card number</br><input type="text" name="Card_Number" required></li></br>
<li>Expiry date(MM/YY)</br><input type="text" name="Expiry_Date" required></li></br>
<li>Security code(CVV)</br><input type="text" name="Security_Code" required></li></br>
<li>Top up amount</br><input type="text" name="Add_Balance"></li></br>
<li><input type="submit" name="submit" value="TOP UP"></li>
</ul>
</form>

</center>
</body>
</html>