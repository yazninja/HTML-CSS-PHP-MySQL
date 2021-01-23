<html>
<head>
<style> 
table{
	position:relative;
        margin:auto;
	margin-left:0px;
	margin-right:0px;
	margin-top:-13%;
	margin-bottom:0px;
}
p{
	position: absolute;
	margin:auto;
        margin-left:46%;
        margin-right:0px;
        margin-top:0px;
        margin-bottom:0px;

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
#no{
	background-color: rgb(89,79,77);
	color: white;
}
</style>
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
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<style>
.border{
animation:none;
}
.two{
	animation:none;
}
</style>
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
<li><a href='new2.php'> New </a></li>
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
/* Include Codes for Warehouse users Here*/
$d=$_POST['d'];
$result=mysql_query("select * from product where barcode='$d'");
$num_rows=mysql_num_rows($result);
if ($num_rows<1)
{
	include'unsearch.php';
}
else
{
echo "<table border=1>
<tr id='no'>
<th> Barcode </th>
<th> Name </th>
<th> Quantity </th>
<th> Price </th>
<th> Company </th>
<th>Department</th>
<th> Type </th>
</tr>";

while ($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" .$d. "</td>";
echo "<td>" .$row ['name']. "</td>";
echo "<td>" .$row ['qty']. "</td>";
echo "<td>" .$row ['price']. "</td>";
echo "<td>" .$row ['comp']. "</td>";
echo "<td>" .$row ['depa']. "</td>";
echo "<td>" .$row ['type']. "</td>";
echo "</tr>";
}
echo "</table>";
}
}
else if($h=='*')
{
echo"
<div class='border'>
<ul>
<li id='active'><a href='home.php'> Home </a></li>
<li><a href='new2.php'> New </a></li>
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
/* Include Codes for Admin Users Here*/
$d=$_POST['d'];
$result=mysql_query("select * from product where barcode='$d'");
$num_rows=mysql_num_rows($result);
if ($num_rows<1)
{
	include'unsearch.php';
}
else
{
echo "<table border=1>
<tr id='no'>
<th> Barcode </th>
<th> Name </th>
<th> Quantity </th>
<th> Price </th>
<th> Company </th>
<th>Department</th>
<th> Type </th>
</tr>";

while ($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" .$d. "</td>";
echo "<td>" .$row ['name']. "</td>";
echo "<td>" .$row ['qty']. "</td>";
echo "<td>" .$row ['price']. "</td>";
echo "<td>" .$row ['comp']. "</td>";
echo "<td>" .$row ['depa']. "</td>";
echo "<td>" .$row ['type']. "</td>";
echo "</tr>";
}
echo "</table>";
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
                               
                                  
