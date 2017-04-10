<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="chrome.js"></script>
<style>
</style>

	<title>Form</title>
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
<br /><br /><center><fieldset style="border-bottom: hidden;border-right: hidden;border-left: hidden;width:50%;border-color:black;border-width:3px;"><legend><h2>Registration Form</h2></legend></fieldset></center>
<form method="post">
<br /><br />

<center><table width="47%" cellspacing="3px" cellpadding="10px" style="alignment-adjust:auto; width: auto;">
<tr>
<td>Enter Full Name:</td><td><input type="text" name="fullname" required oninvalid="setCustomValidity('Full name is required')" oninput="setCustomValidity('')" autocomplete="off" placeholder="Enter Full name"/> </td>
</tr>
<tr>
<td>Enter a User name:</td><td><input type="email" name="user" required oninvalid="setCustomValidity('User name is required')" oninput="setCustomValidity('')" autocomplete="off" placeholder="Enter e-mail ID" /></td>
</tr>
<tr>
<td>Enter Password:</td><td><input type="password" name="pass" required oninvalid="setCustomValidity('Password name is required and password must be 6-15 digits.')" oninput="setCustomValidity('')" placeholder="Enter password" min="6" maxlength="15" /></td>
</tr>
<tr>
<td>Re-Enter Password:</td><td><input type="password" name="repass" required oninvalid="setCustomValidity('Please re-enter password')" oninput="setCustomValidity('')" placeholder="Re-enter password"/></td>
</tr>
<tr>
<td>Address:</td><td><textarea rows="5" cols="20" name="add" placeholder="Enter address"></textarea></td>
</tr>
<tr>
<td>City:</td><td><input type="text" name="city" placeholder="Enter city"/></td>  
</tr>
<tr>
<td>Pin Code:</td><td><input type="text" name="pincode" placeholder="Enter pincode"/></td>
</tr>
<tr>
<td>Enter Mobile Number:</td><td><input type="text" maxlength="10" name="mobile" placeholder="Enter mobile no" /></td>
</tr>
<tr>
<td>Security Question:</td><td><select name="secques">
<option value="-1">---Select a Question---</option>
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
<br /><br /><center><input type="submit" name="submit" value="Register"/>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" />
</form>
<br /><br/><br />
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
    if(!empty($_POST['user'])&&!empty($_POST['repass']))
    {
        if($_POST['pass']==$_POST['repass'])
        {
        $full=$_POST['fullname'];
        $fullname=ucwords($full);
        $user=$_POST['user'];
        $pass=md5($_POST['repass']);
        $address=$_POST['add'];
        $city=ucwords($_POST['city']);
        $pincode=$_POST['pincode'];
        $mobile=$_POST['mobile'];
        $secq=$_POST['secques'];
        $seca=$_POST['secans'];
        $qry="insert into user (full_name,user_name,user_password,address,city,pincode,mobile_no,security_question,answer) values('$fullname','$user','$pass','$address','$city',$pincode,$mobile,'$secq','$seca')";
        mysql_query($qry) or die(mysql_error());
        echo "<script>alert('Data saved successful.')</script>";
    }
    else
    echo "<script>alert('Wrong password combination')</script>";
    }
    else
    echo "<div align=center width=300px><font color=red>Username,password are mandatory.</font></div>";

}
?>