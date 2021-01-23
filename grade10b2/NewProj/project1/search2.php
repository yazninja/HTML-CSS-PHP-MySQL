<html>
<head>
<title> </title>
</head>
<body>

<?php

$d=$_POST['d'];

$con=mysql_connect('localhost','grade10b2','psdgrade10b2');
if(!$con)
{
die ('Could not connect: '.mysql_error());
}
mysql_select_db('batch2-2017',$con);
$result=mysql_query("select * from product where barcode='$d'");
$num_rows=mysql_num_rows($result);

if ($num_rows<1)
{
echo "No Record Found";
}
else
{
echo '<table border=1>
<tr>
<th> Barcode </th>
<th> Name </th>
<th> Quantity </th>
<th> Price </th>
<th> Company </th>
<th> Type </th>
</tr>';

while ($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" .$d. "</td>";
echo "<td>" .$row ['name']. "</td>";
echo "<td>" .$row ['qty']. "</td>";
echo "<td>" .$row ['price']. "</td>";
echo "<td>" .$row ['comp']. "</td>";
echo "<td>" .$row ['type']. "</td>";
echo "</tr>";
}
echo "</table>";
}
mysql_close($con);

?>

</body>
</html>
                               
                                  
