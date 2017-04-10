<html>
<head>
<title>Fortune Wall</title>
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="basic.css" />
<link rel="stylesheet" type="text/css" href="chromestyle.css" />
<script type="text/javascript" src="chrome.js"></script>
<script type="text/javascript">
function big(x)
{
    x.style.height="300px";
}
function normal(x)
{
    x.style.height="200px";
}
function bigImg(x)
{
    x.style.height="250px";
    x.style.align="middle";
    x.style.border="8px solid #fcf1bd";
    x.style.borderRadius="10px";
}

function normalImg(x)
{
    x.style.height="200px";
    x.style.border="1px white";
    x.style.borderRadius=0;
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
<center>
<!---------------------SLIDER------------------>
<br />

<iframe src="index.html" style="width:1050px;height:457px;max-width:100%;overflow:hidden;border:none;padding:0;margin:0 auto;display:block;" marginheight="0" marginwidth="0"></iframe>
<br /><br />


<!---------------------CONTENT------------------>

<table cellpadding=20 style="margin-left:120px;margin-right: 120px; ">
<tr style="font-size: 23;color: darkred;">
<th style="border-right: 2px black solid;"><i>Appetizing food at the best restaurants in Delhi!</th>
<th style="border-right: 2px black solid;"><i>Fantastic dining experience in the soothing ambience!</th>
<th><i>Glimpse of Indian tradition and culture</th>
</tr>
<tr style="font-size: 17;">
<td>Fortune Wall is a contemporary Non Vegetarian / Vegetarian restaurant brand and a perfect destination for all day dining and entertaining, breakfast, lunch and dinner in Delhi.</td>
<td>Over the years, the restaurant has grown into casual, family-oriented and a fine dining restaurants in NCR. We offer wholesome dishes that are cooked with right herbs, spices, flavours and textures.</td>
<td>For serving superior quality food at fair prices, Fortune Wall Restaurant is reckoned among the best vegetarian restaurants in Delhi. To cook delicious vegetarian food, Suruchi has some of the finest and experienced chefs.</td>
</tr>
</table>
<br /><br />
<!------------------MARQUEE------------------->
<font size="5" style="font-family:arial;">
<fieldset style="border-bottom: hidden;border-right: hidden;border-left: hidden;width:50%;border-color:black"><legend>Today's Special:</legend></fieldset>
</font><br /><br />
<marquee height="200" onmouseover="this.stop() & big(this)" onmouseout="this.start() & normal(this)" class="marq">
<img src="images/mar1.jpg" height="200" onmouseover="bigImg(this)" onmouseout="normalImg(this)" align="middle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/mar2.jpg" height="200" onmouseover="bigImg(this)" onmouseout="normalImg(this)" align="middle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/mar3.jpg" height="200" onmouseover="bigImg(this)" onmouseout="normalImg(this)" align="middle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/mar4.jpg" height="200" onmouseover="bigImg(this)" onmouseout="normalImg(this)" align="middle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/mar5.jpeg" height="200" onmouseover="bigImg(this)" onmouseout="normalImg(this)" align="middle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/mar6.jpg" height="200" onmouseover="bigImg(this)" onmouseout="normalImg(this)" align="middle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/mar7.jpg" height="200" onmouseover="bigImg(this)" onmouseout="normalImg(this)" align="middle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
/</marquee>
<br /><br /><br /></div>
<!---------------------FOOTER----------------->
<?php
require 'footer.php';
?>
</center>
<body>
</html>