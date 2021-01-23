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

.container {
        position: absolute;
        margin-top:296px;
        margin-left:250px;
}
.image {
        display: block;
        width: 95%;
        height: auto;
}
.overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 105%;
        width: 105%;
        opacity: 0;
        transition: .3s ease;
}
.container:hover .overlay {
        opacity: 1;
}
.text {
        white-space: nowrap;
        position: absolute;
        overflow: hidden;
        margin-top:-240px;
        margin-left:2px;
}
.container2 {
        position: absolute;
        margin-top:200px;
        margin-left:850px;
}

.image2 {
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
<div class="container">
<img src="pizza-box.png" alt="Avatar" class="image">
<div class="overlay">
<div class="text"><a href='food.php'><img src="open.png"></a></div>
</div>
</div>
<div class="container2">
<img src="first.png" alt="Avatar" class="image2">
<div class="overlay2">
<div class="text2"><a href='drink.php'><img src="second.png"></a></div>
</div>
</div>
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

.container {
        position: absolute;
        margin-top:296px;
        margin-left:250px;
}
.image {
        display: block;
        width: 95%;
        height: auto;
}
.overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 105%;
        width: 105%;
        opacity: 0;
        transition: .3s ease;
}
.container:hover .overlay {
        opacity: 1;
}
.text {
        white-space: nowrap;
        position: absolute;
        overflow: hidden;
        margin-top:-240px;
        margin-left:2px;
}
.container2 {
        position: absolute;
        margin-top:200px;
        margin-left:850px;
}

.image2 {
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
<div class="container">
<img src="pizza-box.png" alt="Avatar" class="image">
<div class="overlay">
<div class="text"><a href='food.php'><img src="open.png"></a></div>
</div>
</div>
<div class="container2">
<img src="first.png" alt="Avatar" class="image2">
<div class="overlay2">
<div class="text2"><a href='drink.php'><img src="second.png"></a></div>
</div>
</div>
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

