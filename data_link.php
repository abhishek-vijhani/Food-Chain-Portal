<?php
$host="localhost";
 $user="root";
 $password='';
 $database="food_portal";
 $link=@mysql_connect($host,$user,$password)
 or die("<font color=red>Some error occured of type:".
  mysql_errno()."<br> error msg:".mysql_error()."</font>");
  mysql_select_db($database) 
 or die('Invalid database name.');
?>