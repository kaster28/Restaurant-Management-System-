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
	<h1>Staff Management</h1>
	<p style="color: red">*Access 1:Director 2:Manager 3:Staff</p>
	<!--current staff-->
	<h2>Current Staff List</h2>
	<fieldset>
	<form action="staff_delete_process.php" method="post">
	<table>
	<tr><th></th><th></th><th>ID</th><th>Name</th><th>Location</th><th>Access</th></tr>
	<?php Show_Currentstaff();?>
	</table>
	</br>
	<input type="submit" value="Delete"><input type="button" name="all" id="all" value="Check All" onclick="checkall_staff()"><input type="reset" value="Reset">
	</form>
	</fieldset>
	<!--Display Staff-->
	<h2>Add new staff</h2>
	<fieldset>
	<form action="staff_insert_process.php" method="post">
	<table>
	<tr><td>ID:</td><td><input type="text" name="ID"></td></tr>
	<tr><td>Name:</td><td><input type="text" name="Name"></td></tr>
	<tr><td>Password:</td><td><input type="password" name="Password"></td></tr>
	<tr><td>Location:</td><td><input list="Cafe" name="Location">
	<datalist id="Cafe">
	  <option value="Ref Cafe">
	  <option value="Lazenby Cafe">
	  <option value="Trade Table Cafe">
	</datalist>
	</td></tr>
	<tr><td>Access:</td><td><input list="Access" name="Access">
	<datalist id="Access">
	  <option value="1">
	  <option value="2">
	  <option value="3">
	</datalist></td></tr>
	</table>
	</br>
	<input type="submit" value="Insert">--<input type="reset" value="Reset">
	</form>
	</fieldset>

	<h2>Update Staff Detail</h2>
	<fieldset>
	<form action="staff_update_process.php" method="post">
	<table>
	<tr><td style="color: red">Updated ID is:</td><td><input type="text" name="ID" placeholder="ID of updated staff"></td></tr>
	<tr><td>Name:</td><td><input type="text" name="Name"></td></tr>
	<tr><td>Password:</td><td><input type="password" name="Password"></td></tr>
	<tr><td>Location:</td><td><input list="Cafe" name="Location">
	<datalist id="Cafe">
	  <option value="Ref Cafe">
	  <option value="Lazenby Cafe">
	  <option value="Trade Table Cafe">
	</datalist></td></tr>
	<tr><td>Access:</td><td><input list="Access" name="Access">
	<datalist id="Access">
	  <option value="1">
	  <option value="2">
	  <option value="3">
	</datalist></td></tr>
	</table>
	</br>
	<input type="submit" value="Update">--<input type="reset" value="Reset">
	</form>
	</fieldset>
	</center>

	<?php
function Show_Currentstaff(){
    $query="select * from czhao10.Cafe_Staff";
	$result=mysql_query($query);	

    while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		echo "<tr>";?>
		<td><input type="checkbox" name="staff[]" id="staff" value="<?php echo $row['ID'];//??PHP?HTML???? ?>"><td>
		<?php
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".$row['Location']."</td>";
		echo "<td>".$row['Access']."</td>";
		echo "</tr>";
	}
}?>
</body>
</html>