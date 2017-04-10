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
<td>Enter New Password:</td><td><input type="password" name="password" placeholder="Password"/></td>
</tr>
<tr>
<td>Re-Enter New Password:</td><td><input type="password" name="repassword" placeholder="Password"/></td>
</tr>
</table></center>
<center><input type="submit" name="submit" value="Finish"/></center>
<br /><br /><br />
</form>

<?php
require 'data_link.php';
$userpass=$_SESSION['pass_username'];
if(isset($_POST['submit']))
{
    $pass=$_POST['password'];
    $pass1=$_POST['repassword'];
    if($pass==$pass1)
    {
        $pass2=md5($pass1);
        $qry="update user set user_password='$pass2'";
        mysql_query($qry) or die(mysql_error());
        echo "<script>alert('Password Changed')</script>";
    }
    else
    echo "<script>alert('Wrong Password Combination')</script>";
}
?>