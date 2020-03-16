<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php
if(isset($_GET["Id"])){
    $IdFromURL=$_GET["Id"];
    $con;
    $Admin=$_SESSION["Username"];
$Query="UPDATE comments SET status='ON', approvedby='$Admin' WHERE Id='$IdFromURL'";
$Execute=mysql_query($Query);
if($Execute){
    
        $_SESSION{"SuccessMessage"}="Comment Approved Successfully";
        Redirect_to("comments.php");
    
}else{
    
     $_SESSION{"ErrorMessage"}="Comment Un-successful";
        Redirect_to("comments.php");
    
}

    
}

?>