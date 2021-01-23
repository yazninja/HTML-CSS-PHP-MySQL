<?php
session_start();
$a=$_POST['user'];
$b=$_POST['pass'];
$a='sbbinventory';
$b='12354';
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
$_SESSION['password']=$d;
$_SESSION['admin']=$e;
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
if($h=='+')
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='homessf.php'> Home </a></li>
<li><a href='new3.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='#'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall2.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='additemv.php'> Add Item </a></li>
<li><a href='#'> Remove Item </a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='newcust.php'> Sales</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
<div class='form-style-6'>
<h1> Connected </h1><br>

";
}
else
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='homessf.php'> Home </a></li>
<li><a href='new3.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='#'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall2.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='additemv.php'> Add Item </a></li>
<li><a href='#'> Remove Item </a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
<div class='form-style-6'>
<h1> New Product </h1><br>
<form action='new.php' method='post'> 
<input type='text' name='a' placeholder='Name'><br>
<input type='text' name='b' placeholder='Quantity'><br>
<input type='text' name='c' placeholder='Price'><br>
<input type='text' name='d' placeholder='Company'><br>
<input type='text' name='e' placeholder='Department'><br>
<select name='choice'> <option value='food'> Food</option> <option value='drink'> Drink </option> </select>
<input type='text' name='f' Placeholder='Barcode'><br>
<input type='submit' value='Submit'>
</form>
</div>
";
}
}
}
mysql_close ($con);
?>



<div class="two">
<br> &copy; Grade 10-Batch 2 |2017| Batch Force
</div>




</body>
</html>
