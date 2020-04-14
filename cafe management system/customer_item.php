<!DOCTYPE html>
<html>
<head>
<?php 
include("db_conn.php");
include("session.php");	
?>
<link rel="stylesheet" type="text/css" href="./css/menu_manage.css" />
</head>
<body>
<center>
<h2>Current Ordered Item</h2>
<table border="1" cellspacing="0">
	<tr><th>Transaction ID</th><th>Customer</th><th>Items</th><th>Ordered Time</th><th>Comment</th><th>Total Price</th></tr>
<?php
$query="SELECT * FROM `Cafe_Orderedfood` WHERE `Customer`='$Session_user'";
$result=mysql_query($query);
    while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
    	$item_array=explode('/',$row['Item_List']);
		echo "<tr><td>".$row['Transaction_ID']."</td>";
		echo "<td>".$row['Customer']."</td>";
		echo "<td></br>";
		foreach ($item_array as $key => $item) {
		echo $item."</br>";
		}
		echo "</td>";
		echo "<td>".$row['Ordered_Time']."</td>";
		echo "<td>".$row['Comment']."</td>";
		echo "<td>".$row['Total_Price']."$</td>";
		echo "</tr>";
	}
	?>
	</table>
</center>
</body>
</html>