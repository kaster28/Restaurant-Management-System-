<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta  charset=utf-8" />
<title>Y.E.O.M Home Page</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
<?php  
include("db_conn.php");
include("session.php");
?>
</head>

<body>
<div id="top_part">
<div id="top_bar">
	<div id="logo"><a href="main_page.php">Y.E.O.M</a></div>

<div id="register">
	<?php if($_SESSION['user']==""){?><div><a href="register.php">Go to regist your account!</a></div>
	<?php }else{?>
		<div><a href="administration.php">Management Page</a></div>
	<?php }?>

</div>

</div>
<div id="welcome">
	<span>Welcome to use V.E.O.M! You can find your favourite cafe shops here and order food and drinks online!</span>
</div>
<?php if($_SESSION['user']==""){?><div id="sign">
<div id="sign_top">Sign In</div>
<form action="login_process.php" method="post">

<p><input type="text" name="login_user_name" placeholder="Username" class="text"></p>

<p><input type="password" name="login_user_password" placeholder="Password" class="text"></p>
<a href="register.php">Don't have account? Create now!</a>
</br>
<p><input type="submit" name="index_submit_botton" value="Submit"></p>
</form>
</div><?php }else if($_SESSION['access']==4){?>
<div id="sign">
<div id="sign_top">Login Successfully</div>
<h2>Welcome! <?php echo $Session_user;?></h2>
<p><b>You can start your order now!</b></p>
<p><b>Our team will provide best service!</b></p>
<p><a href="logout.php">Click here to logout</a></p>
</div>
<?php }else{?><div id="sign">
<div id="sign_top">Login Successfully</div>
<h2>Welcome! <?php echo $Session_user;?></h2>
<p><b>This is staff account</b></p>
<p><b>The authority has been granted</b></p>
<p><a href="logout.php">Click here to logout</a></p>
</div><?php }?>
</div>

<!--top part-->

<div id="bottom_part">
	<div id="description">
<span>Popular cafe near Utas! You can visit the Menus of which below!</span>
</div>
<center>
<table>
<tr>
<td class="cafe"><a href="ref menu.php"><img src="img/ref cafe.jpg"></a></td>
<td class="cafe"><a href="lazenby menu.php"><img src="img/lazenby cafe.jpg"></a></td>
<td class="cafe"><a href="trade-table menu.php"><img src="img/trade-table cafe.jpg"></a></td>
</tr>
<tr>
<td class="cafe"><a href="ref menu.php">Ref Cafe</a></td>
<td class="cafe"><a href="lazenby menu.php">Lazenby Cafe</a></td>
<td class="cafe"><a href="trade-table menu.php">Trade Table Cafe</a></td>
</tr>

</table>
</center>
</div>
<div id="bottom"><center>*Copyright belongs to Mark 24/3/2018</center></div>
</body>
</html>