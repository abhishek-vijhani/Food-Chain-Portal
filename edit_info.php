<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="chrome.js"></script>

<style type="text/css">
a.f:hover {background: #ff7c00;}
            
li.f1 a.f   {padding: 15px 50px 10px 50px;
        display: block;
        color:black;
        text-decoration: none;
        margin:0}
ul.f2   {list-style-type: none;
        font: arial bold;
        font-size: 20px;
        color:black;
        padding: 5px 0 0 0;
        }
</style> 

	<title>Fortune Wall</title>
</head>
<body bgproperties=fixed background="images/bg.jpg" style="background-repeat:no-repeat;background-scroll:off;">
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
<br /><br /><center><fieldset style="border-bottom: hidden;border-right: hidden;border-left: hidden;width:50%;border-color:black;border-width:3px;"><legend><h2>Edit Profile</h2></legend></fieldset></center>
<?php
$q=$_SESSION['Username'];
$sql="select * from user where user_name='$q'";
$res=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_row($res);
?>
<div style="width: 65%;margin-left: 20px;float: left;background: white;">
<form method="post">
<br /><br />
<center><table width="47%" cellspacing="3px" cellpadding="10px" style="alignment-adjust:auto; width: auto;">
<tr>
<td>Enter Full Name:</td><td><input type="text" name="fullname" required oninvalid="setCustomValidity('Full name is required')" oninput="setCustomValidity('')" autocomplete="off" value="<?php echo "$row[1]"; ?>"/> </td>
</tr>
<tr>
<td>Enter a User name:</td><td><input type="email" name="user" required oninvalid="setCustomValidity('User name is required')" oninput="setCustomValidity('')" autocomplete="off" value="<?php echo "$row[2]"; ?>" /></td>
</tr>
<tr>
<td>Address:</td><td><input size="30" height="20" name="add" value="<?php echo "$row[4]"; ?>"/></td>
</tr>
<tr>
<td>City:</td><td><input type="text" name="city" value="<?php echo "$row[5]"; ?>"/></td>  
</tr>
<tr>
<td>Pin Code:</td><td><input type="text" name="pincode" value="<?php echo "$row[6]"; ?>"/></td>
</tr>
<tr>
<td>Enter Mobile Number:</td><td><input type="text" maxlength="10" name="mobile" value="<?php echo "$row[7]"; ?>" /></td>
</tr>
<tr>
<td>Security Question:</td><td><select name="secques">
<option value="<?php echo "$row[9]"; ?>"><?php echo "$row[9]"; ?></option>
<option value="What was Your First Landline Number?">What was Your First Landline Number?</option>
<option value="What was the name of your childhood hero?">What was the name of your childhood hero?</option>
<option value="What was the name of your best childhood friend?">What was the name of your best childhood friend?</option>
<option value="What was the name of your first pet?">What was the name of your first pet?</option>
<option value="On which date you first met with your spouse?">On which date you first met with your spouse?</option>
<option value="What is the name of your favourite sibling?">What is the name of your favourite sibling?</option>
<option value="What is the name of your favorite childhood teacher?">What is the name of your favorite childhood teacher?</option>
<option value="What is the name of the company of your first job?">What is the name of the company of your first job?</option>
</select></td>
</tr>
<tr>
<td>Your answer:</td><td><input type="text" name="secans" placeholder="Answer" required autocomplete="off"/></td>
</tr>
</table></center>
<br /><br /><center><input type="submit" name="submit" value="Update"/>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" />
</form>
<br />
</div><br /><br />
<div style="float:left;background-color: #ffa73d;width:30%;display: block;">
<ul class="f2">
<li class="f1"><a href="changepass.php" class="f">Change Password</a></li>
<li class="f1"><a href="edit_info.php" class="f">Edit Profile</a></li>
<li class="f1"><a href="orders.php" class="f">View My orders</a></li>
<li class="f1"><a href="complete_orders.php" class="f">Completed Orders</a></li>
</ul>
</div>
<br/><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div></body>
<?php
require 'footer.php';
?>
</body>
</html>
<?php
require 'data_link.php';
if(isset($_POST['submit']))
{
    $q=$_POST['mobile'];
    $int_options = array("options"=>
    array("min_range"=>10, "max_range"=>10));
    $w=filter_var($q, FILTER_VALIDATE_INT, $int_options);
    if($w=='true')
    {
    continue;
    }
    else{
    echo "<font color=red size=3>*Please enter 10 digit number</font>";
}
    if(!empty($_POST['user']))
    {
        if($_POST['pass']==$_POST['repass'])
        {
        $full=$_POST['fullname'];
        $fullname=ucwords($full);
        $user=$_POST['user'];
        $address=$_POST['add'];
        $city=ucwords($_POST['city']);
        $pincode=$_POST['pincode'];
        $mobile=$_POST['mobile'];
        $secq=$_POST['secques'];
        $seca=$_POST['secans'];
        $qry="update user set full_name='$fullname,user_name='$user',address='$address',city='$city',pincode='$pincode',mobile_no='$mobile',security_question='$secq',answer='$seca') where user_name='$q'";
        mysql_query($qry) or die(mysql_error());
        echo "<script>alert('Profile updated successfully.')</script>";
    }
    else
    echo "<script>alert('All fields are mandatory')</script>";
    }
    else
    echo "<div align=center width=300px><font color=red>Username is mandatory.</font></div>";

}
?>