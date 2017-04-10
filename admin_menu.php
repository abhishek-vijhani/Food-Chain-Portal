<html>
<head>
<title>
Fortune Wall</title>
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
<form method="post" >
<table>
<tr><td>
Item Code:</td> <td><input type="text" name="item_code"/></tr>
<tr><td>Item Name: <td><input type="text" name="item_name"/></tr>
<tr><td>Item Price:<td> <input type="text" name="price"/></tr>
<tr><td><input type="submit" name="view" value="View Items"/>
<input type="submit" name="add" value="Add Items"/>
<input type="submit" name="update" value="Update Items"/>
<input type="submit" name="delete" value="Delete Items"/>
</form>
</table>
<br /><br />

<?php
require 'data_link.php';
 function fetchdata()
 {
    $qry="select * from items";
    $res=mysql_query($qry);
        
    echo "<table cellpadding=20 cellspacing=0 align=center style=border-width:3px; border-style:solid;border-color: black;border-radius:5px;>";
     
    echo "<tr style=background-color:orange><th>Item Code</th><th>Item Name</th><th>Item Price</th></tr>";
 while($row=mysql_fetch_row($res))
 {
   
 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
 }
 echo "</table><br/><br/>";
 //on view all button click
 }
 
 if(isset($_POST['view']))
 {
     fetchdata();
 }
 //on insert button click
 else if(isset($_POST['add']))
 { 
   if(!empty($_POST['item_code'])&& !empty($_POST['item_name'])&&!empty($_POST['price']))
   {
    $item_code=$_POST['item_code'];
    $item_name=$_POST['item_name'];
    $item_price=$_POST['price'];
    
    
   $qry="insert into items values('$item_code','$item_name',$item_price)";
   mysql_query($qry) or die(mysql_error());
   echo "<script>alert('Data saved successfully.')</script>";
   //to fetch the all record after inserting record
   fetchdata();
   }
   else
    echo "<div align=center width=300px><font color=red>Item Code, Item Name, Item Price are mandatory.</font></div>";
    
 }
 //code for update record
 elseif(isset($_POST['update']))
 {
   if(!empty($_POST['item_code']))
   {
    $item_code=$_POST['item_code'];
    $item_name=$_POST['item_name'];
    $item_price=$_POST['item_price'];
    $qry="update items set item_name='$item_name',item_price=$item_price where item_code='$item_code' ";
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
   if(!empty($_POST['item_code']))
   {
    $item_code=$_POST['item_code'];
    
   $qry="delete from items where item_code='$item_code'";
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