<html>
<head>
<title>Fortune Wall</title>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />

<script type="text/javascript" src="chrome.js"></script>
</head>

<body bgproperties=fixed background="images/bg.jpg" style="background-repeat:no-repeat;background-scroll:off;font-family:arial;">
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
?><br /><br />
<!-------------------- CONTENT ------------------->
<div id="foot2">
<table cellpadding= "80px" align="center">
<tr>
<td>
<h3 id="north">NORTH</h3>
<td>
<h3 id="south">SOUTH</h3>
</tr>
<tr id="foot"><td>
<h4><dl><dt>Ashok Vihar</dt></h4>
<dd>AA-111,Deep Cinema,<br />
Ashok Vihar,<br />
Delhi-110052<br />
Contact Number:989900XXXX<br /></dd>
<h4><dt>Rohini</dt></h4>
<dd>AB-111,Metro Walk,<br />
Rohini,<br />
Near Rithala Metro Station,<br />
Delhi-110085<br />
Contact Number:989900XXXX<br /></dd>
<h4><dt>Netaji Subhash Place</dt></h4>
<dd>Shop Number-123,<br />
Netaji Subhash Place,<br />
Near Netaji Subhash Place Metro Station,<br />
Delhi-110088<br />
Contact Number:989900XXXX<br /></dd>
  </td>

<td>

<h4>
<dt>Greater Kailash</dt></h4>
<dd>BA-111,Shop Number-123,<br />
Greater Kailash-2,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd>
<h4><dt>Saket</dt></h4>
<dd>BB-111,Select City,<br />
Saket-23,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd>
<h4><dt>Nehru Place</dt></h4>
<dd>Shop Number-124,<br />
Computer Market,<br />
Nehru Place,<br />
Near Nehru Place Metro Station,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd>
  
</td>
</tr>

<tr>
<td>

<h3 id="west">WEST</h3>
<td>
<h3 id="central">CENTRAL</h3>
</tr>
<tr id="foot"><td>
<h4><dt>Rajouri</dt></h4>
<dd>DA-111,Shop Number-1223,<br />
TDI Mall,<br />
Rajouri Garden,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd>
<h4><dt>Kirti Nagar</dt></h4>
<dd>DB-111,Shop Number-1234,<br />
Kirti Nagar Extension 1,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd>
<h4><dt>Janak Puri</dt></h4>
<dd>Shop Number-1254,<br />
Janak Puri-6,<br />
Near Tihar Jail,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd>
</td>

<td>
<h4><dt>Connaught Place</dt></h4>
<dd>Shop Number-1223,<br />
Connaught Place,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd>
<h4><dt>Sadar Bazar</dt></h4>
<dd>Shop Number-5772,<br />
Main Road,<br />
Sadar Bazar,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd>
<h4><dt>Janak Puri</dt></h4>
<dd>Shop Number-1254,<br />
Janak Puri-6,<br />
Near Tihar Jail,<br />
Delhi-1100XX<br />
Contact Number:989900XXXX<br /></dd></dl>

</td>
</tr>
</table></div>
<br /><br /></div>
<!---------------------FOOTER----------------->
<?php
require 'footer.php';
?>
</body>
</html>