<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />
<script type="text/javascript" src="chrome.js"></script>
</head>
<body bgproperties=fixed background="images/bg.jpg" style="background-repeat:no-repeat;background-scroll:off;font-family: arial;">
<a href="main.php"><img src="images/logo.png" width="260" height="130" align="left" class="logo" style="margin-top: -40px;margin-left:20px"/></a>
<div id="reg"><?php
require 'user_link.php';
?>
</div><br /><br /><br /><br /><br /><br />
<div id="bg1">
<br />
<!---------MENU BAR----------------->
<?php
require 'menubar.php';
?>
<br /><br /><br /><br /><br /><center><fieldset style="border-bottom: hidden;border-right: hidden;border-left: hidden;width:50%;border-color:black;border-width:3px;"><legend><h2>North Indian Menu</h2></legend></fieldset></center>
<center><table id="tab1" cellspacing="20px" cellpadding="20px">
<tr>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Action</th>
</tr>
<?php
require 'data_link.php';
$qry="select item_code,item_name,item_price from items where item_code like 'N%'";
$res=mysql_query($qry) or die(mysql_error());
while($row=mysql_fetch_row($res))
 {
   
 echo "<tr><td>$row[1]</td><td>Rs.$row[2]</td>";
 if(isset($_SESSION['Username']))
 {
    echo "<form method='post'>";
    echo "<td><input type='number' name='quantity' min='1' max='50' value='1'/></td>";
 echo "<td><button type='submit' name='add' value='$row[0]'>Add to Cart</button></td>";
 echo "</form>";
 }
 else
 echo "<td>Please Log In to add to cart</td></tr>";
 }
 if(isset($_SESSION['Username'])){
 $cart_user=$_SESSION['Username'];
 $qry2="select user_id from user where user_name='$cart_user'";
$res2=mysql_query($qry2) or die(mysql_error());
$row2=mysql_fetch_row($res2);
$_SESSION['userid']=$row2[0];
 if(isset($_POST['add']))
 {
    $price=$_POST['add'];
    $qry="select item_price from items where item_code='$price'";
    $res=mysql_query($qry) or die(mysql_error());
    $row=mysql_fetch_row($res);
    $quantity=$_POST['quantity'];
    $cost=$row[0]*$quantity;                        
    $sql="insert into cart (item_code,user_id,price) values ('$price',$row2[0],$cost)";
    mysql_query($sql) or die(mysql_error);    
    echo "<script>alert('Go to Cart to continue.')</script>";  
 }}
?>
</table>
</center>
</div>
<?php require 'footer.php'; ?>
</body>
</html>