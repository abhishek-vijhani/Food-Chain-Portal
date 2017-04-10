<?php
session_start();
if(isset($_SESSION['admin']))
{
    echo "Welcome Admin: $_SESSION[admin] | <a href='admin_logout.php'>Logout</a> | ";
}
?>