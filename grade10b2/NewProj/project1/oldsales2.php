<?php
session_start();
$total=0;
$qty=$_POST['qty'];
$bar=$_POST['bar'];
$a=$_SESSION['username'];
$b=$_SESSION['password'];
$cus=$_SESSION['cust'];
$con=mysql_connect ("localhost", "grade10b2", "psdgrade10b2");
if (!$con)
{
die ('Could not connect:' .mysql_error ());
}
else
{
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
}

$result1=mysql_query ("select * from  product where barcode='$bar'");
$num_rows=mysql_num_rows($result1);
if ($num_rows < 1)
{
echo "Product Not Found";
}
else
{
$sql=mysql_query("INSERT INTO sales (cust_num,barcode,qty,cahier) VALUES ('$cus','$bar','$qty','$a')");
}
echo "<table border='1'>
<tr>
<th width='100'>Barcode</th>
<th width='200'>Name</th>
<th width='100'>Qty & Price</th>
<th width='100'>Subtotal</th>
</tr>";

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
}
echo "<tr>";
echo "<td>".$barcode."</td>";
echo "<td>".$name."</td>";
echo "<td>".$quantity." @ ".$price."</td>";
$subtotal=$quantity * $price;
echo "<td>".$subtotal."</td>";
echo "</tr>";
$total= $total + $subtotal; 
}
echo "</table>";
echo"Total : $total";

}


?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='ssf.css'/>
<title><?php echo $e.' '.$d.' '. ' || Super B. Bakhala';?> </title>
</head>
<body>
<form action='sales2.php' method='post'/>
<input type='text' name='qty' placeholder="Quantity" required/>
<input type='text' name='bar' placeholder="Barcode" required/>
<input type=submit value='Add to Cart'/>
</form>

