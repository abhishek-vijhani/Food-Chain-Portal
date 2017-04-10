<html>
<head>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />
<script type="text/javascript" src="chrome.js"></script>
</head>
<body bgproperties=fixed background="images/bg.jpg" style="background-repeat:no-repeat;background-scroll:off;font-family: arial;">
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
<form method="post">
<br /><br />
<center><table width="40%" cellspacing="10px">
<tr>
<td>Full Name:</td><td><input type="text" name="name" required oninvalid="setCustomValidity('User name is required')" oninput="setCustomValidity('')" autocomplete="off" placeholder="Enter Full Name"/></td>
</tr>
<tr>
<td>Address:</td><td><textarea rows="5" cols="20" name="address" placeholder="Enter Address"></textarea></td>
</tr>
<tr>
<td>Mobile Number:</td><td><input type="text" maxlength="10" name="mobile" placeholder="Enter mobile no"/></td>
</tr>
<tr>
<td>Date of Birth:</td><td><input type="date" name="cal" /></td>
</tr>
<tr>
<td>Education:</td><td><input type="text" name="edu" placeholder="Enter Qualification"/></td>
</tr>
<tr>
<td>Interested:</td><td><select name="intrested">
<option value="-1">---Select---</option>
<option value="internship">Internship</option>
<option value="fulltime">Full Time</option>
<option value="parttime">Part Time</option>
</select></td>
</tr>
<tr>
<td>Experience:</td><td><input type="text" name="exp" placeholder="Enter Years Of Experience"/></td>
</tr>
<tr>
<td>Outlet:</td><td><select name="outlet">
<option value="-1">--Select--</option>
<optgroup label="North">
<option value="Ashok Vihar">Ashok Vihar</option>
<option value="Rohini">Rohini</option>
<option value="Netaji Subhash Place">NSP</option>
</optgroup>
<optgroup label="South">
<option value="Greater Kailash">GK</option>
<option value="Saket">Saket</option>
<option value="Nehru Place">Nehru Place</option>
</optgroup>
<optgroup label="West">
<option value="Rajori">Rajori</option>
<option value="Kirti Nagar">Kirti Nagar</option>
<option value="Janakpuri"> Janak Puri</option>
</optgroup>
<optgroup label="Central">
<option value="Connaught Place">CP</option>
<option value="Sadar Bazar">Sadar Bazar</option>
<option value="Karol Bagh">Karol Bagh</option>
</optgroup>
</select></td>
</tr>
<tr>
<td>E-Mail Id:</td><td><input type="email" name="email" placeholder="Enter email id"/> </td>
</tr>
</table>
</center>
<br/><br/><center><input type="submit" name="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"/></center>
</form>

<?php
require 'data_link.php';
if(isset($_POST['submit']))
{
    if(!empty($_POST['name']) && !empty($_POST['email']))
    {
        $user=$_POST['name']; 
        $dob=$_POST['cal'];
        $address=$_POST['address'];
        $mobile=$_POST['mobile'];
        $edu=$_POST['edu'];
        $intrest=$_POST['intrested'];
        $exp=$_POST['exp'];
        $outlet=$_POST['outlet'];
        $email=$_POST['email'];
        $qry="insert into employee (name,address,mobile_no,date_of_birth,education,interested,experience,outlet,email_id) values ('$user','$address',$mobile,'$dob','$edu','$intrest','$exp','$outlet','$email')";
        mysql_query($qry) or die(mysql_error());
        echo "<script>alert('Data saved successfully.')</script>";
    }
    else
    echo "<div align=center width=300px><font color=red>name,email are mandatory.</font></div>";
}
?><br /><br /></div>
<?php require 'footer.php'; ?>
</body>
</html>