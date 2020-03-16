<?php
$connection=mysql_connect("localhost","root","")  or die ("error in connection");

$con=mysql_select_db("phpcms",$connection) or die("failed to connect to database");
?>