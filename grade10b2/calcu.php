<html>
<head>
<title>Calculator ||L-PhP</title>
<link type='text/css' rel='stylesheet' href="calcu.css"/>
</head>
<div class='form'>
<div class='grey'><br>
<b>Calculator</b>
</div>
<form action='calcu2.php' method='post'>
<input type=number  name="n1" placeholder="1st Number"required/><br>
Function:
<select name="funct">
  <option value="+">Add</option>
  <option value="-">Subtract</option>
  <option value="*">Multiply</option>
  <option value="/">Divide</option>
</select><br>
<input type=number name="n2" placeholder="2nd Number"required/><br>
<input type=submit Value="Submit"/>
</form>
</div>
</html>
