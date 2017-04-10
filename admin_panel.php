<html>
<head>
<title>
Fortune Wall</title>
<link rel="stylesheet" type="text/css" href="admin_basic.css"/>
</head>
<body>
<div id="bar"><br /><br />
<div id="abc"><?php
require 'admin_link.php';
?>
<a href="main.php">View Site</a>
</div>
<h1 style="color:#f0f0f0;align:left;font-family: arial;"> &nbsp;Administration Panel</h1>
</div>
<br /><br />
<!----------------MENU BAR------------------->
<center>
<div class="menusty">
<ul>
<li><a href="admin_panel.php"> Dashboard </a></li>
<li><a href="admin_menu.php"> Menu </a></li>
<li><a href="admin_emp.php"> Employees </a></li>
<li><a href="admin_hall.php"> Hall Booking </a></li>
<li><a href="admin.php"> Admins</a></li>
</ul>
</div>

<!--------------- CONTENT ------------------>
<div id="bdy">
<br /><br/>
<font size=18 face=arial>
<form method="post">
<table>
<tr><td>Enter Booking Number:</td><td><input type="text" name="hall" /></td></tr>
<tr><td><input type="submit" name="delete" value="Delete"/></td><td><input type="submit" name="all" value="Delete All"/></td></tr>
</table>
</form>
<?php
require 'data_link.php'; 
 function fetchdata()
 {
    
 
 $qry="select * from booking";
    $res=mysql_query($qry);
     
     echo "<p id=hd>New Hall Booking Requests:</p>";
    echo "<table cellpadding=20 cellspacing=0 align=center style=border-width:3px; border-style:solid;border-color: black;border-radius:5px;>";
     
    echo "<tr style=background-color:orange><th>Booking No</th><th>User ID</th></th><th>Hall Number</th><th>Date</th></tr>";
 while($row=mysql_fetch_row($res))
 {
   
 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
 }
 echo "</table><br/><br/>";
 echo "<p id=hd>New Orders:</p>";
 $qry1="select * from item_orders";
    $res1=mysql_query($qry1);
        
    echo "<table cellpadding=20 cellspacing=0 align=center style=border-width:3px; border-style:solid;border-color: black;border-radius:5px;>";
     
    echo "<tr style=background-color:orange><th>Order Code</th><th>Item Code</th><th>Order Date</th><th>Order Bill</th><th>User ID<th>Order Time<th>Delivery Time</tr>";
 while($row1=mysql_fetch_row($res1))
 {
   
 echo "<tr><td>$row1[0]</td><td>$row1[1]</td><td>$row1[2]</td><td>$row1[3]</td><td>$row1[4]<td>$row1[5]<td>$row1[6]</tr>";
 }
 echo "</table><br/><br/>";
 }
fetchdata();
if(isset($_POST['delete']))
{
    if(!empty($_POST['hall']))
    {
        $booking=$_POST['hall'];
    $qry="delete from booking where booking_no=$booking";
   mysql_query($qry) or die(mysql_error());
   if(mysql_affected_rows()>0)
   {
    $q="select hall_no from booking";
    $qq=mysql_query($q) or die(mysql_error());
    $qqq=mysql_fetch_row($qq);
    $qry="update birthday_hall set availability='Available' where hall_no=$qqq[0]";
    mysql_query($qry) or die(mysql_error());
   echo "<script>alert('Data deleted successfully.')</script>";
   header('location:admin_panel.php');
    }
    else
    echo "<script>alert('No record found.')</script>";
}
else
    echo "<script>alert('Booking Number is mandatory.')</script>";
}  
if(isset($_POST['all']))
{
    $qry="delete from booking";
    mysql_query($qry) or die(mysql_error());
    if(mysql_affected_rows()>0)
   {
    $qry="update birthday_hall set availability='Available'";
    mysql_query($qry) or die(mysql_error());
   echo "<script>alert('All Data deleted successfully.')</script>";
   header('location:admin_panel.php');
    }
    else
    echo "<script>alert('No record found.')</script>";
} 

?>
</div>

</body>
</html>