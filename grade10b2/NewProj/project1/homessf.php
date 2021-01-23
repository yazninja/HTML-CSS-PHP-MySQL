<html>
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<title><?php echo $e. ' '.$d.'|| Sari-Sari Force';?> </title>
<style>
p { 
  text-indent:2em;
}
.Vision p{
       color:rgb(91,80,76);
	text-align:justify;	
}
.Vision{
position:absolute;
        height:475px;
        width:300px;
        top:10%;
        left:350px;
        font: 95% Arial, Helvetica, sans-serif;
   max-width: 400px;
    margin: 10px auto;
    padding: 16px;
 background-color:rgb(222,219,214);
       z-index:0; 
        position:absolute;
}
.Vision h1{
         background-color:rgb(91,80,76);
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.Mission p{
       color:rgb(91,80,76);
        text-align:justify;
}
.Mission{
position:absolute;
        height:475px;
        width:300px;
        top:10%;
        left:800px;
        font: 95% Arial, Helvetica, sans-serif;
   max-width: 400px;
    margin: 10px auto;
    padding: 16px;
 background-color:rgb(222,219,214);
       z-index:0;
        position:absolute;
}
.Mission h1{
         background-color:rgb(91,80,76);
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
</style>

</head>
<body>
<body style="margin: 0;">
<?php
session_start();
$a=$_SESSION['username'];
$b=$_SESSION['password'];
$con=mysql_connect ("localhost", "grade10b2", "psdgrade10b2");
if (!$con)
{
die ('Could not connect:' .mysql_error ());
}
mysql_select_db ("batch2-2017", $con);
$result=mysql_query ("select * from  admin2 where username='$a'");
$num_rows=mysql_num_rows($result);
if ($num_rows<1)
{
$message='No Record Found';
include 'index.php';
}
else
{
while ($row=mysql_fetch_array($result))
{
$c=$row['username'];
$d=$row['fname'];
$e=$row['gname'];
$f=$row['mname'];
$g=$row['password'];
$h=$row['admin'];
$_SESSION['username']=$c;
$_SESSION['password']=$g;
$_SESSION['admin']=$h;
}
if ($g!==$b)
{
$message= "Invalid Password.";
include 'index.php';
}
else
{
if($h=='+')
{
$h='Warehouse Manager';
}
else if($h=='-')
{
$h='Cashier';
}
else if($h=='*')
{
$h='Admin';
}
else
{
$h='Error 404';
}
?>
<link rel='stylesheet' type='text/css' href='css2.css'/>
<title><?php echo $e. ' '.$d.'|| Sari-Sari Force';?> </title>
</head>
<body>
<?php
echo"<link rel='stylesheet' type='text/css' href='yazcss.css'/>
<div class='userpage'>
<div class='grey'>
<br>
User Information
</div>
<img src=bakhala.jpg ><br>
<h5 id='hi'><br>Name:";?> <?php echo $e. ' '.$d;?></h5>
<h5><?php echo"Position:";?> <?php echo $h;?></h5>
</div>";
<?php
$h=$_SESSION['admin'];
if($h=='+')
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='homessf.php'> Home </a></li>
<li><a href='new3.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='search1.php'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall2.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='additemv.php'> Add Item </a></li>
<li><a href='removeitem.php'> Remove Item </a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
<div class='Vision'>
<h1><b>Vision</b> </h1><br>
<br><br>
<br>

<p><i>Super B. Bakhala</i> is friendly, advanced,
and grows a modernized take on different
student skills. It aims to combine all different
people's, with different backgrounds, techniques and skills
in order to produce a service that is
pro-environment, pro-people, pro-God and pro-nation.</p>
</div>
<div class='Mission'>
<h1><b>Mission</b></h1><br>
<br><br>
<br>

<p><i>Super B. Bakhala</i> aims to remove inequal
ideologies and aims to accept, enhance and improve
different skills while maintaining its core objective
of being a pro-environment, pro-people, pro-God and pro-nation
service, while all the way enhancing student knowledge and wisdom
as a whole.</p>
</div>

";
}
else if($h=='*')
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='homessf.php'> Home </a></li>
<li><a href='new3.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='search1.php'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall2.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='additemv.php'> Add Item </a></li>
<li><a href='removeitem.php'> Remove Item </a></li>
<li><a href='newcust.php'> Sales</a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='employ.php'> Add /Fire Employee</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
<div class='Vision'>
<h1><b>Vision</b> </h1><br>
<br><br>
<br>

<p><i>Super B. Bakhala</i> is friendly, advanced
and grows off a modernized take on different
student skills. It aims to combine different
people's, with different backgrounds, techniques and skills
in order to produce a service that is
pro-environment, pro-people, pro-God and pro-nation.</p>
</div>
<div class='Mission'>
<h1><b>Mission</b></h1><br>
<br><br>
<br>

<p><i>Super B. Bakhala</i> aims to remove inequal
ideologies and aims to accept, enhance and improve
different skills while maintaining its core objective
of being a pro-environment, pro-people, pro-God and pro-nation
service, while all the way enhancing student knowledge and wisdom
as a whole.</p>
</div>

";
}
else
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='homessf.php'> Home </a></li>
<li><a href='newcust.php'> Sales</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
";
}
}
}
mysql_close($con);
?>
<div class="two">
<br> &copy; Grade 10-Batch 2 |2017| Batch Force
</div>
</html>
</body>

