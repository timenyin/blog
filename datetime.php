<?php
date_default_timezone_set("Africa/Lagos");
$currenttime=time();  
$datetime=  strftime("%Y-%m-%d %H:%M:%S", $currenttime);  
$datetime=  strftime("%B-%d-%Y %H:%M:%S", $currenttime); 
echo $datetime
?>  