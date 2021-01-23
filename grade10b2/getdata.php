<?php
$upload_image=$_FILES["myimage"]["name"];

$folder="192.168.100.3/img";

move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);
?>