<html>
<head>
<style>
* {
    margin=0%;
}
.cons{
   
   height=50px;
   width=50px;
   position=absolute;
   top=10px;
   bottom=10px;
   left=10px;
   right=10%;
}
</style>
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
</head>
<body>
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
<li><a href='new.php'> New </a></li>
<li><a href='edit.php'> Edit </a></li>
<li><a href='search.php'> Search </a></li>
<li id='active'><a href='active.php'> Active </a></li>
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
$result=mysql_query("select * from product where status=' ' and type='drink'");
$num_rows=mysql_num_rows($result);

if ($num_rows<1)
{
echo "No Record Found";
}
else
{
echo '<div class=cons>
<div class=scrolltable>
<table class=header>
<th> Barcode </th>
<th> Name </th>
<th> Quantity </th>
<th> Price </th>
<th> Company </th>
<th> Type </th></table>
';

while ($row=mysql_fetch_array($result))
{
$b=$row['barcode'];
$c=$row['name'];
$d=$row['qty'];
$e=$row['price'];
$f=$row['comp'];
$g=$row['type'];
echo '<div class="body"><table><tr>';
echo '<td>' .$b. '</td>';
echo '<td>' .$c. '</td>';
echo '<td>' .$d. '</td>';
echo '<td>' .$e. '</td>';
echo '<td>' .$f. '</td>';
echo '<td>' .$g. '</td>';
echo '</tr>';
}

echo '</table></div></div></div>';
}
echo '<br>';

$result2=mysql_query("select * from product where status='' and type='food'");
$num_rows2=mysql_num_rows($result2);

if ($num_rows2<1)
{
echo "No Record Found";
}
else
{
echo '<table border=1>
<tr>
<th> Barcode </th>
<th> Name </th>
<th> Quantity </th>
<th> Price </th>
<th> Company </th>
<th> Type </th>
</tr>';

while ($row2=mysql_fetch_array($result2))
{
$h=$row2['barcode'];
$i=$row2['name'];
$j=$row2['qty'];
$k=$row2['price'];
$l=$row2['comp'];
$m=$row2['type'];
echo '<tr>';
echo '<td width=50>' .$h. '</td>';
echo '<td width=150>' .$i. '</td>';
echo '<td width=10>' .$j. '</td>';
echo '<td width=10>' .$k. '</td>';
echo '<td width=100>' .$l. '</td>';
echo '<td width=15>' .$m. '</td>';
echo '</tr>';
}
}
echo '</table>';
}
else if($h=='*')
{
echo"
<div class='border'>
<ul>
<li><a href='home.php'> Home </a></li>
<li><a href='new.php'> New </a></li>
<li><a href='editculmi.php'> Edit </a></li>
<li><a href='search.php'> Search </a></li>
<li id='active'><a href='active.php'> Active </a></li>
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
$result=mysql_query("select * from product where status=' ' and type='drink'");
$num_rows=mysql_num_rows($result);

if ($num_rows<1)
{
echo "No Record Found";
}
else
{
echo '<div class=cons>
<div class=scrolltable>
<table class=header>
<th width="83"> Barcode </th>
<th width="83"> Name </th>
<th width="83"> Quantity </th>
<th width="83"> Price </th>
<th width="83"> Company </th>
<th width="83"> Type </th>
</table>
';

while ($row=mysql_fetch_array($result))
{
$b=$row['barcode'];
$c=$row['name'];
$d=$row['qty'];
$e=$row['price'];
$f=$row['comp'];
$g=$row['type'];
echo '<div class="body"><table class="body"><tr>';
echo '<td width="83">' .$b. '</td>';
echo '<td width="83">' .$c. '</td>';
echo '<td width="83">' .$d. '</td>';
echo '<td width="83">' .$e. '</td>';
echo '<td width="83">' .$f. '</td>';
echo '<td width="83">' .$g. '</td>';
echo '</tr>';
}

echo '</table></div></div></div>';
}
echo '<br>';

$result2=mysql_query("select * from product where status='' and type='food'");
$num_rows2=mysql_num_rows($result2);

if ($num_rows2<1)
{
echo "No Record Found";
}
else
{
echo '<table border=1>
<tr>
<th> Barcode </th>
<th> Name </th>
<th> Quantity </th>
<th> Price </th>
<th> Company </th>
<th> Type </th>
</tr>';

while ($row2=mysql_fetch_array($result2))
{
$h=$row2['barcode'];
$i=$row2['name'];
$j=$row2['qty'];
$k=$row2['price'];
$l=$row2['comp'];
$m=$row2['type'];
echo '<tr>';
echo '<td width=50>' .$h. '</td>';
echo '<td width=150>' .$i. '</td>';
echo '<td width=10>' .$j. '</td>';
echo '<td width=10>' .$k. '</td>';
echo '<td width=100>' .$l. '</td>';
echo '<td width=15>' .$m. '</td>';
echo '</tr>';
}
}
echo '</table>';
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
                                                   


