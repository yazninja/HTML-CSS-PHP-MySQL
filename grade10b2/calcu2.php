<html>
<head>
<title>Calculator.2 ||L-PhP</title>
<link type='text/css' rel='stylesheet' href="calcu.css"/>
</head>
<?php
$a=$_POST['n1'];
$b=$_POST['n2'];
$c=$_POST['funct'];
if ($c=='+'){
	$d=$a+$b;
}
else if ($c=='-'){
	$d=$a-$b;
}
else if ($c=='*'){
	$d=$a*$b;
}
else if ($c=='/'){
	$d=$a/$b;
}
echo"<h3>$a $c $b = <strong>$d</strong></h3>";
?>
<html>
<div class='form'>
<div class='grey'><br>
<b>Calculator</b>
</div>
<form action='calcu2.php' method='post'>
<input type=number  name="n1" placeholder="<?php echo $a; ?>"required/><br>
Function:
<select name="funct">
  <option value="+">Add</option>
  <option value="-">Subtract</option>
  <option value="*">Multiply</option>
  <option value="/">Divide</option>
</select><br>
<input type=number name="n2" placeholder="<?php echo $b; ?>"required/><br>
<input type=submit Value="Submit"/>
</form>
</div>
</html>