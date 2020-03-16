<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php
if(isset($_POST["submit"])){
$Username= mysql_real_escape_string($_POST["username"]);
$Password= mysql_real_escape_string($_POST["password"]);


if(empty($Username)||empty($Password)){
    $_SESSION["ErrorMessage"]="ALL Field Must Be Filled Out";
     Redirect_to("login.php");
    
}
else{
    
    $Found_Account=Login_Attempt($Username,$Password);
     $_SESSION["User_Id"]=$Found_Account["Id"];
    $_SESSION["Username"]=$Found_Account["username"];
    if($Found_Account){
     $_SESSION["SuccessMessage"]="Welcome {$_SESSION["Username"]}";
     Redirect_to("dashboard.php");
            
        }else{
            
    $_SESSION["ErrorMessage"]="Invalid Username / Password-Login Was Unsuccessfull";
    Redirect_to("login.php");
        }
                }
                
}
    

?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html;  charset=utf-8" />
<meta name="Harmony" content="hex-tie"/>
<meta name="description" content="world best online selling books"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Harmony" content="hex-tie"/>
<meta name="description" content="world best tie by U-books"/>
<meta name="description" content="rent of books online, book blogs, buying textbooks online, U-books online Shipping Available. Buy Today! U-books Official Page.">
<link  rel="stylesheet" type="text/css" href="css/bootstrap.css">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/css.css"/>

    <style>
       .search-box{
    position: absolute;
    top:70%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 40px;
    background: #2f3640;
    padding: 10px;
}
.search-box:hover > .search-txt{
    width: 240px;
    padding: 0 6px;
}
.search-btn{
    
    color: #e84118;
    float: right;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: goldenrod; 
    display:flex;
    justify-content: center;
    align-items: center;
}

.search-txt{
    border: none;
    background: none;
    outline: none;
    float: left;
    padding: 0;
    color: white;
    font-size: 16px;
    transition: 0.4s;
    line-height: 40px;
    width: 0px;
}
    .col-sm-3{background:pink;
    
    }
    #jumb{
    background-color:lightcoral;
    width: 100%;
}

    #footer{
    font-family: cursive;
    background: #282828;
    background: linear-gradient(-65deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
    background-size: 100%;
    animation: gradient 15s ease infinite;
   
}
    .btn-info{
        float: right;
    }
    .thumbnail{
        background:snow;
        width: 470px;
        height:500px;
    }
    
    #btn{
    padding-top: 9px;
    padding-bottom: 9px;
}

    #search{
        border-radius:5px;
        padding-bottom:7px;
        padding-top: 7px;
        color: black;
        font-family: cursive;
        
    }
    #sea{
        padding-bottom:11px;
        padding-top: 11px;    
        
    }
    #heading{
        font-family: cursive;
        color: darkslategrey;
    } 
        
        
        .fieldinfo{
            color: goldenrod;
            font-family: cursive;
            font-size: 1.1em;
        }
        
        #jum{
            background: white;
        }
        
    
    </style>
    
    </head>  
<body>
            <nav class="navbar navbar-custom">
        <div class="container-fuild">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">The Blog</a>
               
            <!-- nav Set -->
            </div>
              
                 <!-- menu Set -->
            </div>
    
    </nav>
    <header style="background:url(images/hd1.fw.png);">  
        <div class="text-center">
        <h1 class="text-center">The Blog</h1>
        <div class="lead">The Best Blog Ever You Seen</div>
             
        </div>

    </header><!--- heading Ending-->
    <hr>
    
    <div class="container">
        <div class="blog-header">
        <h1 id="h1">The Complet Responsive CMS Blog</h1>
            <h5 style="color:goldenrod;font-family: cursive;" class="lead">The complet Blog Using Php By Timenyin Harmony</h5>
        
        </div>
        <hr>
    <div clas="row">
        <!--ending of sild area-->
<div class="col-sm-offset-3 col-sm-7">
    <?php echo Message(); 
    echo SuccessMessage();
                ?>
    
    <br><br>
            <h2>Welcome Back!</h2>
             <?php echo Message(); 
    echo SuccessMessage();
                ?>
    <hr>
    <div class="jumbotron" id="jum" >
        <form action="login.php" method="post">
                <fieldset>
         <div class="form-group">  
        <label for="password"><span class="fieldinfo">Username</span></label>
    <div class="input-group input-group-lg">
         <span class="input-group-addon">
        <span class="glyphicon glyphicon-envelope"></span>
        </span>
          <input class="form-control" type="text"  name="username" id="username"  placeholder="Your Username">
          </div>
           <br>
                    
                    
       <div class="form-group">  
        <label for="password"><span class="fieldinfo">Password</span></label>
    <div class="input-group input-group-lg">
         <span class="input-group-addon">
        <span class="glyphicon glyphicon-lock"></span>
        </span>
        <input class="form-control" type="password"  name="password" id="password"  placeholder="password">
          </div>
           </div>        
                    <br>
                    <input class="btn btn-warning btn-block" type="submit" name="submit" value="Login">
                </fieldset>
         </form>
     </div>
    </div>
</div>
            
        </div>
    
     <!--Ending of Body area-->
    </body>
<br>
 
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