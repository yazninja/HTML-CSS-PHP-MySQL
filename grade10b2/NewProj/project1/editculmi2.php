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
?>
<div class='form-style-6'>
<h1> New Product </h1><br>
<form action='editculmi1.php' method='post'>
<input type='text' name='a'  value= '<?php echo $c; ?>' readonly/> <br>
<input type='text' name='b' value= '<?php echo $d; ?>' required> <br>
<input type='text' name='c' value= '<?php echo $e; ?>' required><br>
<input type='text' name='d' value= '<?php echo $f; ?>' required><br>
<input type='text' name='e' value= '<?php echo $g; ?>' required><br>
<select name='choice'> <option value='food'> Food</option> <option value='drink'> Drink </option> </select>
<input type='text' name='f' Placeholder='Barcode' required><br>
<input type='submit' value='Submit'>
</form>
</div>

<?php
mysql_close($con);
?>
</body>
</html>



