<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
    exit;
}
function Login_Attempt($Username,$Password){
    $con;
    $Query="SELECT * FROM  registration WHERE username='$Username' AND password='$Password'";
    $Execute=mysql_query($Query);
    if($Admin=mysql_fetch_assoc($Execute)){
        return $Admin;
    }else{
        return null;
    }
}
function Login(){
    if(isset($_SESSION["User_Id"])){
        return true;
    }
    
}
function Confirm_Login(){
    if(!Login()){
         $_SESSION["ErrorMessage"]="Login Requried!";
        Redirect_to("login.php");
    }
}


?>