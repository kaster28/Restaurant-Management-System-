<?php 
include("db_conn.php");
include("session.php");
//search for user
if($_SESSION['user']==""){
	header("Refresh:3;url=main_page.php");
		die("Error:Please Log In! This page will jump automatically after 3 seconds.");
}

$customer=$_SESSION['user'];
$transaction_id=uniqid();
setcookie("transaction_id",$transaction_id,time()+3600);
$item_list=$_COOKIE["item_list"];
$store=$_SESSION['store'];
$total_price=$_COOKIE["total_price"];
$time=date("Y-m-d H:i:s"); 
$comment=$_POST["comment"];

if($_SESSION['access']==4){
	$query="SELECT * FROM `czhao10`.`Cafe_User_Account` WHERE `Name` = '$Session_user'";
}else{
	$query="SELECT * FROM `czhao10`.`Cafe_Staff` WHERE `Name` = '$Session_user'";
}
$result=mysql_query($query);
$row=mysql_fetch_array($result,MYSQL_ASSOC);
//judge if can afford
if($total_price>$row['Balance']){
	setcookie("item_list", "", time()-3600);//delete cookie when payment failed
	setcookie("total_price", "", time()-3600);
	header("Refresh:3;url=main_page.php");
		die("Error:You don't have enough money in your account,please top up! This page will jump automatically after 3 seconds.");
}

if($total_price==0){
	header("Refresh:3;url=main_page.php");
		die("Error:Shopping Cart is empty! This page will jump automatically after 3 seconds.");
}
$payment="INSERT INTO `Cafe_Orderedfood`(`Customer`, `Transaction_ID`, `Item_List`, `Store`, `Total_Price`, `Ordered_Time`, `Comment`) VALUES ('$customer','$transaction_id','$item_list','$store','$total_price','$time','$comment')";
if(mysql_query($payment)){
	//echo "success";
	$balance=$row['Balance']-$total_price;

	if($_SESSION['access']==4){
	$pay="UPDATE `Cafe_User_Account` SET `Balance`='$balance' WHERE `Name`='$Session_user'";
}else{
	$pay="UPDATE `Cafe_Staff` SET `Balance`='$balance' WHERE `Name`='$Session_user'";
}
mysql_query($pay);

	setcookie("item_list", "", time()-3600);
	setcookie("total_price", "", time()-3600);
	header('Location:./payment_success.php');
}
?>