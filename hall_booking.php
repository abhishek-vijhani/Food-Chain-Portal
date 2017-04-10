<html>
<head>
<title>Fortune Wall</title>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />
<script type="text/javascript" src="chrome.js"></script>
</head>
<body bgproperties=fixed background="images/bg.jpg" alink="white" vlink="white" style="background-repeat:no-repeat;background-scroll:off;font-family: arial;">
<a href="main.php"><img src="images/logo.png" width="260" height="130" align="left" class="logo" style="margin-top: -40px;margin-left:20px"/></a>
<div id="reg"><?php
require 'user_link.php';
?>
</div><br /><br /><br /><br /><br /><br />
<div id="bg1">
<br />
<!---------MENU BAR----------------->
<?php
require 'menubar.php';
?>
<br /><br />

<!-------------------CONTENT------------------>
<div style="margin-left: 100px; font-size:20px;">To view the halls available, click the button below:<br />
<form method="post">
<input type="submit" name="view" value="View"/><br />
</form>
<?php
require 'data_link.php';
if(isset($_POST['view']))
{
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
fetchdata();
}
    if(isset($_SESSION['Username'])){
    echo "<form method='post'>";
    echo "Enter a hall no. of your choice: <input type='text' name='hall_no' /><br>";
    echo "<input type='submit' name='book' value='Book Hall'/>";
    echo "</form>";}
    else
    echo "<a href='user_login.php' style='color:black;'>Login to book Hall</a>";
if(isset($_POST['book']))
{
    $useid=$_SESSION['Username'];
    if(!empty($_POST['hall_no']))
    { 
    $hall=$_POST['hall_no'];
    $qry3="select user_id from user where user_name='$useid'";
    $res3=mysql_query($qry3) or die(mysql_error());
    $row3=mysql_fetch_row($res3);
    $use1=$row3[0];
    $qry2="select * from birthday_hall where hall_no=$hall";
    $res2=mysql_query($qry2) or die(mysql_error());
    $row2=mysql_fetch_row($res2);
    $date=$row2[3];
    if($row2[2]=='Available')
   {
   $qry="insert into booking(user_id,hall_no,date) values($use1,$hall,'$date')";
   mysql_query($qry) or die(mysql_error());
   $qq="Unavailable";
   $qqq="update birthday_hall set availability='$qq' where hall_no=$hall";
   mysql_query($qqq) or die(mysql_error());
   echo "<script>alert('Hall Booked successfully.')</script>";
   
   }
   else
   echo  "<script>alert('Hall is already booked')</script>";
   
  
   }
    else
    echo "<div align=center width=300px><font color=red>Hall number is mandatory.</font></div>";
   
}
?>
<br /><br /><br /><br />
</div>
</div>
<!---------------------FOOTER----------------->
<?php
require 'footer.php';
?>

</body></html>