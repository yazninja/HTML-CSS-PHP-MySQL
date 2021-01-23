<?php
session_start();
// Get info from signup.php
$a=$_POST['User'];
$b=$_POST['Password'];
$c=$_POST['Password2'];
$d=$_POST['gname'];
$e=$_POST['fname'];
// Optional
$f=$_POST['nickname'];
// end Get info

// Connect to the Server
$con=mysql_connect ("localhost", "grade10b2", "psdgrade10b2");
if (!$con)
{
die ('Could not connect:' .mysql_error ());
}
// Select Database
mysql_select_db ("yazchat", $con);

// Check if Username is Taken
$result=mysql_query ("select * from  users where username='$a'");
$num_rows=mysql_num_rows($result);
if ($num_rows>1)
{
$_SESSION['logpass']=$b;
$_SESSION['logpass2']=$c;
$_SESSION['loggname']=$d;
$_SESSION['logfname']=$e;
$_SESSION['lognick']=$f;
echo'Dupe!!!';
include 'dupesignup.php';
}
// check if Passwords matches
else if ($b!==$c)
{
$_SESSION['loguser']=$a;
$_SESSION['loggname']=$d;
$_SESSION['logfname']=$e;
$_SESSION['lognick']=$f;
echo' Double!!!';
include 'passsignup.php';
}
// Query OK !!!Make account!!!
else{
$sql="INSERT INTO users (username,password,gname,fname,mname,d_join,t_join) values ('$a','$b','$d','$e','$f',curdate(),curtime())";
echo"' $a' '$b' '$c' '$d' '$e' '$f'";	
echo'DONE!, Query OK';
	}
?>	