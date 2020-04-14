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
if($_SESSION['access']!=1){
		header("Refresh:3;url=main_page.php");
		die("Error:Access Blocked! This page will jump automatically after 3 seconds.");
}
?>

<center>
	<h1>Insert Or Delete From Foodlist</h1>
	<!--current item-->
	<h2>Current Foodlist</h2>
	<fieldset>
	<form action="foodlist_delete_process.php" method="post">
	<table>
	<tr><th></th><th></th><th>ID</th><th>Name</th><th>Price</th><th>&nbspImage File</th><th>Description</th><th>Type</th></tr>
	<?php Show_Currentfoodlist();?>
	</table>
	</br>
	<input type="submit" value="Delete"><input type="button" name="all" id="all" value="Check All" onclick="checkall_foodlist()"><input type="reset" value="Reset">
	</form>
	</fieldset>
	<!--Display Foodlist-->
	<h2>Insert New Item</h2>
	<fieldset>
	<form action="foodlist_insert_process.php" method="post">
	<table>
	<tr><td>Name:</td><td><input type="text" name="Name"></td></tr>
	<tr><td>Price:</td><td><input type="text" name="Price"></td></tr>
	<tr><td>Image File:</td><td><input type="text" name="Image"></td></tr>
	<tr><td>Description:</td><td><input type="text" name="Description"></td></tr>
	<tr><td>Type:</td><td><input type="text" name="Type"></td></tr>
	</table>
	</br>
	<input type="submit" value="Insert">--<input type="reset" value="Reset">
	</form>
	</fieldset>

	<h2>Update Foodlist Item</h2>
	<fieldset>
	<form action="foodlist_update_process.php" method="post">
	<table>
	<tr><td style="color: red">Updated ID is:</td><td><input type="text" name="ID" placeholder="ID of updated product"></td></tr>
	<tr><td>Name:</td><td><input type="text" name="Name"></td></tr>
	<tr><td>Price:</td><td><input type="text" name="Price"></td></tr>
	<tr><td>Image File:</td><td><input type="text" name="Image"></td></tr>
	<tr><td>Description:</td><td><input type="text" name="Description"></td></tr>
	<tr><td>Type:</td><td><input type="text" name="Type"></td></tr>
	</table>
	</br>
	<input type="submit" value="Update">--<input type="reset" value="Reset">
	</form>
	</fieldset>
	</center>

	<?php
function Show_Currentfoodlist(){
    $query="select * from czhao10.Cafe_Foodlist";
	$result=mysql_query($query);	

    while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		echo "<tr>";?>
		<td><input type="checkbox" name="foodlist[]" id="foodlist" value="<?php echo $row['ID'];//正确PHP与HTML复合表达 ?>"><td>
		<?php
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".$row['Price']."</td>";
		echo "<td>".$row['Image File']."</td>";
		echo "<td>".$row['Description']."</td>";
		echo "<td>".$row['Type']."</td>";
		echo "</tr>";
	}
}?>
</body>
</html>