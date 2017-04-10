<?php
session_start();
require 'data_link.php';
echo "<style type='text/css'>
ul.f1,ul.f6
{
    font-family: Arial, Verdana;
    font-size: 20px;
    margin: 0;
    padding: 5px;
    list-style: none;
}
ul.f1
{
    margin-right:55px;
    float:right;
}
ul.f1 li.f2,ul.f6 li.f4
{
    display: block;
    position: relative;
    float: left;
}

li.f2 ul.f6
{
    display: none;
}

ul.f1 li.f2  li.f4 a.f5 
{
    display: block;
    text-decoration: none;
    color: #000000;
    padding: 15px 15px 5px 15px;
    background: #ffffff;
    margin-left: 1px;
    white-space: nowrap;
    opacity:0.95;
}


li.f2:hover ul.f6 
{
    display: block;
    position: absolute;
}

li.f2:hover li.f4
{
    float: none;
    font-size: 20px;
}



li.f2:hover li.f4 a.f5:hover 
{
    background: #f58925;
}
</style>";
if(isset($_SESSION['Username']))
{
    $val=array();
$rec=$_SESSION['Username'];
$qur="select user_id from user where user_name='$rec'";
$rps=mysql_query($qur) or die(mysql_error());
$apr=mysql_fetch_row($rps);
$qry="select * from cart where user_id=$apr[0]";
$res=mysql_query($qry) or die(mysql_error());
while($row=mysql_fetch_row($res))
{
    array_push($val,$row[1]);
}
    echo "<a href='cart.php'><img src='cart.gif' height='20px' width='20px'/> Cart".'('.count($val).')'.'</a>';
    echo "<ul class='f1'>
      <li class='f2'><a href='user_info.php' class='f3' style='text-decoration:none;'>";
      
$sql="select full_name from user where user_name='$rec'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
echo $row[0];
      echo"</a>
      <ul class='f6'>
      <li class='f4'><a href='user_info.php' class='f5'>My Profile</a></li>
      <li class='f4'><a href='orders.php' class='f5'>Active Orders</a></li>
      <li class='f4'><a href='user_logout.php' class='f5'>Logout</a></li>                  
      </ul>
      </li>            
    </ul>";
    
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
else
{
    echo "<a href='user_registration_form.php'>Register</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='user_login.php'>Log in</a>";

 }

?>