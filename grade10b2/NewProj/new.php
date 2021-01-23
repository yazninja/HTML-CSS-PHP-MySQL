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
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<title><?php echo $e. ' '.$d.' || Sari-Sari Force';?> </title>
<style>
.form-style-6 input[type="number"],
.form-style-6 select
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.form-style-6 input[type="number"]:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #D0883C;
    padding: 3%;
    border: 1px solid #D0883C;
}
</style>
</head>
<body>
<?php
echo"<link rel='stylesheet' type='text/css' href='yazcss.css'/>
<div class='userpage'>
<div class='grey'>
<br>
User Information
</div>
<img src=$c.jpg ><br>
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
<li><a href='home.php'> Home </a></li>
<li id='active'><a href='new.php'> New </a></li>
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
echo"<div class='form-style-6'>
<h1> New Product </h1><br>
<form action='new2.php' method='post'>
<input type='text' name='a' placeholder='Name' required><br>
<input type='number' name='b' placeholder='Quantity' required><br>
<input type='number' name='c' placeholder='Price' required><br>
<input type='text' name='d' placeholder='Company' required><br>
<select name='depa'> <option value='FT'> Food Technology </option><option value='CP'>Computer Programming </option>
<option value='CSS'> Computer Hardware Servicing </option> </select>
<select name='choice'> <option value='food'> Food</option> <option value='drink'> Drink </option>  <option value='others'> Others </option>  </select>
<input type='number' name='f' Placeholder='Barcode' required><br>
<input type='submit' value='Submit'>
</form>
</div>";
}
else if($h=='*')
{
echo"
<div class='border'>
<ul>
<li><a href='home.php'> Home </a></li>
<li id='active'><a href='new.php'> New </a></li>
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
echo"<div class='form-style-6'>
<h1> New Product </h1><br>
<form action='new2.php' method='post'>
<input type='text' name='a' placeholder='Name' required><br>
<input type='number' name='b' placeholder='Quantity' required><br>
<input type='number' name='c' placeholder='Price' required><br>
<input type='text' name='d' placeholder='Company' required><br>
<select name='depa'> <option value='FT'> Food Technology </option><option value='CP'> Programming </option>
<option value='CT'> Civil Technology </option> <option value='CHS'> Computer Hardware Servicing </option> </select>
<select name='choice'> <option value='food'> Food</option> <option value='drink'> Drink </option>  <option value='others'> Others </option>  </select>
<input type='number' name='f' Placeholder='Barcode' required><br>
<input type='submit' value='Submit'>
</form>
</div>";
}
else
{
echo"
<div class='border'>
<ul>
<li><a href='home.php'> Home </a></li>
<li><a href='newcust.php'> Sales</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
";

}
}
}
?>

<div class="two">
<br> &copy; Grade 10-Batch 2 |2017-2018| Batch Force
</div>


</body>
</html>
