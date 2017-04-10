
<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />
<script type="text/javascript" src="chrome.js"></script>
</head>
<body>
<a href="main.php"><img src="images/logo.png" width="260" height="130" align="left" class="logo"/></a>
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
<br /><br /><br /><br /><br /><center><fieldset style="border-bottom: hidden;border-right: hidden;border-left: hidden;width:50%;border-color:black;border-width:3px;"><legend><h2>Cart</h2></legend></fieldset></center>
<?php
require 'data_link.php';
echo "<table cellpadding=20 cellspacing=0 align=center>";
    echo "<tr style=background-color:orange><th>Item Name</th><th>Item Price</th><th>Action</th></tr>";
$rec=$_SESSION['Username'];
$qur="select user_id from user where user_name='$rec'";
$rps=mysql_query($qur) or die(mysql_error());
$apr=mysql_fetch_row($rps);
$_SESSION['userid']=$apr[0];
$qry="select * from cart where user_id=$apr[0]";
$res=mysql_query($qry) or die(mysql_error());
$a=array();
while($row=mysql_fetch_row($res))
{
    $qry1="select item_name,item_price from items where item_code='$row[1]'";
    $res1=mysql_query($qry1) or die(mysql_error());
    while($row1=mysql_fetch_row($res1)){
    echo "<tr><td>$row1[0]</td>";
    $qry5="select price from cart where item_code='$row[1]'";
    $res5=mysql_query($qry5) or die(mysql_error());
    $row5=mysql_fetch_row($res5);
    echo "<td>Rs.$row5[0]</td>";
    echo "<form method='post'>";
    echo "<td><button type='submit' name='del' value='$row[1]' onclick=\"return confirm('Delete this Item from Cart?');\">Delete item</button></td>";
    echo "</form></tr>";
    $b=$row[1];
    array_push($a,$b);
}
$_SESSION['item']=$a;
}
if(isset($_POST['del']))
{
    $item_del=$_POST['del'];
    $qry3="delete from cart where item_code='$item_del' and user_id=$apr[0]";
    mysql_query($qry3) or die(mysql_error());
    header('location:cart.php');
}
$qry="select * from cart where user_id=$apr[0]";
$res=mysql_query($qry) or die(mysql_error());
$arr=array();
while($row3=mysql_fetch_row($res))
{
    array_push($arr,$row3[2]);
}
$sum=0;
foreach($arr as $k=>$v)
{
    $sum=$sum+$v;
}
$_SESSION['item_cost']=$sum;
echo "<tr><td></td><td><hr></td></tr>";
echo "<tr><td>Total Price:</td><td>Rs.$sum</td>";
echo "<form method='post'>";
echo "<td><input type='submit' name='all' value='Clear Cart' onclick=\"return confirm('Delete all Items from Cart?');\"/></td></tr>";
echo "<tr><td><input type='submit' name='pay' value='Proceed to Pay'/></td></tr>";
echo "</form></table>";
if(isset($_POST['all']))
{
    $qry5="delete from cart where user_id=$apr[0]";
    mysql_query($qry5) or die(mysql_error());
    if(mysql_affected_rows()>0)
   {
   header('location:cart.php');
    }
    else
    echo "<script>alert('No record found.')</script>";
    
}
if(isset($_POST['pay']))
{
    mysql_query($qry) or die(mysql_error());
    if(mysql_affected_rows()>0)
    {
    header('location:item_pay.php');
    }
    else
    echo "<script>alert('Please add some Items')</script>";
}

?>
</div>
<?php
require 'footer.php';
?>
</body>
</html>