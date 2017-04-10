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

<table><tr><td>Hall No: <td><input type='number' name='hall_no'/><tr>
<tr><td>Address: <td><input type='text' name='address'/><tr>
<tr><td>Date Available: <td><input type='date' name='date_available'/><tr>
<input type="submit" name="view" value="View"/>
<input type="submit" name="add" value="Add"/>
<input type="submit" name="delete" value="Delete"/>
<input type="submit" name="update" value="Update"/>

<?php
require 'data_link.php';
function fetchdata()
 {
    $qry="select * from birthday_hall";
    $res=mysql_query($qry);
        
    echo "<table cellpadding=20 cellspacing=0 align=center style=border-width:3px; border-style:solid;border-color: black;border-radius:5px;>";
     
    echo "<tr style=background-color:orange><th>Hall No.</th><th>Address</th><th>Availability</th><th>Date Available</th></tr>";
 while($row=mysql_fetch_row($res))
 {
   
 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
 }
 echo "</table><br/><br/>";
 }

if(isset($_POST['view']))
{
    fetchdata();   
}

elseif(isset($_POST['add']))
{
    if(!empty($_POST['address'])&& !empty($_POST['date_available']))
    { 
    $address=$_POST['address'];
    $availability=true;
    $date_available=$_POST['date_available'];
        
   $qry="insert into birthday_hall (address,availability,date_available) values('$address','$availability','$date_available')";
   mysql_query($qry) or die(mysql_error());
   echo "<script>alert('Data saved successfully.')</script>";
   fetchdata();
   }//to fetch the all record after inserting record
   
   
    else
    echo "<div align=center width=300px><font color=red>Address and date available are mandatory.</font></div>";
   
}
 else
 if(isset($_POST['update']))
 {
   if(!empty($_POST['hall_no']))
   {
    $hall_no=$_POST['hall_no'];
    $address=$_POST['address'];
    $date_available=$_POST['date_available'];
    
    $qry="update birthday_hall set date_available='$date_available',address='$address' where hall_no=$hall_no ";
   mysql_query($qry) or die(mysql_error());
   echo "<script>alert('Data updated successfully.')</script>";
   fetchdata();
   }
   else
    echo "<div align=center width=300px><font color=red>Hall No. is  mandatory.</font></div>";
    
 }
 //code for deleting data
 elseif(isset($_POST['delete']))
 {
   if(!empty($_POST['hall_no']))
   {
    $hall_no=$_POST['hall_no'];
    
   $qry="delete from birthday_hall where hall_no=$hall_no";
   mysql_query($qry) or die(mysql_error());
   if(mysql_affected_rows()>0)
   {
   echo "<script>alert('Data deleted successfully.')</script>";
   fetchdata();
   }
   else
    echo "<script>alert('No record found.')</script>";
   }
   else
    echo "<script>alert('Hall No. is mandatory.')</script>";
    
 }
 


?>
<br /><br />


</div>

</body>
</html>