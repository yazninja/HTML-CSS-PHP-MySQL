<?php
session_start();
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
$_SESSION['password']=$g;
$_SESSION['admin']=$e;
}
}

$result1=mysql_query ("select * from  product where barcode='$bar'");
$num_rows=mysql_num_rows($result1);
if ($num_rows < 1)
{
echo "Product Not Found";
include'displaysales.php';
}
else
{

$newqty=($qty*-1);

$sql=mysql_query("INSERT INTO sales (cust_num,barcode,qty,cashier) VALUES ('$cus','$bar','$newqty','$a')");
echo "<script> location.href='displaysales.php';</script>";
}

}
?>
