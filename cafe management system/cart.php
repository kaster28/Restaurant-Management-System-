<!DOCTYPE html>
<html>
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
<head>
<title>Y.E.O.M Shopping Cart</title>
<link rel="stylesheet" type="text/css" href="css/cart.css">
<style type="text/css">
#top_part{
	margin-bottom: 10px;
}
table{
	border: 2px solid black;
}
th{
	border-bottom: thin solid black;
}
td{
	padding: 5px 10px;
	text-align: center;
}
</style>
<script src="js/Shopping_cart.js"></script>

</head>

<body>
<div id="top_part">
<div id="title"><span>Shopping Cart</span></div>
</div>

<div id="middle_part">
<center>
	<h2>Shopping Cart</h2>
<table>
	<tr><th>ID</th><th>Name</th><th>Price</th><th>Number</th><th>Subtotal</th><th></th></tr>
	<tbody id="view_cart">
	</tbody>
</table>
<p><span class="highlight">Your Balance:<?php echo $row['Balance'];?>$</span><span><---></span><span id="total_price" class="highlight">Total:0$</span></p>
<div>
	<form action="payment_process.php" method="post">
	Comment: <input type="text" name="comment" placeholder="add your comment">
	<input type="submit" value="Pay Now" onclick="set_cookie()">
</form>
<p><a href="main_page.php">Back To Main</a></p>
</div>
<script>view_cart();</script>
</center>
</div>
<div id="bottom"><center>*Copyright belongs to Mark 24/3/2018</center></div>
</body>
</html>