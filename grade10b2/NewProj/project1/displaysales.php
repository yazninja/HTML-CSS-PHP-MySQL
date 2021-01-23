<?php
session_start();
$total=0;
$cus=$_SESSION['cust'];
$con=mysql_connect ("localhost", "grade10b2", "psdgrade10b2");
if (!$con)
{
die ('Could not connect:' .mysql_error ());
}
else{
mysql_select_db ("batch2-2017",$con);
echo"
<div class='cons'>
    <div class='scrolltable'>
        <table class='header'><th>Barcode</th><th>Name</th><th>Qty & Price</th><th>Subtotal</th></table>
        <div class='bdy'>
            
";

$result2=mysql_query ("select * from  sales where cust_num='$cus'");
while ($row=mysql_fetch_array($result2))
{
$barcode=$row['barcode'];
$quantity=$row['qty'];

$result3=mysql_query ("select * from  product where barcode='$barcode'");
while ($row3=mysql_fetch_array($result3))
{
$name=$row3['name'];
$price=$row3['price'];
$stat=$row3['status'];
}
echo "<table><tr>";
echo "<td>".$barcode."</td>";
echo "<td>".$name."</td>";
echo "<td>".$quantity." @ ".$price."QR</td>";
$subtotal=$quantity * $price;
echo "<td>".$subtotal."QR</td>";
echo "</tr>";
$total= $total + $subtotal; 
}
echo "</table></div></div></div>";
}
?>
<?php
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
<div class='ruserpage'>
<div class='rgrey'>
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
<li id='active'><a href='homessf.php'> Home </a></li>
<li><a href='new3.php'> New </a></li>
<li><a href='editculmi3.php'> Edit </a></li>
<li><a href='search1.php'> Search </a></li>
<li><a href='active.php'> Active </a></li>
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
<li><a href='active.php'> Active </a></li>
<li><a href='inactive.php'> Inactive </a></li>
<li><a href='delete.php'> Delete </a></li>
<li><a href='recall2.php'> Recall </a></li>
<li><a href='inventory.php'> Inventory </a></li>
<li><a href='additemv.php'> Add Item </a></li>
<li><a href='removeitem.php'> Remove Item </a></li>
<li id=active><a href='newcust.php'>Sales</a></li>
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
<li><a href='homessf.php'> Home </a></li>
<li id=active><a href='newcust.php'> Sales</a></li>
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
<!DOCTYPE html>
<head>
<style>
body::-webkit-scrollbar {
    width: 1em;
}
 
body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
.scrolltable {
            height: 100%;
	    width:100%;
            display: flex;
            display: -webkit-flex;
            flex-direction: column;
            -webkit-flex-direction: column;
        }
        .scrolltable > .bdy {
            /*noinspection CssInvalidPropertyValue*/
            width: -webkit-fit-content;
            overflow-y: auto;
            flex: 1;
            -webkit-flex: 1;
        }
        th, td {
            min-width: 150px;
        }
        /* an outside constraint to react against */
        .cons{
	margin-left:400px;
	margin-top:100px;
            width: 650px;
            height:350px;
        }
        /* only styling below here */
        table {
            border-collapse: collapse;
			color:white;
			text-align:center;
        }
        th, td {
            border-top: 4px solid rgb(222,219,214);
			border-bottom: 4px solid rgb(222,219,214);
			border-left: 4px solid rgb(89,79,77);
			border-right: 4px solid rgb(89,79,77);
			
        }
        th {
            background-color: rgb(89,79,77);
            border-width: 4px;
			
	    height:25px;
        }
        td {
            border-width: 4px;
        }
        tr:nth-child(odd) {
            background-color:rgb(209,137,65);
        }
        tr:nth-child(even) {
            background-color:rgb(222,219,214);
        }
#qty a{
font-size:30px;
text-decoration: none;


}

#qty {
background-color:rgba(0,0,0,0.5)
font-family:century gothic;
border-radius:5px;
}
#bar {font-family:century gothic;

border-radius:5px;
}
#atc {font-family:century gothic;

border-radius:5px;
}

#qty2 {

font-family:century gothic;

border-radius:5px;
}
#bar2 {
font-family:century gothic;
border-radius:5px;
}
#rfc {
font-family:century gothic;
border-radius:5px;
}

#total {
font-family:century gothic;
border-radius:5px;
}
#cash {
font-family:century gothic;
border-radius:5px;
}
#change {
font-family:century gothic;
border-radius:5px;
}
#pay {
font-family:century gothic;
border-radius:5px;
}
*{margin:0px;}
table#pay{
border-collapse:collapse;
right:230px;
bottom:70px;
POSITION:absolute;
}
.add{
        height:230px;
        width:300px;
        top:7%;
        left:10px;
        position:absolute;
}
.add{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
 background-color:rgb(222,219,214);
}
.add h1{
         background-color:rgb(91,80,76);
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.add input[type="text"],
.add select
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.add input[type="text"]:focus,
.add select:focus
{
    box-shadow: 0 0 5px #D0883C;
    padding: 3%;
    border: 1px solid #D0883C;
}

.add input[type="submit"],
.addinput[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin-top:10px;
    width: 100%;
    padding: 3%;
    background: #D0883C;
    border-bottom: 2px solid rgb(216,151,86);
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;
    color: #fff;
}
.add input[type="submit"]:hover,
.addinput[type="button"]:hover{
    background: #D0883C;
}
.rem{
        height:230px;
        width:300px;
        bottom:8%;
	left:10px;
        position:absolute;
}
.rem{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
 background-color:rgb(222,219,214);
}
.rem h1{
         background-color:rgb(91,80,76);
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.rem input[type="text"],
.rem select
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.rem input[type="text"]:focus,
.rem select:focus
{
    box-shadow: 0 0 5px #D0883C;
    padding: 3%;
    border: 1px solid #D0883C;
}

.rem input[type="submit"],
.rem input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin-top:10px;
    width: 100%;
    padding: 3%;
    background: #D0883C;
    border-bottom: 2px solid rgb(216,151,86);
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;
    color: #fff;
}
.rem input[type="submit"]:hover,
.rem input[type="button"]:hover{
    background: #D0883C;
}
.ruserpage{
right: 0;
    top: 50px;
    width: 200px;
    height: 555px;
    position: fixed;
    background-color: rgb(222,219,214);
    border-left: 2px solid white;
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
    color: white;
    font: 95% Arial, Helvetica, sans-serif;

}
.rgrey{
border-top-left-radius:25px;
background-color:rgba(86,82,73,1);
width:100%;
height:50px;
color: white;
position:absolute;
top:0;
text-align:center;
z-index:-1;
font-weight:bold;
}
.ruserpage img{
width:180px;
height:150px;
margin-top:80px;
position:absolute;
left:0;
right:0;
margin-left:auto;
margin-right:auto;
}
</style>
<link rel = 'stylesheet'type = 'text/css'href='css2.css'/>
</head>
<body>
<div class='add'>
<h1>Add to Cart</h1><br>
<form action='sales2.php' method='post'/>
<input id = 'qty' type='text' name='qty' placeholder="Quantity" required/>
<input id = 'bar' type='text' name='bar' placeholder="Barcode" required/>
<input id = 'atc' type=submit value='Add to Cart'/>
</form>
</div>
<br>
<div class='rem'>
<h1>Remove from Cart</h1><br>
<form action='removecart.php' method='post'/>
<input id = 'qty2' type='text' name='qty' placeholder="Quantity" required/>
<input id = 'bar2' type='text' name='bar' placeholder="Barcode" required/>
<input id = 'rfc' type=submit value='Remove from Cart'/>
</form>
</div>
<br>
<form action='pay.php' method='post'/>

<table id='pay'>
<tr>
<td>Total:</td><td> <input id = 'total' type='text' name='total' value= '<?php echo $total; ?>' readonly/></td></tr>
<td>
Cash:</td><td> <input id = 'cash' type='text' name='cash' placeholder="Cash" required/></td>
</tr>
<td>

Customer No.:</td><td><strong><?php echo $cus;?></strong></td>
</tr><td>
<input id = 'pay' type=submit value='Pay'/></td><td></td>
</tr>
</form>
</table>


