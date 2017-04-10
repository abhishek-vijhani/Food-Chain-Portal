<html>
<head>
<title>
Admin Panel</title>
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
<li><a href="admin_panel.php">&nbsp;&nbsp; Dashboard &nbsp;&nbsp; </a></li>
<li><a href="admin_menu.php"> &nbsp;&nbsp; Menu &nbsp;&nbsp; </a></li>
<li><a href="admin_emp.php"> &nbsp;&nbsp; Employees &nbsp;&nbsp; </a></li>
<li><a href="admin_hall.php"> &nbsp;&nbsp; Hall Booking &nbsp;&nbsp; </a></li>
<li><a href="admin.php"> &nbsp;&nbsp; Admins &nbsp;&nbsp; </a></li>
</ul>
</div>

<!--------------- CONTENT ------------------>
<div id="bdy">
<br /><br/>
<font size=18 face=arial>
<form method="post" >
<table>
<tr><td>
Request No.:</td> <td><input type="text" name="request_no"/></tr>
<tr><td>Address: <td><input type="text" name="address"/></tr>
<tr><td>Mobile No.:<td> <input type="text" name="mobile_no" maxlength="10"/></tr>
<tr><td>Salary:</td><td><input type="text" name="salary" /></td></tr>
<tr><td><input type="submit" name="view" value="View Employees"/>
<input type="submit" name="alter" value="Alter Employee"/>
<input type="submit" name="delete" value="Delete Employee"/>
</form>
</table>
<br /><br />
<?php
require 'data_link.php'; 
 function fetchdata()
 {
    
 
 $qry="select * from employee";
    $res=mysql_query($qry);
     
     
    echo "<table cellpadding=20 cellspacing=0 align=center style=border-width:3px; border-style:solid;border-color: black;border-radius:5px;>";
     
    echo "<tr style=background-color:orange><th>Request No</th><th>Name</th><th>Address</th><th>Mobile no.</th><th>Date of birth</th><th>Education</th><th>Interested</th><th>Experience</th><th>Outlet</th><th>Email ID</th><th>Salary</th></tr>";
 while($row=mysql_fetch_row($res))
 {
   
 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td></tr>";
 }
 echo "</table><br/><br/>";
 }
 
if(isset($_POST['view']))
 {
     fetchdata();
 }
 
 elseif(isset($_POST['alter']))
 {
   if(!empty($_POST['request_no']))
   {
    $request_no=$_POST['request_no'];
    $address=$_POST['address'];
    $mobile_no=$_POST['mobile_no'];
    $salary=$_POST['salary'];
    $qry="update employee set address='$address',mobile_no=$mobile_no,salary=$salary where request_no=$request_no ";
   mysql_query($qry) or die(mysql_error());
   echo "<script>alert('Data updated successfully.')</script>";
   fetchdata();
   }
   else
    echo "<div align=center width=300px><font color=red>Request No is  mandatory.</font></div>";
    
 }
 //code for deleting data
 elseif(isset($_POST['delete']))
 {
   if(!empty($_POST['request_no']))
   {
    $request_no=$_POST['request_no'];
    
   $qry="delete from employee where request_no=$request_no";
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
    echo "<script>alert('Request Number is mandatory.')</script>";
    
 }

?>
</div>
</body>
</html>