<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />
<script type="text/javascript" src="chrome.js"></script>
<style type="text/css">
a.f:hover {background: #ff7c00;}
            
li.f1 a.f   {padding: 15px 50px 10px 50px;
        display: block;
        color:black;
        text-decoration: none;
        position: relative;
        margin:0}
ul.f2   {list-style-type: none;
        font: arial bold;
        font-size: 20px;
        color:black;
        padding: 5px 0 0 0;
        }
</style> 
</head>
<body>
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
<br /><br /><br /><br /><br /><center><fieldset style="border-bottom: hidden;border-right: hidden;border-left: hidden;width:50%;border-color:black;border-width:3px;"><legend><h2> User Information </h2></legend></fieldset></center>
<?php
require 'data_link.php';
?>
<div style="width: 65%;margin-left: 20px;float: left;">
<table style="width: auto; margin-left:10%; margin-top:2%;" cellspacing="30px">
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
$sql="select address,city,pincode from user where user_name='$q'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
echo $row[0].'<br>'.$row[1].'<br>'.$row[2];
?></td>
</tr>
<tr>
<td>Phone No:</td><td><?php 
$q=$_SESSION['Username'];
$sql="select mobile_no from user where user_name='$q'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
echo $row[0];
 ?></td>
</tr>
<tr>
<td>Your points:</td><td><?php 
$q=$_SESSION['Username'];
$sql="select points from user where user_name='$q'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
echo $row[0];
 ?></td>
</tr>
</table>
</div><br /><br />
<div style="float:left;background-color: #ffa73d;width:30%;display: block;">
<ul class="f2">
<li class="f1"><a href="changepass.php" class="f">Change Password</a></li>
<li class="f1"><a href="edit_info.php" class="f">Edit Profile</a></li>
<li class="f1"><a href="orders.php" class="f">View My orders</a></li>
</ul>

</div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>
<?php
require 'footer.php';
?>
</body>
</html>