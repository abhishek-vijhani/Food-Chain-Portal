<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="chrome.js"></script>
</head>
<body background="images/bg.jpg" style="background-repeat:no-repeat;background-scroll:off;">
<a href="main.php"><img src="images/logo.png" width="260" height="130" align="left" class="logo" style="margin-top: -40px;margin-left:20px"/></a>
<div id="reg">
<?php
require 'user_link.php';
?>
</div><br /><br /><br /><br /><br /><br />
<div id="bg1">
<br />
<!---------MENU BAR----------------->
<?php
require 'menubar.php';
?>
<br /><br /><br /><center><fieldset style="border-bottom: hidden;border-right: hidden;border-left: hidden;width:50%;border-color:black;border-width:3px;"><legend><h2>Reset Password</h2></legend></fieldset></center>
<form method="post">
<br />
<center><table cellspacing="20px" cellpadding="2px" >
<tr>
<td>Enter User name:</td><td><input type="email" name="user" placeholder="Email"/></td>
</tr>
</table></center>   
<center><input type="submit" name="submit" value="Next"/></center>
<br /><br /><br />
</form>



<?php
require 'data_link.php';
if(isset($_POST['submit']))
{
$upass=$_POST['user'];
$qry="select user_name from user where user_name='$upass'";
$res=mysql_query($qry) or die(mysql_error());
$row=mysql_fetch_row($res);
if($upass==$row[0])
{
$_SESSION['pass_username']=$upass;
header('location:pass_forgot2.php');
} 
else
echo "<script>alert('Username doesnot exist')</script>";
}
?>
