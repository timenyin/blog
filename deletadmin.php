<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php
if(isset($_GET["Id"])){
    $IdFromURL=$_GET["Id"];
    $con;
$Query="DELETE FROM  registration WHERE Id='$IdFromURL'";
$Execute=mysql_query($Query);
if($Execute){
    
        $_SESSION{"SuccessMessage"}="Admin Deleted Successfully";
        Redirect_to("Admin.php");
    
}else{
    
     $_SESSION{"ErrorMessage"}="Admin Was Unable to Delete";
        Redirect_to("Admin.php");
    
}

     
}

?>