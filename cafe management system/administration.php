<!DOCTYPE html>
<?php 
include("session.php");
?>
<html>
<head>
<title>Y.E.O.M Administration</title>
<link rel="stylesheet" type="text/css" href="css/Manage Page.css">
<link rel="stylesheet" type="text/css" href="css/administration.css">
</head>

<body>
<div class="top">
  <h1>&nbsp;</h1>
  <h1> <strong><font size="7">Administration</font></strong></h1>
</div>
<br />
<div id="left_bar">
<table>
<tr><td><a href="top_up.php" target="iFrame1">Top Up</a></td></tr>
<tr><td><a href="customer_item.php" target="iFrame1">Current Orders</a></td></tr>
<?php if($_SESSION['access']==1){?>
<tr><td><a href="foodlist_manage_page.php" target="iFrame1">Manage Foodlist</a></td></tr>
<tr><td><a href="staff_manage_page.php" target="iFrame1">Manage Staff</a></td></tr>
<tr><td><a href="menu_date.php" target="iFrame1">Manage Cafe Information</a></td></tr>
<?php } ?>

<?php if($_SESSION['access']==2){?>
<tr><td><a href="menu_manage_page.php" target="iFrame1">Manage Menu</a></td></tr>
<?php } ?>

<?php if($_SESSION['access']==2||$_SESSION['access']==3){?>
<tr><td><a href="ordered_list.php" target="iFrame1">Process Orderlist</a></td></tr>
<?php } ?>

<?php if($_SESSION['access']==4){?>
<tr><td><a href="user_account.php" target="iFrame1">Account Details</a></td></tr>
<?php } ?>
<tr><td><a href="main_page.php">Back to main page</a></td></tr>
</table>
</div>
<div id="iFrame1">
	<iframe name= "iFrame1" width=1000 height=615 src= "top_up.php" scrolling= "auto" frameborder= "0"> </iframe>
	 </div>
</br>
<!--<div id="bottom"><center>*Copyright belongs to Mark 24/3/2018</center></div>-->
</body>
</html>
