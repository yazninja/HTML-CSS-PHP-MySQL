<?php
session_start();
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
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='add.php'> Add Item </a></li>
<li><a href='remove.php'> Remove Item </a></li>
<li id='active'><a href='newcust.php'> Sales</a></li>
<li><a href='upload.php'> Upload </a></li>
<li><a href='employ.php'> Add /Fire Employee</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
";
$sql=mysql_query("INSERT INTO customer (d_in, t_in) VALUES (curdate(),curtime())");
$result1=mysql_query("select * from customer order by cust_num desc limit 1");
while($row=mysql_fetch_array($result1))
{
$i=$row['cust_num'];
$j=$row['cahier'];
}
$_SESSION['cust']=$i;
?>
<style>
form{
position:absolute;
left:0;
top:0;
right:0;
bottom:0;
margin:auto;
width:100%;
height:30px;
text-align:center;
z-index:2;
}

#qty a{
font-size:30px;
text-decoration: none;
font-family:Perpetua Titling MT;

r:rgb(136,219,247);

}
#qty a:hover{
font-size:30px;
color:rgb(136,219,247);
}

#sub {
text-decoration:none;
font-family:Tahoma;
height:22px;
position:absolute;
margin-top:6px;
margin-left:2px;
border-radius:5px;
}

input[type=text]{
font-size:30px;
color:rgba(136,219,247,0.45);
border-radius:5px;  
width:200px;
border:none;
text-align:center;
}
</style>
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<title><?php echo $e. ' '.$d.'|| Sari-Sari Force';?> </title>
</head>
<body>

<div class='form-style-6'>
<h1>Customer Number:<?php echo" ".$i."";?></h1>
<form action='sales2.php' method='post'>
<input type='text' name='qty' placeholder='Quantity' required><br>
<input type='text' name='bar' placeholder='Barcode' required><br>
<input type='submit' value='Add To Cart'>
</div>
<?php
}
else
{
echo"
<div class='border'>
<ul>
<li><a href='home.php'> Home </a></li>
<li id=active><a href='newcust.php'> Sales</a></li>
<li><a href='logout.php'> Log Out </a></li>
</ul>
</div>
";
$sql=mysql_query("INSERT INTO customer (d_in, t_in) VALUES (curdate(),curtime())");
$result1=mysql_query("select * from customer order by cust_num desc limit 1");
while($row=mysql_fetch_array($result1))
{
$i=$row['cust_num'];
$j=$row['cahier'];
}
$_SESSION['cust']=$i;
?>
<style>
form{
position:absolute;
left:0;
top:0;
right:0;
bottom:0;
margin:auto;
width:100%;
height:30px;
text-align:center;
z-index:2;
}

#qty a{
font-size:30px;
text-decoration: none;
font-family:Perpetua Titling MT;

r:rgb(136,219,247);

}
#qty a:hover{
font-size:30px;
color:rgb(136,219,247);
}

#sub {
text-decoration:none;
font-family:Tahoma;
height:22px;
position:absolute;
margin-top:6px;
margin-left:2px;
border-radius:5px;
}

input[type=text]{
font-size:30px;
color:rgba(136,219,247,0.45);
border-radius:5px;  
width:200px;
border:none;
text-align:center;
}
</style>
<link rel='stylesheet' type='text/css' href='cssnew.css'/>
<title><?php echo $e. ' '.$d.'|| Sari-Sari Force';?> </title>
</head>
<body>

<div class='form-style-6'>
<h1>Customer Number:<?php echo" ".$i."";?></h1>
<form action='sales2.php' method='post'>
<input type='text' name='qty' placeholder='Quantity' required><br>
<input type='text' name='bar' placeholder='Barcode' required><br>
<input type='submit' value='Add To Cart'>
</div>
<?php
}
}
}
?>

<div class="two">
<br> &copy; Grade 10-Batch 2 |2017| Batch Force
</div>



</body>
</html>

