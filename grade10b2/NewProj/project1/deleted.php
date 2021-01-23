<html>
<head>
<style>
table{
	position: relative;
	margin: auto;
	margin-left: 0px;
	margin-right: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
}
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
</head>
<body>
<?php
$a=$_POST['d'];
$con=mysql_connect("localhost","grade10b2","psdgrade10b2");
if(!$con)
{
die('Could not connect:'.mysql_error());
}
else
{
echo'';
}
mysql_select_db("batch2-2017",$con);
$sql=mysql_query("update product set status='*' where barcode='$a'");
$result=mysql_query("select * from product where barcode='$a'");
$num_rows=mysql_num_rows($result);
if($num_rows<1)
{
echo 'NO RECORD FOUND';
}
else
{
echo"
<table border='1'>
<tr>
<th> Barcode </th>
<th> Name </th>
<th> Qty </th>
<th> Price </th>
<th> Company </th>
<th> Type </th>
</tr>";
}
while ($row=mysql_fetch_array($result))
{
echo"<tr>";
echo"<td>" .$row['barcode']. "</td>";
echo"<td>" .$row['name']. "</td>";
echo"<td>" .$row['qty']. "</td>";
echo"<td>" .$row['price']. "</td>";
echo"<td>" .$row['comp']. "</td>";
echo"<td>" .$row['type']. "</td>";
echo"</tr>";
echo "Item Deleted";
}
echo"</table>";
mysql_close($con);
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
<li><a href='homessf.php'> Home </a></li>
<li><a href='new3.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='search1.php'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li id='active'><a href='delete.php'> Delete </a></li>
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
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li id='active'><a href='delete.php'> Delete </a></li>
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
