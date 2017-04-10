<?php 
session_start();
if(isset($_SESSION['Username']))
{
    echo "Welcome: $_SESSION[Username] | <a href='logout.php'>Logout</a>";
$_SESSION['no_items']=0;
//$_SESSION['no_items']++;
$_SESSION['items']=array();
 //array_push($_SESSION['name'],"A");
$_SESSION['cost']=array();
array_push($_SESSION['cost'],100);
echo "<a href=\"Cart.php\">Cart($_SESSION[no_items])</a>";
}
else
    echo "<a href='user_registration_form.php'>Register</a> | <a href='user_login.php'>Log in</a>";
    
    

?>
