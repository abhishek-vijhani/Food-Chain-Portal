<html>
<head>
</head>
<body bgcolor="#E8E8E8">
<form method="post">
<center><div style="margin-top:15%;border:3px black solid;margin-left:20%;margin-right:20%;">
<br /><br/><table cellspacing="10px" cellpadding="10px">
<tr>
<td>User Name:</td><td><input type="text" name="uname"/></td>
</tr>
<tr>
<td>User Password:</td><td><input type="password" name="upass"/></td>
</tr>
<tr>
<td><center><input type="submit" name="login" value="login"/></center></td>
</tr>
</table>
<br /><br /></div></center>
</form>
</div>  
</body>
</html>

<?php
session_start();
require 'data_link.php';
if(isset($_POST['login']))
{
    if(!empty($_POST['uname']) && !empty($_POST['upass']))
    {
        $user=$_POST['uname'];
        $pass=$_POST['upass'];
        $qry="select user_name,password from administrator where user_name='$user'";
        $res=mysql_query($qry) or die(mysql_error());
        if($row=mysql_fetch_row($res))
        {
            $_SESSION['admin']=$user;
            if($pass==$row[1])
            header("location:admin_panel.php");
        }
        else
        echo "<script>alert('Wrong Username or password')</script>";
    }
    else 
    echo "<br>"."<script>alert('User name and password cannot be empty')</script>";
}