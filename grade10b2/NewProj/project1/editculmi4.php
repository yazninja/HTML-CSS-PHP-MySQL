<?php
session_start();
$a=$_POST['user'];
$b=$_POST['pass'];
$a='sbbinventory';
$b='12354';
$con=mysql_connect ("localhost", "grade10b2", "psdgrade10b2");
if (!$con)
{
die ('Could not connect:' .mysql_error ());
}
mysql_select_db ("batch2-2017", $con);
$result=mysql_query ("select*from product where barcode=$c");
While ($row=mysql_fetch_array($result))
{
$c=$row['barcode'];
$d=$row['name'];
$e=$row['qty'];
$f=$row['price'];
$g=$row['company'];
}
$sql= "update product set barcode='$c',name='$d',quantity='$e',price='$f',company='$g' where barcode='$c'";
if(!mysql_query($sql,$con))
{
die ('error:'.mysql_error());
}

echo"
<table border='1'/>
<tr>
<td> Barcode </td>
<td> Name </td>
<td> Quantity </td>
<td> Price </td>
<td> Company </td>
</tr>
<tr>
<td> $c </td>
<td> $d </td>
<td> $e </td>
<td> $f </td>
<td> $g </td>
</tr>";

echo '1 record added';
mysql_close($con)



?>
</body>
</html>
