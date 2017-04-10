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
<td>Security Question:</td><td><?php
require 'data_link.php';
$pass1=$_SESSION['pass_username'];
$qry1="select security_question from user where user_name='$pass1'";
$res1=mysql_query($qry1) or die(mysql_error());
$row1=mysql_fetch_row($res1);
echo $row1[0];
?></td>
</tr>
<tr>
<td>Your Answer:</td><td><input type="text" name="secans" placeholder="Answer"/></td>
</tr>
</table></center>
<center><input type="submit" name="submit" value="Next"/></center>
<br /><br /><br />
</form>

<?php
require 'data_link.php';
$pass1=$_SESSION['pass_username'];
if(isset($_POST['submit']))
{
    $qry1="select answer from user where user_name='$pass1'";
$res1=mysql_query($qry1) or die(mysql_error());
$row1=mysql_fetch_row($res1);
$ans=$_POST['secans'];
    if($ans==$row1[0])
    {
        header('location:pass_forgot3.php');
    }
    else
    echo "<script>alert('Wrong Answer')</script>";
}
?>