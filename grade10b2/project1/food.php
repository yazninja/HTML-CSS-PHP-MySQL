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
<li><a href='home.php'> Home </a></li>
<li><a href='new.php'> New </a></li>
<li><a href='edit.php'> Edit </a></li>
<li><a href='search.php'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall.php'> Recall </a></li>
<li id='active'><a href='inventory.php'> Inventory </a></li>
<li><a href='add.php'> Add Item </a></li>
<li><a href='remove.php'> Remove Item </a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
";
include'homeno.php';
/* Include Codes for Warehouse users Here*/
?>
<html>
<head>
<style>
*{margin:0px;}

tr,td{width:70px;height:35px;}
td,TH{text-align:center;
vertical-line:top;
border:4px solid rgb(89,79,77);}

th{background-color:rgb(89,79,77);color:white;

}

table{
border-collapse:collapse;
POSITION:relative;
margin:auto;
margin-left: 20%;
margin-right: 0px;
margin-top: 5%;
margin-bottom: 0px;

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
<style>
body {
        background-color:rgb(164,184,182);
}
.container2 {
        position: absolute;
        margin-top:200px;
        margin-left:860px;
}.image2 {
        display: block;
        width: 100%;
        height: auto;

}
.overlay2 {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;

        opacity: 0;
        transition: .3s ease;
}
.container2:hover .overlay2 {
        opacity: 1;
}
.text2 {
        white-space:nowrap;
        position:absolute;
        overflow:hidden;
        width: 120%;
}
</style>
</head>
<body>
<div class="container2">
<img src="first.jpg" alt="Avatar" class="image2">
<div class="overlay2">
<div class="text2"><a href='drink.php'><img src="second.jpg"></a></div>
</div>
</div>


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
}

$result2=mysql_query("select * from product where type='food'");

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


}
echo'<br>';
?>

</body>
</html>
<?php
}
else if($h=='*')
{
echo"
<div class='border'>
<ul>
<li><a href='home.php'> Home </a></li>
<li><a href='new.php'> New </a></li>
<li><a href='edit.php'> Edit </a></li>
<li><a href='search.php'> Search </a></li>
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall.php'> Recall </a></li>
<li id='active'><a href='inventory.php'> Inventory </a></li>
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
?>
<html>
<head>
<style>
*{margin:0px;}

tr,td{width:70px;height:35px;}
td,TH{text-align:center;
vertical-line:top;
border:4px solid rgb(89,79,77);}

th{background-color:rgb(89,79,77);color:white;

}

table{
border-collapse:collapse;
POSITION:relative;
margin:auto;
margin-left: 20%;
margin-right: 0px;
margin-top: 5%;
margin-bottom: 0px;

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
<style>
body {
        background-color:rgb(164,184,182);
}
.container2 {
        position: absolute;
        margin-top:200px;
        margin-left:860px;
}.image2 {
        display: block;
        width: 100%;
        height: auto;

}
.overlay2 {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;

        opacity: 0;
        transition: .3s ease;
}
.container2:hover .overlay2 {
        opacity: 1;
}
.text2 {
        white-space:nowrap;
        position:absolute;
        overflow:hidden;
        width: 120%;
}
</style>
</head>
<body>
<div class="container2">
<img src="first.jpg" alt="Avatar" class="image2">
<div class="overlay2">
<div class="text2"><a href='drink.php'><img src="second.jpg"></a></div>
</div>
</div>


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
}

$result2=mysql_query("select * from product where type='food'");

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


}
echo'<br>';
?>

</body>
</html>
<?php
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

