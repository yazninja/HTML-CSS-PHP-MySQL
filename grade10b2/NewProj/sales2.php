<!DOCTYPE html>
<html>
<head>
<title> </title>
<style>
</style>
</head>
<body>
<?php
session_start();
$cus=$_SESSION['cust'];
$bar=$_POST['bar'];
$qty=$_POST['qty'];
$a=$_SESSION['username'];

$con=mysql_connect ("localhost", "grade10b2", "psdgrade10b2");
if (!$con)
{
die ('Could not connect:' .mysql_error ());
}
mysql_select_db ("batch2-2017", $con);

$result1=mysql_query ("select * from  product where barcode='$bar'");
$num_rows=mysql_num_rows($result1);
if ($num_rows < 1)
{
echo "<div class=error>Product Not Found</div>";
include'unsales.php';
}
else
{
while ($row=mysql_fetch_array($result1))
{
$proqty=$row['qty'];
$newqty=$proqty - $qty;
$sql=mysql_query("UPDATE product SET qty=$newqty where barcode='$bar'");
}
$sql=mysql_query("UPDATE product SET qty='$newqty' where bardode='$bar'");
$sql=mysql_query("INSERT INTO sales (cust_num,barcode,qty,cashier) VALUES ('$cus','$bar','$qty','$a')");
echo "<script> location.href='displaysales.php';</script>";
}

?>
