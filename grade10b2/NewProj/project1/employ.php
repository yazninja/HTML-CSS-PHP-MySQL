<?php
session_start();
$userkaputanginamo=$_POST['user'];
$passnapoako=$_POST['password'];
$fuckname=$_POST['fname'];
$gagoname=$_POST['gname'];
$motherfucker=$_POST['mname'];


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
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<title><?php echo $e. ' '.$d.'|| Sari-Sari Force';?> </title>
<link rel='stylesheet'type='text/css' href='yazcss.css'/>
</head>
<body>
<div class='userpage'>
<div class='grey'>
<br>
User Information
</div>
<img src="<?php echo $c;?>.jpg" ><br>
<h5 id='hi'><br>Name: <?php echo $e. ' '.$d;?></h5>
<h5><?php echo"Position:";?> <?php echo $h;?></h5>
</div>";
<?php
$h=$_SESSION['admin'];
if($h=='+')
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='home.php'> Home </a></li>
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
</div>
";
include'homeno.php';
/* Include Codes for Admin users Here*/
}
else if($h=='*')
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='home.php'> Home </a></li>
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
</div>
";
include'homeno.php';
/* Include Codes for Admin Users Here*/
echo"
<div class='form-style-6'>
<h1> Add An Employeee</h1><br>
<form action='employ.php' method='post'>
<input type='text' name='user' placeholder='Username' required><br>
</div>";
$check=mysql_query ("select * from  admin2 where username='$userkaputanginamo'");
$num_check=mysql_num_rows($check);
if ($num_check<1)
{
echo"
<div class='form-style-6'>
<h1> Add An Employeee</h1><br>
<form action='employ.php' method='post'>
<input type='text' name='user' placeholder='Username' required><br>
<input type='text' name='gname' placeholder='First Name' required><br>
<input type='text' name='mname' placeholder='Middle Name' required><br>
<input type='text' name='fname' placeholder='Last Name' required><br>
<input type='password' name='pass' placeholder='Password' required><br>
<input type='password' name='pass' placeholder='Retype Password' required><br>
<select name='do'><option value='rem'>Fire</option><option value='adm'>Promote To Admin</option>
<option value='sale'>Promote To Slaes</option>
<option value='war'>Promote To Warehouse</option>
<input type='submit' value='Submit'>
</form>
</div>";
}
}
else
{
echo"
<div class='border'>
<ul>
<li><a href='home.php'> Home </a></li>
<li id='active'><a href='newcust.php'> Sales</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
";
include'homeno.php';
/* Include codes for Sales users Here */
}
}
}
?>

<div class="two">
<br> &copy; Grade 10-Batch 2 |2017| Batch Force
</div>



</body>
</html>

