<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php
if(isset($_GET["Id"])){
    $IdFromURL=$_GET["Id"];
    $con;
$Query="UPDATE comments SET status='OFF'WHERE Id='$IdFromURL'";
$Execute=mysql_query($Query);
if($Execute){
    
        $_SESSION{"SuccessMessage"}="Comment Dis-Approve Successfully";
        Redirect_to("comments.php");
    
}else{
    
     $_SESSION{"ErrorMessage"}="Comment Was Unable to Dis-Approve";
        Redirect_to("comments.php");
    
}

    
}

?>