<html>
<head> <link rel='stylesheet' type='text/css' href='cssnew.css'/>
</head>
<body>


<?php
$con=mysql_connect('localhost','grade10b2','psdgrade10b2');
if (!$con)
{
die ('Could not connect'.mysql_error());
}
mysql_select_db('batch2-2017',$con);

$addqty=$_POST['qty'];
$addbr=$_POST['br'];
$resultadd=mysql_query("select * FROM product where barcode='$addbr'");

while ($row3=mysql_fetch_array($resultadd))
{
$x=$row3['qty'];
}
$add=$addqty+$x;

$sql1=mysql_query("update product set qty='$add' where barcode='$addbr'");

if(!$sql1)
{
die ('Error:' .mysql_error());
}
else
{
echo " Database Updated";
}$result=mysql_query("select * from product where status=' ' and type='drink'");
$num_rows=mysql_num_rows($result);
if ($num_rows<1)
{
echo" No record Found ";
}
else
{

echo "

<table border='1'>
<tr class='act'> <th> Barcode </th>
<th> Name </th>
<th> Quantity </th>
<th> Price </th>
<th> Company </th>
<th> Type </th> </tr>";

while ($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" .$row ['barcode']. "</td>";
echo "<td>" .$row ['name']. "</td>";
echo "<td>" .$row ['qty']. "</td>";
echo "<td>" .$row ['price']. "</td>";
echo "<td>" .$row ['comp']. "</td>";
echo "<td>" .$row ['type']. "</td>";
echo "</tr>";
}
echo'</table>';
}
echo '<br>';
?>
</body>
</html>
<html>
<head>

</head>
<body>


<?php
$result2=mysql_query("select * from product where status=' ' and type='food'");

$num_rows2=mysql_num_rows($result2);
if ($num_rows2<1)
{
echo" No record Found ";
}
else
{
echo "<table border='1'>
<tr class='act'> <th> Barcode </th>
<th> Name </th>
<th> Quantity </th>
<th> Price </th>
<th> Company </th>
<th> Type </th> </tr>";

while ($row2=mysql_fetch_array($result2))
{
echo "<tr>";
echo "<td>" .$row2 ['barcode']. "</td>";
echo "<td>" .$row2 ['name']. "</td>";
echo "<td>" .$row2 ['qty']. "</td>";
echo "<td>" .$row2 ['price']. "</td>";
echo "<td>" .$row2 ['comp']. "</td>";
echo "<td>" .$row2 ['type']. "</td>";
echo "</tr>";
}
echo'</table>';


}
echo'<br>';
?>
<form action='additeminv1.php' method='post'/>
<input type='text' name='qty' placeholder='Quantity' required>
<input type='text' name='br' placeholder='Barcode' required>
<input type='submit' value=' Add '>
</form>
</body>
</html>

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
