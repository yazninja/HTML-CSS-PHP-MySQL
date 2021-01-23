<html>
<head>
<title></title>
</head>
<body>
<?php
session_start();
$con=mysql_connect ("localhost", "grade10b2", "psdgrade10b2");
if (!$con)
{
die ('Could not connect:' .mysql_error ());
}
mysql_select_db ("batch2-2017", $con);
$result=mysql_query ("select * from admin2 where username='$a'");
$num_rows=mysql_num_rows($result);
if ($num_rows<1)
{
echo "<div class='message'><h1>Invalid Username</h1></div>";
include 'login.html';
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
$_SESSION['username']=$c;
$_SESSION['password']=$d;
$_SESSION['admin']=$e;
}
if ($g!==$b)
{
echo "<div class='message'><h1>Password or Username Incorrect</h1></div>";
include 'login.html';
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='ssf.css'/>
<title><?php echo $e. ' '.$d.' || Sari-Sari Force';?> </title>
</head>
<body>
<div class='banner'>
<p> Main Page </p>
</div>



<?php
if($h=='+')
{
?>
<div class='tabs'>
<ul>
<li id='home'><a href='ssf.php'> Home </a></li>
<li ><a href='newnew.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='#'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall2.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='additemv.php'> Add Item </a></li>
<li><a href='#'> Remove Item </a></li>
<li><a href='#'> Upload </a></li>
<li><a href='newcust.php'> Sales</a></li>
<li><a href='login.html'> Log Out </a></li>
</ul>
</div>
<?php
}
else
{
?>
<div class='tabs'>
<ul>
<li id='home'><a href='ssf.php'> Home </a></li>
<li><a href='newnew.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='#'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall2.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='additemv.php'> Add Item </a></li>
<li><a href='#'> Remove Item </a></li>
<li><a href='#'> Upload </a></li>
<li><a href='login.html'>Log Out </a></li>
</ul>
</div>
<?php
/*<div class='formjun'>
<form action="upload1.php" method="post" name="form1" enctype="multipart/form-data">

<input type="file" name="f1" accept="image/*" required><br><br>
<input type="text" name="barcode" placeholder="Scan Barcode" size='33' required/><br><br>
<input type="submit" name="submit1" value="Upload">

</form>*/
}
}
}
mysql_close ($con);
?>
