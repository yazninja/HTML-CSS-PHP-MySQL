<html>
<head>
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<style>
* { 
    -moz-box-sizing: border-box; 
    -webkit-box-sizing: border-box; 
     box-sizing: border-box; 
}
@media print 
{
   @page
   {
    size: A6;
    size: portrait;
  }
}
body{
	font-size:10px;
}
img{
	margin-left: auto;
	margin-right: auto;
	display: block;
}
#toprint{
	padding:4px;
	width:105mm;
	height:148mm;
	position:relative;
	margin-left:400px;
	margin-top:90px;
	border: 1px dashed #000;
	
}
.left{
	float:left;
	
}
.right{
	float:right;
	text-align:right;
}

        th, td {
            min-width:65px;
        }
        /* only styling below here */
        table {
			font-size:10px;
            border-collapse: collapse;
			color:white;
			text-align:center;
        }
        th, td {
            border-top: 2px dashed #000;
			
			
        }
        th {
            background-color: #fff;
            border-width: 2px;
			color:black;
			
	    height:15px;
        }
        td {
            border-width: 2px;
        }
        tr:nth-child(odd) {
            background-color:#fff;
			color:black;
        }
        tr:nth-child(even) {
            background-color:#fff;
        }
	.cons{
		padding-top:3px;
			width:350px;
			margin: 0 auto;
			
	}
	.bot{
				position: absolute; 
                bottom: 0; 
                width: 105mm; 
                height: 30px; 
				text-align:center;
	}
h3{
text-align:center;
}
button{
position:absolute;
left:300px;
top:200px;
</style>
</head>
<div id=toprint>
<img src='bakhala.gif' width='100'/><br>
<?php
session_start();
$cus=$_SESSION['cust'];
$cash=$_SESSION['cash'];
$con=mysql_connect ("localhost", "grade10b2", "psdgrade10b2");
if (!$con)
{
die ('Could not connect:' .mysql_error ());
}
mysql_select_db ("batch2-2017", $con);

$result1=mysql_query ("select * from  customer where cust_num=$cus");
$num_rows=mysql_num_rows($result1);
if ($num_rows < 1)
{
echo "<div class=error>Customer No. not found!</div>";
include'unsales.php';
}
while ($row=mysql_fetch_array($result1))
{
$cus=$row ['cust_num'];
$date=$row ['d_in'];
$time=$row ['t_in'];
echo" 	<span class='left'>Customer Number:&nbsp;<b>$cus</b></span>	<span class='right'>Date:&nbsp;<b>$date</b></span><br>
		<span class='left'>Cashier Name:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>$e &nbsp; $d"; 
echo"	</b></span>	<span class='right'>Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>$time</b></span><br>
";
		echo"
<div class='cons'>
    <div class='scrolltable'>
        <table class='header'><th>Barcode</th><th>Name</th><th>Qty & Price</th><th>Subtotal</th><th>Department</th></table>
        <div class='bdy'>
            
";

$result2=mysql_query ("select * from  sales where cust_num='$cus'");
while ($row=mysql_fetch_array($result2))
{
$barcode=$row['barcode'];
$quantity=$row['qty'];

$result3=mysql_query ("select * from  product where barcode='$barcode'");
while ($row3=mysql_fetch_array($result3))
{
$name=$row3['name'];
$price=$row3['price'];
$stat=$row3['status'];
$depa=$row3['depa'];
}
echo "<table><tr>";
echo "<td>".$barcode."</td>";
echo "<td>".$name."</td>";
echo "<td>".$quantity." @ ".$price."QR</td>";
$subtotal=$quantity * $price;
echo "<td>".$subtotal."QR</td>";
echo "<td>".$depa."</td>";
$total=$total + $subtotal;
echo "</tr>"; 
}
$change=$cash - $total;
echo "</table></div></div></div><br><br>
<span class=left>Total:</span> <span class=right>$total QR</span><br>
<span class=left>Cash:</span> <span class=right>$cash QR</span><br>
<span class=left>Change:</span> <span class=right>$change QR</span><br>
<h3>This Serves As An Official Receipt</h3>
<div class=bot>
<span class=thanks>Thank you for Shopping at <b><i>Super B. Bakhala</i></b><br>
&copy; Batch Force| Batch 2 |2017-2018</span>

</div></div>";

}
?>
<button onclick="printContent('toprint')">Print Receipt</button>
