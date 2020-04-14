<!DOCTYPE html>
<html>
<?php 
include("db_conn.php");
include("session.php");
$transaction_id=$_COOKIE["transaction_id"];
$query="SELECT * FROM `czhao10`.`Cafe_Orderedfood` WHERE `Transaction_ID` = '$transaction_id'";
$result=mysql_query($query);
$row=mysql_fetch_array($result,MYSQL_ASSOC);
?>
<head>
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
	<h2>Order Successfully</h2>
	<table>
	<tr><th>Transaction ID</th><th>Store</th><th>Ordered Item</th><th>Total Price</th><th>Ordered Time</th><th>Comment</th><th>State</th></tr>
	<tr><td><?php echo $row['Transaction_ID'];?></td><td><?php echo $row['Store'];?></td><td><?php echo $row['Item_List'];?></td><td><?php echo $row['Total_Price'];?><td><?php echo $row['Ordered_Time'];?></td><td><?php echo $row['Comment'];?></td><td>Paid</td></tr>
	</table>
	<p><a href="main_page.php">Back To Main</a></p>
	</center>
</div>
<div id="bottom"><center>*Copyright belongs to Mark 24/3/2018</center></div>
</body>
</html>