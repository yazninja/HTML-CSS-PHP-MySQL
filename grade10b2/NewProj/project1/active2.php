<html>
<head>
<style>
*{margin:0px;}

tr,td{width:70px;height:35px;}
td,TH{	
	text-align:center;
	vertical-line:top;
	border:4px solid rgb(89,79,77);
;}

th{
	background-color:rgb(89,79,77);
	color:white;

}

table{
border-collapse:collapse;
left:33%;
top:68px;
POSITION:relative;
}

tr:nth-child(odd){
background-color:rgb(222,219,214);
}

tr:nth-child(even){
color:white;
background-color:rgb(209,137,65);
}

tr:hover{
color:brown;

}

td:hover{
color:rgb(73,85,91);

}
</style>
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<title><?php echo $e. ' '.$d.'|| Sari-Sari Force';?> </title
</head>
<body>

<?php
$con=mysql_connect('localhost','grade10b2','psdgrade10b2');
if (!$con)
{
die ('Could not connect'.mysql_error());
}
mysql_select_db('batch2-2017',$con);
$result=mysql_query("select * from product where status=' ' and type='drink'");
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
mysql_close ($con);
?>
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
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<div class='userpage'>
<div class='grey'>
<br>
User Information
</div>
<img src=name.jpg ><br>
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
<li><a href='Home.php'> Home </a></li>
<li><a href='new3.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='search1.php'> Search </a></li>
<li id='active'><a href='active.php'> Active </a></li>
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
";
}
else if($h=='*')
{
echo"
<div class='border'>
<ul>
<li><a href='homessf.php'> Home </a></li>
<li><a href='new3.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='search1.php'> Search </a></li>
<li id='active'><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall2.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='additemv.php'> Add Item </a></li>
<li><a href='#'> Remove Item </a></li>
<li><a href='newcust.php'> Sales</a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='employ.php'> Add /Fire Employee</a></li>
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
<br> &copy; Grade 10-Batch 2 |2017| Batch Force
</div>



</body>
</html>



<div class="two">
<br> &copy; Grade 10-Batch 2 |2017| Batch Force
</div>

</body>
</html>
                                                   


