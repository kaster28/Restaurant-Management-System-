<!DOCTYPE html>
<html>
<head>
<?php 
include("db_conn.php");
include("session.php");
if(isset($_POST['submit'])){
$cafe=$_POST['cafe'];
$phone=$_POST['phone'];
$date=$_POST['date'];
$update="UPDATE `Cafe_Information` SET `Menu_Date`='$date',`Telephone`='$phone' WHERE `Location`='$cafe'";
mysql_query($update);
echo "<script>alert('Changed successfully!');</script>";
}

?>
</head>
<body>
<center>
<h2>Update Cafe Information</h2>
<form action="" method="post">
<p>Cafe:<select name="cafe">
<option value="Ref Cafe">Ref Cafe</option>
<option value="Lazenby Cafe">Lazenby Cafe</option>
<option value="Trade Table Cafe">Trade Table Cafe</option>
</select></p>
<p>Menu Date:<input type="text" name="date" required></p>
<p>Telephone:<input type="text" name="phone" required></p>
<input type="submit" name="submit" value="submit">
</form>
</center>
</body>
</html>