<?php
require "data_link.php";
?>
<html>
<head>
<title>Fortune Wall</title>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="chrome.js"></script>
</head>

<body bgproperties=fixed background="images/bg.jpg" style="background-repeat:no-repeat;background-scroll:off;font-family:arial;">
<img src="images/logo.png" width="260" height="130" align="left" class="logo"/>
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
<br /><br /><br /><br />
<table style="width: auto; margin-left:15%; margin-top:2%;" cellspacing="30px">
<tr>
<td>Name:</td><td><?php 
$q=$_SESSION['Username'];
$sql="select full_name from user where user_name='$q'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
echo $row[0];
 ?></td>
</tr>
<tr>
<td>Address:</td><td><?php 
$q=$_SESSION['Username'];
$sql="select address,city,pincode,points from user where user_name='$q'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
echo $row[0].'<br>'.$row[1].'<br>'.$row[2];
?></td>
</tr>
<tr>
<td>Item Cost:</td><td><?php $dis=$_SESSION['item_cost'];
if($row[3]>=50){
  echo '<del>Rs.'.$dis.'</del><br/>';
  $adis=(7*$dis)/100;
  $aid=$dis-$adis;
  echo '<h4>Rs.'.$aid.'</h4><p>7% Discount</p>';  
}
else
echo 'Rs.'.$dis; ?>
</td>
</tr>
<tr>
</tr>
<tr>
<td>Payment Method:</td><td><?php echo $_SESSION['payment']; ?></td>
</tr>
</table>
<?php
$pay=$_SESSION['payment'];
if($pay=='Cash on delivery')
{
 echo "<form method='post'";
 echo "<br/>"."<center><input type='submit' name='submit' value='Place order' onclick=\"return confirm('Place Order?');\"/></center>";
 echo "</form>";
}
else
{
    echo "<form method='post'>";
    echo "<div style='width:auto;margin-left:18%;'>Select Bank: <select name='bank>
<option value='-1>---Select---</option>
<option value='Union Bank of India'>Union Bank of India</option>
<option value='State Bank of India'>State Bank of India</option>
<option value='ICICI Bank'>ICICI Bank</option>
<option value='Axis Bank'>Axis Bank</option>
<option value='Syndicate Bank'>Syndicate Bank</option>
</select>";
    echo "<br/><br/>Card Number: <input type='text' name='card' maxlength='16' required oninvalid='setCustomValidity('Card number is required')' oninput='setCustomValidity('')' placeholder='Enter card number'/>";
    echo "<br/><br/>CVV Number: <input type='text' name='cvv' maxlength='3' required oninvalid='setCustomValidity('CVV is required') oninput='setCustomValidity('')' autocomplete='off'' placeholder='Enter 3 Digit CVV'/>";
    echo "<br><br>Pin Number: <input type='text' name='pin' maxlength='4' required oninvalid='setCustomValidity('Pin is required') oninput='setCustomValidity('')' autocomplete='off'' placeholder='Enter Pin Number'/></div>";
    echo "<br/>"."<center><input type='submit' name='submit' value='Place order'/></center>";
}
echo "<br /><br/>";
date_default_timezone_set("Asia/Kolkata");
$arr=array();
$arr=$_SESSION['item'];
$imp=implode("+",$arr);
if($row[3]>=50)
$cost=$aid;
else
$cost=$dis; 
if(isset($_POST['submit']))
{
    $o_id=str_shuffle('12345ABCD');
    $date=date("d/m/y");
    $uid=$_SESSION['userid'];
    $curtime=date('H:i');
    $time=date('H:i', strtotime('+30 minutes'));
$qry="insert into item_orders (order_code,item_codes,order_date,order_bill,user_id,order_time,delivery_time) values ('$o_id','$imp','$date',$cost,$uid,'$curtime','$time')";
    mysql_query($qry) or die(mysql_errno().mysql_error());
    $id=$_SESSION['userid'];
    $sql="delete from cart where user_id=$id";
    mysql_query($sql) or die(mysql_error());
    $qr="update user set points=points+10 where user_id=$uid";
    mysql_query($qr) or die(mysql_error());
    header("location:orders.php");
}
?>
</div>
<?php
require 'footer.php';
?>
</body>
</html>