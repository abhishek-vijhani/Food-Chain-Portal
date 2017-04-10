
<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<style type="text/css">
.hov:hover{
    text-decoration:underline;
    }
.pr {width: 400px;
    height: 20px;
    background: white;}
progress::-webkit-progress-bar { background: #fff;
                                border-radius: 10px;
                                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset; }
progress::-webkit-progress-value { background: #ff7c00;
                                    border-radius: 10px; 
                                    }
</style>
<script type="text/javascript" src="chrome.js"></script>
</head>
<body background="images/bg.jpg" bgproperties="fixed" style="font-family: arial;" onload="getdiv()">
<a href="main.php"><img src="images/logo.png" width="260" height="130" align="left" class="logo"/></a>
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

<?php
date_default_timezone_set("Asia/Kolkata");
require 'data_link.php';
$name=$_SESSION['Username'];
$sql="select user_id from user where user_name='$name'";
$sql_r=mysql_query($sql) or die(mysql_error());
$sql_f=mysql_fetch_row($sql_r);
$qry="select * from item_orders where (user_id=$sql_f[0] and completion='0')";
$res=mysql_query($qry) or die(mysql_error());
$item=array();
if(mysql_affected_rows()>0){
while($row=mysql_fetch_row($res))
{
    $dtime=$row[6];
    echo "<center><div style=\"border:1px solid; width:70%;\">";
    $a=$row[1];
    echo "<table cellpadding=10 border=0>";
    echo "<tr><td>Order Code:</td><td>".$row[0]."</td></tr>";
    echo "<tr><td>Order Date:</td><td>".$row[2]."</td></tr>";
    $time1=$row[5];
    $otime=date('h:i a',strtotime($time1));
    $dtime=date('h:i a',strtotime($dtime));
    $elapsed=time()-strtotime($time1);
?>
<script>
var a= parseInt('<?php echo $elapsed; ?>');
function bla()
{
    document.getElementById('<?php echo $row[0] ?>').value= a;
    a+=1;
    var x=document.getElementsByClassName('<?php echo $row[0] ?>');
    if (a<=600)
    x[0].innerHTML= "<b>Cooking</b>";
    else if (a>600 && a<=900)
    x[0].innerHTML= "<b>Packing</b>";
    else if (a>900 && a<1800)
    x[0].innerHTML= "<b>Out for delivery</b>";
    else
    x[0].innerHTML= "<b>Delivered</b>";
  /*  if (a>=1800)
    {
        var xh = new XMLHttpRequest;
        xh.onreadystatechange = function()
        {
            if(xh.readyState==4 && xh.status==200 )
            {
                x[0].innerHTML = xh.responseText;
            }
        }
        xh.open("post","test.php",true);
        xh.send();
    }*/
}

tim = setInterval(bla,1000);
</script>
<?php
    
    echo "<tr><td>Order Time:</td><td>".$otime."</td></tr>";
    echo "<tr><td>Expected Delivery Time:</td><td>".$dtime."</td></tr>";
    echo "<tr><td>Status:</td><td><progress max='1800' id='$row[0]' class='pr'></progress><br/><br>
    <center><span class='$row[0]'></span></center></td></tr>";
    $item=explode("+",$a);
    echo "<tr><td colspan=2>Items Ordered:</tr></table>";
    echo "<table cellpadding=20 cellspacing=0 align=center width=60% style=border-width:3px; border-style:solid;border-color: black;border-radius:5px;>";
    echo "<tr style=background-color:orange><th>Name<th>Price</tr><br>";
    foreach($item as $z=>$x)
    {
        $qry1="select * from items where item_code='$x'";
        $reso=mysql_query($qry1) or die(mysql_error());
        while($rowp=mysql_fetch_row($reso))
        {
            
            echo "<tr><td>".$rowp[1]."<td>"."Rs.".$rowp[2]."</tr>";
        }
    }
    echo "<tr style=background-color:#ffc04d><th>Total Cost:</td><th>Rs.".$row[3]."</td></tr>";
    echo "</div></td></tr>";
    echo "</table>";
    echo "<form method='post'>";
    echo "<button type='submit' name='cancel' value='$row[0]'style=\"margin-left:85%;width:100px;height:30px;background-color:#3366ff;color:white;border-radius:5px;\" onmouseover=\"this.style.background='#4775ff'\" onmouseout=\"this.style.background='#3366ff'\" onclick=\"return confirm('Cancel this order?');\">Cancel Order</button>";
    echo "</form>";
    echo "</div></center><br>";
}
}
else
echo "<br><br><span style=\"margin-top:50%;margin-left:40%;color:red;font-size:50px;\">Empty List</span><br><br><br><br><br>";
if(isset($_POST['cancel']))
{
    $cancel=$_POST['cancel'];
    $qry="delete from item_orders where order_code='$cancel'";
    mysql_query($qry) or die(mysql_error().mysql_errno());
    header('location:orders.php');
}
?>
</div>
<?php
require "footer.php";
?>
</body>
</html>d