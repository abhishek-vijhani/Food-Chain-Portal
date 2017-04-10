<html>
<head>
<title>
Admin Panel</title>
<link rel="stylesheet" type="text/css" href="admin_basic.css"/>
</head>
<body>
<div id="bar"><br /><br />
<div id="abc">
<?php
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
<tr><td>
User Name:</td> <td><input type="text" name="user_name"/></tr>
<tr><td>Password: <td><input type="password" name="password"/></tr>
<tr><td>Address:<td> <textarea name="address" cols="15" rows="5"></textarea></tr>
<tr><td>Contact No.:<td> <input type="text" name="contact_no" maxlength="10"/> </tr>
<tr><td><input type="submit" name="view" value="View All"/>
<input type="submit" name="add" value="Add Admin"/>
<input type="submit" name="update" value="Update Admin"/>
<input type="submit" name="delete" value="Delete Admin"/>
</form>
</table>
<br /><br />

<?php
require 'data_link.php';
 function fetchdata()
 {
    $qry="select user_name,address,contact_no from administrator";
    $res=mysql_query($qry);
        
    echo "<table cellpadding=20 cellspacing=0 align=center style=border-width:3px; border-style:solid;border-color: black;border-radius:5px;>";
     
    echo "<tr style=background-color:orange><th>User name</th><th>Address</th><th>Contact No.</th></tr>";
 while($row=mysql_fetch_row($res))
 {
   
 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
 }
 echo "</table><br/><br/>";
 }
 //on view all button click
 
 if(isset($_POST['view']))
 {
     fetchdata();
 }
 //on insert button click
 else if(isset($_POST['add']))
 {
   if(!empty($_POST['user_name'])&& !empty($_POST['password']))
   {
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $contact_no=$_POST['contact_no'];
        
   $qry="insert into administrator values('$user_name','$password','$address',$contact_no)";
   mysql_query($qry) or die(mysql_error());
   echo "<script>alert('Data saved successfully.')</script>";
   //to fetch the all record after inserting record
   fetchdata();
   }
   else
    echo "<div align=center width=300px><font color=red>Username and password are mandatory.</font></div>";
    
 }
 //code for update record
 elseif(isset($_POST['update']))
 {
   if(!empty($_POST['user_name']))
   {
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $contact_no=$_POST['contact_no'];
    $qry="update administrator set contact_no=$contact_no,password='$password', address='$address' where user_name='$user_name' ";
   mysql_query($qry) or die(mysql_error());
   echo "<script>alert('Data updated successfully.')</script>";
   fetchdata();
   }
   else
    echo "<div align=center width=300px><font color=red>Item Code is  mandatory.</font></div>";
    
 }
 //code for deleting data
 elseif(isset($_POST['delete']))
 {
   if(!empty($_POST['user_name']))
   {
    $item_code=$_POST['user_name'];
    
   $qry="delete from administrator where user_name='$user_name'";
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
    echo "<script>alert('Item Code is mandatory.')</script>";
    
 }
?>


</div>
</body>
</html>