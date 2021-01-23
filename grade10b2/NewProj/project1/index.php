<!DOCTYPE html>
<html>
<head>
<style>
body{
background-image:url(grocery.jpg);
background-size:cover;
}

*{
  margin:0px;
}
.two{
     /* background-color:rgba(1,53,1,0.8);*/
	 background-color:rgba(86,82,73,0.8);
border-top:1px solid white;
     bottom:0px;
     height:50px;
     width:100%;
     position:fixed;
     color:white;
     font-family:Verdana;
     font-size:15px;
     padding:2.5px 10px;
     text-align:center;
}


input[type=submit] {
   background-color:rgba(86,82,73,0.6);
   border-radius:15px;
   width:200px;
   border:none;
   margin-left:20px;
   height:35px;
   text-align:center;
font-family:Verdana;
color:white;
transition:0.4s linear;
}
.main input[type="text"],
.main select
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 90%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.main input[type="password"],
.main select
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 90%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.main input[type="text"]:focus,
.main input[type="password"]:focus,
.main select:focus
{
    box-shadow: 0 0 5px #D0883C;
    padding: 3%;
    border: 1px solid #D0883C;
}
input[type=submit]:hover {
   background-color:#D0883C;
   
   transition:0.4s linear;
}

::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: rgb(1,53,1);
}
:-ms-input-placeholder { /* IE 10+ */
  color: rgb(1,53,1);
}
.log {
width: 750px;
height:350px;
position:absolute;
top:0px;
bottom:0px;
left:0px;
right:0px;
margin:auto;
}
.logo {
width:350px;
height:350px;
position:absolute;
}
.form {
float:right;
}
.top {
	text-align:CENTER;
margin-top:10px;
width:350px;
height:30px;
background-color:rgba(86,82,73,1);
border-radius:20px 20px 0px 0px;
border-top:1px solid white1;
border-left:1px solid white1;
border-right:1px solid white1;

}
.main {
width:350px;
height:260px;
background-color:rgb(222,219,214);
border-left:1px solid white1;
border-right:1px solid white1;
text-align:center;
}

.bottom {
width:350px;
height:30px;
background-color:rgba(86,82,73,1);
border-radius:0px 0px 20px 20px;
border-bottom:1px solid white1;
border-left:1px solid white1;
border-right:1px solid white1;

}
.form input {
margin-top:20px;
}

.top p {
padding:10px 20px;
font-family:arial;
font-size:13px;
color:white;
}

.bottom p {
padding:8px 20px;
font-family:arial;
font-size:13px;
color:white;
text-align:center;
}


</style>

<title>Log-in | Super B. Bakhala</title>
</head>
<body>
<div class="wrap">
  <div class="bg"></div>

</div>
<div class='log'>
<div class='logo'>
<img src='bakhala.gif' width='350'/>
</div>
<div class='form'>
<div class='top'>
<p>LOG-IN INFORMATION</p>
</div>
<div class='main'>
<br>
<form action='login.php' method='POST'>
<input type='text' class='usn' name='user' placeholder='Username' required  oninvalid="this.setCustomValidity('No Username detected')"
 oninput="setCustomValidity('')"/> <br>
<input type='password'class='pss' name='pass' placeholder='Password' required  oninvalid="this.setCustomValidity('No Password detected')"
 oninput="setCustomValidity('')"/><br>
<div class='six'><input type='submit'value='Login'></div>
</form>
</div>
<div class='bottom'>
<p>
<?php
error_reporting(0); 
echo $message;
?></p>
</div>
</div>
</div>
<div class="two">
<br> &copy; Grade 10-Batch 2 |2017| Batch Force

</div>
</body>
</html>

