<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/menu_manage.css" />
<script src="./js/checkall_menu.js"></script>
</head>
<body>
<?php  
include("db_conn.php");
include("session.php");
$location=$Session_location;

if(isset($_POST['submit'])){
	$items=$_POST['staff'];
	foreach ($items as $ID) {
 	//echo $ID;
		$delete="DELETE FROM `czhao10`.`Cafe_Orderedfood` WHERE `ID` = '$ID'";
		if(mysql_query($delete)){
			header('Location:./ordered_list.php');
			mysql_close();
		}else{
			header("Refresh:3;url=ordered_list.php");
		die("Error:Delete Failed! This page will jump automatically after 3 seconds.");
		}
 } 
}
?>

<center>
	<h2>Ordered List</h2>
	<form action="" method="post">
	<table border="1" cellspacing="0">
	<tr><th></th><th></th><th>Transaction ID</th><th>Customer</th><th>Items</th><th>Ordered Time</th><th>Comment</th><th>Total Price</th></tr>
	<?php Show_Orders();?>
	</table>
	</br>
	<input type="submit" value="Process" name="submit"><input type="button" name="all" id="all" value="Check All" onclick="checkall_staff()"><input type="reset" value="Reset">
	</form>
	</center>

	<?php
function Show_Orders(){
	global $location;
    $query="SELECT * FROM `Cafe_Orderedfood` WHERE `Store`='$location'";
	$result=mysql_query($query);	

    while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
    	$item_array=explode('/',$row['Item_List']);
		echo "<tr>";?>
		<td><input type="checkbox" name="staff[]" id="staff" value="<?php echo $row['ID'];?>"><td>
		<?php
		echo "<td>".$row['Transaction_ID']."</td>";
		echo "<td>".$row['Customer']."</td>";
		echo "<td></br>";
		foreach ($item_array as $key => $item) {
		echo $item."</br>";
		}
		echo "</td>";
		echo "<td>".$row['Ordered_Time']."</td>";
		echo "<td>".$row['Comment']."</td>";
		echo "<td>".$row['Total_Price']."</td>";
		echo "</tr>";
	}
}?>
</body>
</html>