
<html>
<head>
<title>Fortune Wall</title>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="chrome.js"></script>
</head>
<body bgproperties=fixed background="images/bg.jpg" style="background-repeat:no-repeat;background-scroll:off;font-family:arial;">
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
<br /><br /><br /><br />
<form method="post">
<table style="width: auto; margin-left:15%; margin-top:2%;" cellspacing="30px">
<tr>
<td>Name:</td><td><?php
$q=$_SESSION['Username'];
$sql="select full_name from user where user_name='$q'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
echo $row[0];
?>
</td>
</tr>
<tr>
<td>Enter Address:</td><td><?php
$q=$_SESSION['Username'];
$sql="select address,city,pincode from user where user_name='$q'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
echo $row[0].'<br>'.$row[1].'<br>'.$row[2];
?>
</td>
</tr>
<tr>
<td>Select Payment Method:</td><td><select name="payment">
<option value="Cash on delivery" selected="selected">Cash on delivery</option>
<option value="Debit Card">Debit Card</option>
<option value="Credit Card">Credit Card</option>    
</select>
</td>
</tr>
</table>
<br /><center><input type="submit" name="pay" value="Proceed"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"/></center>
</form>
<br /><br />
</div>
<?php
if(isset($_POST['pay'])){
$_SESSION['payment']=$_POST['payment'];
header('location:item_pay2.php');
}
?>
<?php
require 'footer.php';
?>
</body>
</html>