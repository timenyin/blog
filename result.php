<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Categories</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Harmony" content="hex-tie"/>
<meta name="description" content="world best online selling books"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Harmony" content="hex-tie"/>
<meta name="description" content="world best tie by U-books"/>
<meta name="description" content="rent of books online, book blogs, buying textbooks online, U-books online Shipping Available. Buy Today! U-books Official Page.">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
    
</style>
 
<body>
    <nav class="navbar navbar-custom">
        <div class="container-fuild">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">The Blog</a>
               
            <!-- New Set -->
            </div>
                 <!-- New Set -->
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="home.php">Home</a>
                <li><a href="blog.php">Blog</a> </li>
                <li><a href="#">About Us</a> </li>
                <li><a href="#">Services</a> </li>
                <li><a href="#">Countact Us</a> </li>
                <li><a href="#">Feature</a> </li>
                &nbsp;&nbsp;&nbsp;&nbsp;
            </ul> 
           
            </div>
     
             <div class="nav navbar-nav form-inline navbar-right" style="padding:10px">
                <br><br><br><br><br><br><br><br><br>
                 <br><br><br><br><br><br><br><br><br>
                 <br><br><br><br><br><br><br><br><br>
                 <br><br>
                 <form method="get" action="result.php">
               <div class="search-box">
                   <input class="search-txt" style="font-family: cursive;" type="text" name="search" placeholder="Search...">
                   <a class="search-btn">
                   <i accesskey="searcbutton" class="fas fa-search"></i>
                   </a>
                </div>
                 </form>
            </div>    
    </nav>
    <header style="background:url(images/hd1.fw.png);">  
        <div class="text-center">
        <h1 class="text-center">The Blog</h1>
        <div class="lead">The Best Blog Ever You Seen</div>
             
        </div>
    </header>

<hr>
    <div class="container">
        <div class="col-sm-7">
            <?php
                global $con;
                if(isset($_GET["searchbutton"])){
                    $Search=$_GET["search"];
                $viewQuery="SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%Search%'
                OR category LIKE '$Search' OR post LIKE '%Search%'";
                }
                $viewQuery="SELECT * FROM admin_panel ORDER BY datetime desc";
                $Execute=mysql_query($viewQuery);
                while($DataRows=mysql_fetch_array($Execute)){
                    $postId=$DataRows["Id"];
                    $datetime=$DataRows["datetime"];
                    $Title=$DataRows["title"];
                    $Category=$DataRows["category"];
                    $Admin=$DataRows["author"];
                    $Image=$DataRows["image"];
                    $Post=$DataRows["post"];                    
             
            ?>
            <div id="img" class="thumbnail">
                <br>
                <center>  <h3 id="heading"> <?php echo ($Title); ?></h3></center>
                <hr>
                    <img  class="img-responsive img-rounded" src="upload/<?php echo $Image; ?>">
            </div>
            <br><br>
                <div class="caption">
            <p class="description" style="color:goldenrod">Category:&nbsp;<?php echo $Category ?>||&nbsp;Published On:&nbsp;<?php echo $datetime ?></p>
            <p style="font-family:cursive;"><?php 
            if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
                echo $Post; ?></p>
                </div>
            <a href="fullpost.php?id=<?php echo $postId; ?>"><span class="btn btn-info">Read More &rsaquo;&rsaquo;</span>
            </a>
            <br><br>
            <hr>
              <?php } ?>       
        </div> <!--first row end here-->
    
    
    </div>
   
        
        <!--ending of sild area-->
        
        
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