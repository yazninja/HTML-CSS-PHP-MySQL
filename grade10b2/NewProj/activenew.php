
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
<link rel='stylesheet' type='text/css' href='css2.css'/>
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
<li><a href='activenew.php'> Active </a></li>
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
<li><a href='activenew.php'> Active </a></li>
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
";
}
}
}
mysql_close ($con);
?>
<?php
$con=mysql_connect('localhost','grade10b2','psdgrade10b2');
if (!$con)
{
die ('Could not connect'.mysql_error());
}
mysql_select_db('batch2-2017',$con);
$result=mysql_query("select * from product where status='' and type='drink'");
$num_rows=mysql_num_rows($result);

if ($num_rows<1)
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

while ($row=mysql_fetch_array($result))
{
$b=$row['barcode'];
$c=$row['name'];
$d=$row['qty'];
$e=$row['price'];
$f=$row['comp'];
$g=$row['type'];
echo '<tr>';
echo '<td width=50>' .$b. '</td>';
echo '<td width=150>' .$c. '</td>';
echo '<td width=10>' .$d. '</td>';
echo '<td width=10>' .$e. '</td>';
echo '<td width=100>' .$f. '</td>';
echo '<td width=15>' .$g. '</td>';
echo '</tr>';
}
echo '<td width=50>' .$b. '</td>';
echo '<td width=150>' .$c. '</td>';
echo '<td width=10>' .$d. '</td>';
echo '<td width=10>' .$e. '</td>';
echo '<td width=100>' .$f. '</td>';
echo '<td width=15>' .$g. '</td>';
echo '</tr>';
}

echo '</table>';
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
$b=$row2['barcode'];
$c=$row2['name'];
$d=$row2['qty'];
$e=$row2['price'];
$f=$row2['comp'];
$g=$row2['type'];
echo '<tr>';
echo '<td width=50>' .$b. '</td>';
echo '<td width=150>' .$c. '</td>';
echo '<td width=10>' .$d. '</td>';
echo '<td width=10>' .$e. '</td>';
echo '<td width=100>' .$f. '</td>';
echo '<td width=15>' .$g. '</td>';
echo '</tr>';
}
echo '</table>';
mysql_close($con);
}
?>

<div class="two">
<br> &copy; Grade 10-Batch 2 |2017| Batch Force
</div>




</body>
</html>
