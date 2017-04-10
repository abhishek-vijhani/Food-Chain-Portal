<html>
<head>
<title>Contact Us</title>

<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="chrome.js"></script>
<script language="javascript">
function popup()
{
    window.alert("Thank You, We Will Come Back To You Shortly.");
}
</script>


</head>

<body>
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
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</h1>
<form method="post">
<table width="60%" cellspacing="5px" align="center">
<tr>
<td>First name:</td><td><input type="text" name="first" required  oninvalid="setCustomValidity('First name is required')" oninput="setCustomValidity('')" autocomplete="off" /></td>
</tr>
<tr>
<td>Last name:</td><td><input type="text" name="last" required  oninvalid="setCustomValidity('last name is required')" oninput="setCustomValidity('')" autocomplete="off" /></td>
</tr>
<tr>
<td>Enter Mobile Number:</td><td><input type="text" maxlength="10"/></td>
</tr>
<tr>
<td>Enter Your Email ID:</td><td><input type="text" name="user" required oninvalid="setCustomValidity('Email ID is required')" oninput="setCustomValidity('')" autocomplete="off" /></td>
</tr>
<tr>
<td>Queries:</td><td><textarea rows="5" cols="20"></textarea></td>
</tr>



</table>
<br /><br /><center><input type="submit" name="submit" value="Submit" onclick="popup()" />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" />
<br /><br />

</form>


</body>
</html>