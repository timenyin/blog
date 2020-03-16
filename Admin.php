<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php Confirm_Login(); ?>
<?php
if(isset($_POST["submit"])){
$Username= mysql_real_escape_string($_POST["username"]);
$Password= mysql_real_escape_string($_POST["password"]);
$Confirmpassword= mysql_real_escape_string($_POST["confirmpassword"]);
date_default_timezone_set("Africa/Lagos");
$currenttime=time();  
//$datetime=  strftime("%Y-%m-%d %H:%M:%S", $currenttime);  
$datetime=  strftime("%B-%d-%Y %H:%M:%S", $currenttime); 
$datetime;
$Admin=$_SESSION["Username"];
if(empty($Username)||empty($Password) ||empty($Confirmpassword) ){
    $_SESSION["ErrorMessage"]="ALL Field Must Be Filled Out";
     Redirect_to("Admin.php");
    
}elseif(strlen($Password)<4){
    $_SESSION["ErrorMessage"]="Atleast 4 Character For Password Are Requried";
    Redirect_to("Admin.php");
    
}elseif($Password!==$Confirmpassword){
    $_SESSION["ErrorMessage"]="Password / Confirmpassword Dose Not Match";
    Redirect_to("Admin.php"); 
    
}else{
    global $con;
    $Query="INSERT INTO registration (datetime,username,password,addedby)
    VALUES('$datetime','$Username','$Password','$Admin')";
    $Execute=mysql_query($Query);
    if($Execute){
    $_SESSION["SuccessMessage"]="Admini Added Successfully";
    Redirect_to("Admin.php");  
    }else{
    $_SESSION["ErrorMessage"]="Admin Failed To Input";
    Redirect_to("Admin.php");
        
    }
    
    
}
    
    
    
    
}

?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mange Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Harmony" content="hex-tie"/>
<meta name="description" content="world best online selling books"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Harmony" content="hex-tie"/>
<meta name="description" content="world best tie by U-books"/>
<meta name="description" content="rent of books online, book blogs, buying textbooks online, U-books online Shipping Available. Buy Today! U-books Official Page.">
<link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        .fieldinfo{
            color: goldenrod;
            font-family: cursive;
            font-size: 1.1em;
        }
    
    </style>
    
    </head>  
<body>
    <div class="container-fluid">
    <div clas="row">
        <div class="col-sm-2">
            <ul id="style_menu" class="nav nav-pills nav-stacked">
            <li><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;DashBoard</a></li>
                
            <li><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add Nwe Post</a></li>
                
            <li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Categories</a></li>
                
             <li class="active"><a href="Admin.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Mange Admins</a></li>
                
            <li><a href="comments.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Coments</a></li>
                
            <li><a href="blog.php"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;&nbsp;Live Blog</a></li>
                
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
            </ul>
        </div> 
   
        
        <!--ending of sild area-->
<div class="col-sm-10">
            <h1>Manage Adimn Acesss</h1>
             <?php echo Message(); 
                    echo SuccessMessage();
                ?>
    <div>
        <form action="Admin.php" method="post">
                <fieldset>
                    
                     <div class="form-group">
                        <label for="categoryname"><span class="fieldinfo">Username:</span></label>
                 <input class="form-control" type="text"  name="username" id="username"  placeholder="username">
                    </div>
                    
                     <div class="form-group">
                        <label for="categoryname"><span class="fieldinfo">Password:</span></label>
                 <input class="form-control" type="password"  name="password" id="password"  placeholder="password">
                    </div>
                    
                     <div class="form-group">
                        <label for="categoryname"><span class="fieldinfo">Confirm Password:</span></label>
                 <input class="form-control" type="password"  name="confirmpassword" id="confirmpassword"  placeholder="password">
                    </div>
                    
                    <input class="btn btn-success btn-block" type="submit" name="submit" value="Add New Admin">
                </fieldset>
         </form>
     </div>
    <div class="table-responsive ">
        <table class="table table-striped table-hover">
        <tr>
            <th>Sr.No</th>
            <th>Date & Time</th>
            <th>Admin Name</th>
            <th>Added By</th>
            <th>Action</th>
        </tr>
<?php
global $con;
$ViewQuery="SELECT * FROM  registration ORDER BY datetime desc";
$Execute=mysql_query($ViewQuery);
$SrNo=0;      
while($DateRows=mysql_fetch_array($Execute)){
        $Id=$DateRows["Id"];
        $datetime=$DateRows["datetime"];
        $Username=$DateRows["username"];
        $Admin=$DateRows["addedby"];
        $SrNo++;
        
    
     

?>
<tr>
        <td><?php echo $SrNo; ?></td>
        <td><?php echo $datetime; ?></td>
        <td><?php echo $Username; ?></td>
        <td><?php echo $Admin; ?></td>
        <td><a href="deletadmin.php?Id=<?php echo $Id; ?>">
            <span class="btn btn-danger">
                Delect</span></a> </td>

</tr>
        <?php } ?>
        </table>
    </div>
</div>
            
        </div>
    </div>
    
     <!--Ending of Body area-->
    </body>
<br>
     <footer class="container-fluid text-center" id="footer">
        <div class="row">
            
            <div class="col-md-12">
                <center><h3>FOLLOW US ON</h3></center>
             <div class="media">
        <ul id="fat">
         <li id="jumb1" class="jumbotron" style="list-style: none;text-decoration: none; margin: 10px 20px;display: inline-block;font-size: 10px;padding: 10px 10px;color: #fff;border: 1px solid #fff;border-radius: 35%;transition: .5s;"><a href="http://www.facebook.com" class="fa fa-facebook fa-2x" aria-hidden="true"></a></li>
            
         <li id="jumb1" class="jumbotron" style="list-style: none;text-decoration: none; margin: 10px 20px;display: inline-block;font-size: 10px;padding: 10px 10px;color: #fff;border: 1px solid #fff;border-radius: 35%;transition: .5s;"><a href="http://www.instagram.com" class="fa fa-instagram fa-2x" aria-hidden="true"></a></li>
            
         <li id="jumb1" class="jumbotron" style="list-style: none;text-decoration: none; margin: 10px 20px;display: inline-block;font-size: 10px;padding: 10px 10px;color: #fff;border: 1px solid #fff;border-radius: 35%;transition: .5s;"><a href="http://www.linkedin.com" class="fa fa-linkedin fa-2x" aria-hidden="true"></a></li> 
            
            
         <li id="jumb1" class="jumbotron" style="list-style: none;text-decoration: none; margin: 10px 20px;display: inline-block;font-size: 10px;padding: 10px 10px;color: #fff;border: 1px solid #fff;border-radius: 35%;transition: .5s;"><a href="http://www.twitter.com" class="fa fa-twitter fa-2x" aria-hidden="true"></a></li>
        
        
        <li id="jumb1" class="jumbotron" style="list-style: none;text-decoration: none; margin: 10px 20px;display: inline-block;font-size: 10px;padding: 10px 10px;color: #fff;border: 1px solid #fff;border-radius: 35%;transition: .5s;"><a href="http://www.github.com" class="fa fa-github fa-2x" aria-hidden="true"></a></li>
     
        </ul>
         </div>         
         </div>
        </div>
      
    </footer>
    <div class="container-fluid text-center" style="background-color:orangered;font-family: cursive; color:white">
        <br>
        <p style="float:left; text-align: left;"><a href style="text-decoration: none; color:black">Copyright © 2018 the name all rights reserved.</a></p>
        <p style="float:right; text-align: center;"><a href="helpcenter.php" style="text-decoration: none;color: black">Terms & Condition</a> &nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;<a href="helpcenter.php" style="text-decoration: none;color: black"> Privacy Policy</a></p>
        <br><hr>
    </div> 
 <script src="js/lightbox.js"></script> 
<script type="text/x-javascript" src="js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- /snippets/social-meta-tags.liquid -->
</html>