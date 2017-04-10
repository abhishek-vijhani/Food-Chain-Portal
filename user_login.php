<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="chrome.js"></script>
<title>Login Page</title>
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
<br /><br /><br /><center><fieldset style="border-bottom: hidden;border-right: hidden;border-left: hidden;width:50%;border-color:black;border-width:3px;"><legend><h2>User Login</h2></legend></fieldset></center>
<form method="post">
<br />
<center><table cellspacing="20px" cellpadding="2px" >
<tr>
<td>Enter User name:</td><td><input type="email" name="user" placeholder="Email"/></td>
</tr>
<tr>
<td>Enter Password:</td><td><input type="password" name="password" placeholder="Password"/></td>
</tr>
</table></center>   
<center><input type="submit" name="submit" value="Login" />
<br /><center><a href="pass_forgot1.php" style="color:blue;">Forgot Password?</a></center>
<center><h4>OR</h4></center>
<a href="user_registration_form.php" style="color:blue; ">Sign Up</a></center>
</form>
<br />
</div>
</body>
</html>


<?php
require 'data_link.php';
 if(isset($_POST['submit']))
 {
    if(!empty($_POST['user']) && !empty($_POST['password']))
    {
        $user=$_POST['user'];
        $pass=md5($_POST['password']);
        $qry="select user_name,user_password from user where user_name='$user'";
        $res =mysql_query($qry) or die(mysql_error());
        $row=mysql_fetch_row($res);
        if($user==$row[0])
        {
            if($pass==$row[1])
            {
                $_SESSION['Username']=$user;
                header("Location:main.php");
            }
            else
            echo "<script>alert('Wrong password')</script>";
        }
        else
    echo "<script>alert('Wrong user name')</script>";
    }
    else
    echo "<script>alert('Username and password are mandatory')</script>";
 }