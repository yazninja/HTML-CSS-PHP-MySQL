<html> <head> <title> Name || Inventory </title>
<style>



</style>
</head>
<body>
<?php
$con=mysql_connect('localhost','grade10b2','psdgrade10b2');
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


}
echo'<br>'; 
?>
<form action='removeiteminv1.php' method='post'/>
Remove Item:
<input type='text' name='qty' placeholder='Quantity'>
<input type='text' name='br' placeholder='Barcode'>
<input type='submit' value=' Remove '>
</form>
</body>
</html>

