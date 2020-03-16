<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php
if(isset($_GET["Id"])){
    $IdFromURL=$_GET["Id"];
    $con;
$Query="DELETE FROM category WHERE Id='$IdFromURL'";
$Execute=mysql_query($Query);
if($Execute){
    
        $_SESSION{"SuccessMessage"}="Category Deleted Successfully";
        Redirect_to("categories.php");
    
}else{
    
     $_SESSION{"ErrorMessage"}="Category Was Unable to Delete";
        Redirect_to("categories.php");
    
}

    
}

?>