<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php
if(isset($_GET["Id"])){
    $IdFromURL=$_GET["Id"];
    $con;
$Query="DELETE FROM comments WHERE Id='$IdFromURL'";
$Execute=mysql_query($Query);
if($Execute){
    
        $_SESSION{"SuccessMessage"}="Comment Deleted Successfully";
        Redirect_to("comments.php");
    
}else{
    
     $_SESSION{"ErrorMessage"}="Comment Was Unable to Delete";
        Redirect_to("comments.php");
    
}

    
}

?>