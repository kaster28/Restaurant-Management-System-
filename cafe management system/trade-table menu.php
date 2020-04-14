<!DOCTYPE html>
<html>
<?php 
include("db_conn.php");
include("session.php");
$_SESSION['store']="Trade Table Cafe";//important to cart!!!!!!!!
$sql="SELECT * FROM `Cafe_Information` WHERE `Location`='Trade Table Cafe'";
$res=mysql_query($sql);
$info=mysql_fetch_array($res);
?>
<head>
<title>Y.E.O.M Trade Table Cafe Menu</title>
<link rel="stylesheet" type="text/css" href="css/trade_table cafe.css">

<script src="js/Shopping_cart.js"></script>

</head>

<body>
<div id="top_part">
<div id="title"><span>Trade Table Cafe</span></div>
</div>

<div id="nav_bar">
<ul>
<li><a href="main_page.php">Home</a></li>
<?php if($Session_user==""){?>
<li><a href="register.php">Register</a></li>
<?php }else{?>
<li><a href="administration.php">Management</a></li>
<?php }?>
<li><a href="#bottom_part">Menu</a></li>
</ul>
</div>

<div id="middle_part">
	<div id="trade_table_introduce">
    <h1>Trade Table Cafe</h1>
    <p>Located on the lower ground floor of the Centenary Building, the Trade Table offers sushi, salads, soup, sandwiches, cakes and slices, confectionery and a range of hot and cold drinks.</p>
      <p class="highlight"><?php echo $info['Open_Hour'];?></p>
    <p class="highlight">Tel:<?php echo $info['Telephone'];?></p>
	</div>

	<div id="google">
		<div id="map_d">Our Location</div>
		<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2007.7100146560135!2d147.32556039408493!3d-42.903872343318376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7efda62d409d7046!2sTrade+Table+Cafe!5e0!3m2!1sen!2sau!4v1521895404609" allowfullscreen></iframe></div>
</div>

<div id="bottom_part">
<div id="bottom_head">
<img src="img/menu.png">
</br>Updated Date: <?php echo $info['Menu_Date'];?>
<p>Here is our Menu:</p>
</div>
<div id="menu">
<table>
<?php //update menu
	$num=0;
$query="SELECT * from Cafe_Menu_Product INNER JOIN Cafe_Foodlist ON `Cafe_Menu_Product`.`ID`=`Cafe_Foodlist`.`ID` AND `Cafe_Menu_Product`.`Location`='Trade Table Cafe'";
	$result=mysql_query($query);
	//$num=mysql_num_rows($result1)
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		$num++;//the number id of product
	?>
	<tr>
	<td class="menu"><?php echo "<img src='img/".$row['Image File']."'>";?></td>
	<td class="menu"><div><span class="food_name" id="<?php echo 'name'.$num;?>"><?php echo $row['Name'];?></span></br><span><?php echo $row['Description'];?></span></div><div class="highlight"><span id="<?php echo 'price'.$num;?>"><?php echo $row['Price'];?></span>$</div></td>
	<td>
	<span class="highlight">Number</span>
	<form>
	<input type="number" id="<?php echo 'number'.$num;?>"  min="0" value="0" onchange="update_item(<?php echo $num;?>)" required step="1"/>
	</form>
	</td>
	</tr>

 <?php
}
?>
<tr><td></td><td></td><td><span class="highlight" id="total_price">Total:0$</span></td><td><a href="cart.php"><button id="Cart_button" onclick="update_item(<?php echo $num;?>)">Add To Cart</button></a></td></tr>
</table>
</div>
</div>
<div id="bottom"><center>*Copyright belongs to Mark 24/3/2018</center></div>
</body>
</html>
