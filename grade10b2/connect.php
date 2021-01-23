<?php
$con=mysql_connect("localhost","grade10b2","psdgrade10b2");
if(!$con){
echo' Not Connected';
}
else{
echo'Connected<br>';
}
mysql_select_db("batch2-2017",$con);

$result=mysql_query("SELECT * from admin2");
while ($row=mysql_fetch_array($result))
{
	echo $row['username'];
	echo '<br>';
	echo $row['gname'];
	echo"&emsp;";
	echo $row['mname'];
	echo"&emsp;";
	echo $row['fname'];
	
}
?>