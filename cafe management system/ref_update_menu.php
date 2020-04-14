<table>
<?php
include("db_conn.php");
include("session.php");
$num=0;
$query="SELECT * from Cafe_Menu_Product INNER JOIN Cafe_Foodlist ON `Cafe_Menu_Product`.`ID`=`Cafe_Foodlist`.`ID` AND `Cafe_Menu_Product`.`Location`='Ref Cafe'";
	$result=mysql_query($query);
	//$num=mysql_num_rows($result1)
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		$num++;
	?>
	<tr>
	<td class="menu"><?php echo "<img src='img/".$row['Image File']."'>";?></td>
	<td class="menu"><div><span class="food_name"><?php echo $row['Name'];?></span></br><span><?php echo $row['Description'];?></span></div><div class="highlight"><?php echo $row['Price'];?>$</div></td>
	<td>
	<span class="highlight">order now</span>
	<form>
	<input type="button" name="jian" id="operator" onclick="javascript:qtyUpdate1('down')" value="-">
	<input type="text"  name="qty" id="qty<?php echo $num;?>" value="0" class="number">
	<input type="button" name="jia" id="operator" onclick="javascript:qtyUpdate1('up')" value="+">
	</form>
	</td>
	</tr>
	?>
	<!--<tr>
	<td class="menu"><img src="img/<?php echo $row2['Image File'];?>"></td>
	<td class="menu"><div><span class="food_name"><?php echo $row2['Name'];?></span></br><span><?php echo $row2['Description'];?></span></div><div class="highlight"><?php echo $row2['Price'];?>$</div></td>
	<td>
	<span class="highlight">order now</span>
	<form>
	<input type="button" name="jian" id="operator" onclick="javascript:qtyUpdate1('down')" value="-">
	<input type="text"  name="qty" id="qty<?php echo $num;?>" value="0" class="number">
	<input type="button" name="jia" id="operator" onclick="javascript:qtyUpdate1('up')" value="+">
	</form>
	</td>
	</tr>-->
	<?php
}

?>
</table>