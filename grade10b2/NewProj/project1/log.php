<?php
session_start();
$a=$_POST['user'];
$b=$_POST['pass'];
$a='admin101';
$b='jm1234';
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
echo "<div class='message'><h1>Invalid Username</h1></div>";
include 'login.html';
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
echo "<div class='message'><h1>Password or Username Incorrect</h1></div>";
include 'login.html';
}
else
{
?>













<html>
<head>
<style>
*{margin:0px;}

body{

}

tr,td{
width:100px;height:10px;
}


td,th{
text-align:center;
vertical-line:top;
border:5px solid cyan;
font-family:calibri;

}

table{
border-collapse:collapse;

position:fixed;
left:100px;
right:100px;
top:255px;
bottom:100px;
}

tr:nth-child(odd){
color:rgb(153,204,255);
background-color:rgb(102,153,255);
}

tr:nth-child(even){
color:rgb(102,153,255);
background-color:rgb(153,204,255);
}

tr:hover{
background-color:

}



</style>
</head>
<body>
<?php

$con=mysql_connect('localhost','sn-24-6662','del789');
if (!$con)
{
die ('Could not connect'.mysql_error());
}
mysql_select_db('batch2-2017',$con);
$result=mysql_query("select * from product where status=' ' and type='drink'");

$num_rows=mysql_num_rows($result);
if ($num_rows<1)
{
echo" No record Found ";
}
else
{
echo "<table border='1'>
<tr> <th> Barcode </th>
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

$result2=mysql_query("select * from product where status=' ' and type='food'");

$num_rows2=mysql_num_rows($result2);
if ($num_rows2<1)
{
echo" No record Found ";
}
else
{
echo "<table border='1'>
<tr> <th> Barcode </th>
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


mysql_close($con);
}

?>

</body>
</html>













<link rel='stylesheet' type='text/css' href='ssf.css'/>
<title><?php echo '|| Sari-Sari Force';?> </title>
</head>
<body>
<div class='banner'>
<p> Main Page </p>
</div>



<?php
if($h=='+')
{
?>
<div class='tabs'>
<ul>
<li id='home'><a href='ssf.php'> Home </a></li>
<li ><a href='newnew.php'> New </a></li>
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
<li><a href='login.html'> Log Out </a></li>
</ul>
</div>

<?php
}
else
{
?>
<div class='tabs'>
<ul>
<li id='home'><a href='ssf.php'> Home </a></li>
<li><a href='newnew.php'> New </a></li>
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
<li><a href='login.html'> Log Out </a></li>
</ul>
</div>
<?php
}
}
}
mysql_close ($con);
?>







</body>
</html>
