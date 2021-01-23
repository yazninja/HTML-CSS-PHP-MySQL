
<?php
session_start();
$a=$_SESSION['username'];
$b=$_SESSION['password'];
$cash=$_POST['cash'];
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
$_SESSION['cash']=$cash;
}
if ($g!==$b)
{
$message= "Invalid Password.";
include 'index.php';
}
else
{
?>
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<title><?php echo $e. ' '.$d.'|| Sari-Sari Force';?> </title>
</head>
<body>
<?php
echo"<link rel='stylesheet' type='text/css' href='yazcss.css'/>
";?>
<?php
$h=$_SESSION['admin'];
if($h=='+')
{
echo"
<div class='border'>
<ul>
<li><a href='home.php'> Home </a></li>
<li><a href='new.php'> New </a></li>
<li><a href='edit.php'> Edit </a></li>
<li><a href='search.php'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='add.php'> Add Item </a></li>
<li><a href='remove.php'> Remove Item </a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
";
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
echo"
<div class='userpage'>
	<div class='grey'>
	<br>
	User Information
	</div>
	<img src=$c.jpg ><br>
	<h5 id='hi'><br>Name:
"; 
echo $e. ' '.$d;
echo"
	</h5>
	<h5>
"; 
echo"Position:"; 
echo $h; 
echo"</h5>
</div>
</div>
";
}
else if($h=='*')
{
echo"
<div class='border'>
<ul>
<li><a href='home.php'> Home </a></li>
<li><a href='new.php'> New </a></li>
<li><a href='edit.php'> Edit </a></li>
<li><a href='search.php'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='add.php'> Add Item </a></li>
<li><a href='remove.php'> Remove Item </a></li>
<li><a href='newcust.php'> Sales</a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='employ.php'> Add /Fire Employee</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
";
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
echo"
<div class='userpage'>
	<div class='grey'>
	<br>
	User Information
	</div>
	<img src=$c.jpg ><br>
	<h5 id='hi'><br>Name:
"; 
echo $e. ' '.$d;
echo"
	</h5>
	<h5>
"; 
echo"Position:"; 
echo $h; 
echo"</h5>
</div>
</div>

";
include'toprintdiv.php';
}
else
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='home.php'> Home </a></li>
<li><a href='newcust.php'> Sales</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
";
include 'toprintdiv.php';
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
echo"
<div class='userpage'>
	<div class='grey'>
	<br>
	User Information
	</div>
	<img src=$c.jpg ><br>
	<h5 id='hi'><br>Name:
"; 
echo $e. ' '.$d;
echo"
	</h5>
	<h5>
"; 
echo"Position:"; 
echo $h; 
echo"</h5>
</div>
</div>

";
}
}
}
?>
<div class='two'>
<br> &copy; Grade 10-Batch 2 |2017| Batch Force
</div>
<style>
button{
position:absolute;
left:300px;
top:200px;
display:none;
}
#print{
position:absolute;
left:300px;
top:200px;
}
</style>
<a id='print' href="toprintdiv.php" rel="noopener noreferrer" target="_blank">Preview Receipt</a>



</body>
</html>
