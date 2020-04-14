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
	if($_SESSION['access']!=2){
		//header('Location:./main_page.php');
		header("Refresh:3;url=main_page.php");
		die("Error:Access Blocked! This page will jump automatically after 3 seconds.");
	}
}
	if(isset($_POST['submit_time'])){
		$time=$_POST['open_time'];
		$query="UPDATE `Cafe_Information` SET `Open_Hour`='$time' WHERE `Location`='$Session_location'";
		if(mysql_query($query)){
			echo "<script>alert('Changed successfully!');</script>";
		}
	}
?>

	<center>
	<h1>Manage Menu of <?php echo $Session_location;?></h1>
	<form action="" method="post">
	<span>Open Time</span>
	<input type="text" name="open_time" required>
	<input type="submit" name="submit_time" value="submit">
	</form>
	<!--current item-->
	<h2>Current Menu</h2>
	<fieldset>
	<form action="menu_delete_process.php" method="post">
	<table>
	<tr><th></th><th></th><th>ID</th><th>Name</th><th>Price</th><th>Description</th><th>Type</th></tr>
	<?php Show_Currentmenu();?>
	</table>
	</fieldset>
	<input type="submit" value="Delete"><input type="button" name="all" id="all" value="Check All" onclick="checkall_menu()"><input type="reset" value="Reset">
	</form>
	<!--Display Foodlist-->
	<h2>FoodList</h2>
	<fieldset>
	<form action="menu_insert_process.php" method="post">
	<table>
	<?php Show_Foodlist();?>
	</table>
	</fieldset>
	<input type="submit" value="Insert"><input type="button" name="all" id="all" value="Check All" onclick="checkall_foodlist()"><input type="reset" value="Reset">
	</form>
	</center>
<?php
function Show_Foodlist(){
    $query="select * from czhao10.Cafe_Foodlist";
	$result=mysql_query($query);
	echo "<tr><th></th><th></th><th>ID</th><th>Name</th><th>Price</th><th>Description</th><th>Type</th></tr>";

    while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		echo "<tr>";?>
		<td><input type="checkbox" name="foodlist[]" id="foodlist" value="<?php echo $row['ID'];//正确PHP与HTML复合表达 ?>"><td>
		<?php
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".$row['Price']."</td>";
		echo "<td>".$row['Description']."</td>";
		echo "<td>".$row['Type']."</td>";
		echo "</tr>";
	}
}

function Show_Currentmenu(){
	global $Session_location;
	$query1="SELECT * FROM `czhao10`.`Cafe_Menu_Product` WHERE `Location` = '$Session_location' ORDER BY `ID`";
	$result1=mysql_query($query1);
	//$num=mysql_num_rows($result1)
	while($row1=mysql_fetch_array($result1,MYSQL_ASSOC)){
			//echo $row1['ID'];
		?>
	<tr>
	<td><input type="checkbox" name="menu[]" id="menu" value="<?php echo $row1['ID'];?>"><td>
<?php
	foreach ($row1 as $key=>$value) {
		$query2="SELECT * FROM `czhao10`.`Cafe_Foodlist` WHERE `ID` = '$value'";
		$result2=mysql_query($query2);
		$row2=mysql_fetch_array($result2,MYSQL_ASSOC);
		echo "<td>".$row2['ID']."</td>";
		echo "<td>".$row2['Name']."</td>";
		echo "<td>".$row2['Price']."</td>";
		echo "<td>".$row2['Description']."</td>";
		echo "<td>".$row2['Type']."</td>";
		echo "</tr>";
	}}
		
	
}


?>
</body>
</html>
