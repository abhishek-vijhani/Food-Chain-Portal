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
        margin:0}
ul.f2   {list-style-type: none;
        font: arial bold;
        font-size: 20px;
        color:black;
        padding: 5px 0 0 0;
        }
</style> 
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
<br />
<div style="width: 65%;margin-left: 20px;float: left;background: white;">
<form method="post">
<table style="margin-left: 100px;" cellspacing=20>
<tr><td>Enter Current Password:</td><td> <input type="password"  name="cpass" required oninvalid="setCustomValidity('Password is mandatory')" oninput="setCustomValidity('')" autocomplete="off" placeholder="Enter Current password"/></td></tr>
<tr><td>Enter New Password:</td><td> <input type="password" name="npass" required oninvalid="setCustomValidity('Password name is required and password must be 6-15 digits.')" oninput="setCustomValidity('')" placeholder="Enter password" min="6" maxlength="15" /></td></tr>
<tr><td>Re-enter New Password:</td><td> <input type="password"  name="rpass" required oninvalid="setCustomValidity('Password is mandatory')" oninput="setCustomValidity('')" autocomplete="off" placeholder="Re-Enter New password" min="6" maxlength="15"/></td></tr>
</table><br />
<center><input type="submit" name="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"/></center><br /><br />
</form>
<?php
require 'data_link.php';
if(isset($_POST['submit']))
{
    $q=$_SESSION['Username'];
    if(!empty($_POST['cpass']))
    {
        $cpass=md5($_POST['cpass']);
        $qry="select user_password from user where user_name='$q'";
        $res =mysql_query($qry) or die(mysql_error());
        $row=mysql_fetch_row($res);
        if($cpass==$row[0])
            {
                if($_POST['npass']==$_POST['rpass'])
                    {
                        $npass=md5($_POST['rpass']);
                        $qry="update user set user_password='$npass' where user_name='$q'";
                        mysql_query($qry) or die(mysql_error());
                        echo "<script>alert('Password changed successfully.')</script>";
                    }
                else
                echo "<script>alert('Wrong password combination')</script>";
            }
        else
        echo "<script>alert('Wrong password')</script>";
        }
}
?>
</div><br /><br />
<div style="float:left;background-color: #ffa73d;width:30%;display: block;">
<ul class="f2">
<li class="f1"><a href="changepass.php" class="f">Change Password</a></li>
<li class="f1"><a href="edit_info.php" class="f">Edit Profile</a></li>
<li class="f1"><a href="orders.php" class="f">View My orders</a></li>
<li class="f1"><a href="" class="f">Completed Orders</a></li>
</ul>
</div>
<br/><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div></body>
<?php
require 'footer.php';
?>
</body>
</html>