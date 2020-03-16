<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Blog.php</title>
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
    .col-sm-3{
        background:seashell;
        
    
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
        background:white;
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
    .imageicon{
        max-width: 150px;
        margin: 0 auto;
        display: block;
    }
  

</style><!--styler Ending-->

    
    </head>  
<body>
    <nav class="navbar navbar-custom">
        <div class="container-fuild">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">The Blog</a>
               
            <!-- nav Set -->
            </div>
              
                 <!-- menu Set -->
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
    
    </nav>
    <header style="background:url(images/hd1.fw.png);">  
        <div class="text-center">
        <h1 class="text-center">The Blog</h1>
        <div class="lead">The Best Blog Ever You Seen</div>
             
        </div>
         <form action="blog.php">
              <div class="search-box">
                   <input class="search-txt" style="font-family: cursive;" type="text" name="search" placeholder="Search...">
                   <button class="search-btn btn-sm" name="searchbutton"><i class="fas fa-search"></i></button>
                </div>
            </form>

    </header><!--- heading Ending-->

<hr>
    <div class="container">
        <div class="blog-header">
        <h1 id="h1">The Complet Responsive CMS Blog</h1>
            <h5 style="color:goldenrod;font-family: cursive;" class="lead">The complet Blog Using Php By Timenyin Harmony</h5>
        
        </div>
        <hr>
    <div class="row">
        <div class="col-sm-7">
            <?php
                global $con;
                if(isset($_GET["searchbutton"])){
                    $Search=$_GET["search"];
                    //Query where Search Button is Active
                $viewQuery="SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%' OR post LIKE '%Search%'";
                    
                    //query when caterogy is active URL TAB
                }else if(isset($_GET["category"])){
                $Category=$_GET["category"];
                $viewQuery="SELECT * FROM admin_panel WHERE category ='$Category' ORDER BY datetime desc";
                    
                    
                }
                
                
              //Query when pagination Button is Active i.e blog.php?Page=1...
            else if(isset($_GET["Page"])){
                $Page=$_GET["Page"];
                if($Page==0||$Page<1){
                    $Showpostform=0;
                    
                }else{
                $Showpostform=($Page*5)-5;}
                //echo $Showpostform;
                $viewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT $Showpostform, 5";}
            
            //Query where Search Button is Active
            else{
                    //Query where Search Button is Active
                $viewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT 0,5";}
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
                    <img  class="img-responsive img-rounded" src="upload/<?php echo $Image; ?>">
            <br>
                <div class="caption">
                <center>  <h3 id="heading"> <?php echo ($Title); ?></h3>
                </center>
                <hr>
            <p class="description" style="color:goldenrod">Category:&nbsp;<?php echo $Category ?>||&nbsp;Published On:&nbsp;<?php echo $datetime ?></p>
           
        <p style="color:goldenrod" class="pull-right">&nbsp;Recent Comments:&nbsp;<?php   ?>
            
            
            <!---turn on comment statements-->
<?php
$con;
$QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$postId' AND status='ON'"; 
$ExecuteApproved=mysql_query($QueryApproved); 
$RowsApproved=mysql_fetch_array($ExecuteApproved); 
$TotalApproved=array_shift($RowsApproved);
if($TotalApproved>0){
?>
<span class=" badge pull-right" >
<?php echo $TotalApproved; ?>
 </span>                         
 <?php } ?> </p>
                    
                    
        <br>
    <p style="font-family:cursive;"><?php 
            if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
                echo $Post; ?></p>
                </div>
            <a href="fullpost.php?Id=<?php echo $postId; ?>"><span class="btn btn-info">Read More &rsaquo;&rsaquo;</span>
            </a>
            <br><br>
            <hr>
              <?php } ?>
            <!---Geting the Pangination-->
            <center>
            <nav>
                <ul class="pagination  pagination-md">
                     <!---forward buttom-->
            <?php
                    if(isset($Page))
                    {
                   if($Page>1){
                     ?>  
                <li><a style="color:darkslategray;background:goldenrod;" href="blog.php?Page=<?php echo $Page-1; ?>">&laquo;</a></li>
                    
                  <?php }
                    }?>
            <?php
                $con;
                $QueryPagination="SELECT COUNT(*) FROM admin_panel";
                $ExecutePagination=mysql_query($QueryPagination);
                $RowPangination=mysql_fetch_array($ExecutePagination);
                $TotalPost=array_shift($RowPangination);
                //echo $TotalPost;
                $PostPagination=$TotalPost/5;
                $PostPagination=ceil($PostPagination);
                //echo $PostPerPage;
            
                for($i=1;$i<=$PostPagination;$i++){
                if(isset($Page)){
                if($i==$Page){
        
           
            ?>
                    
        <li class="active"><a style="color:darkslategray;" href="blog.php?Page=<?php echo $i; ?>">&nbsp;<?php echo $i; ?></a></li>
            <?php 
                }else{ ?>
                    
                    <li><a style="color:darkslategray;background:goldenrod;" href="blog.php?Page=<?php echo $i; ?>">&nbsp;<?php echo $i; ?></a></li>
                    <?php
                        }
                }
                        } 
                    ?>
                <!---backward buttom-->
                  <?php
                    if(isset($Page)) 
                    {
                   if($Page+1<=$PostPagination){
                     ?>  
                <li><a style="color:darkslategray;background:goldenrod;" href="blog.php?Page=<?php echo $Page+1; ?>">&raquo;</a></li>
                    
                  <?php }
                    }?>
                </ul>
            </nav>
            </center>
        </div> <!--first row end here-->
    <div class="col-sm-offset-1 col-sm-4">
        <h2 style="color:darkslategray;">About Me</h2>
        <img class="img-responsive img-circle imageicon" src="images/pic120.fw.png">
            <p>Apple, at its discretion, may make available future upgrades or updates to the Apple Software for your compatible computer. Upgrades and updates, if any, may not necessarily include all existing software features or new features that Apple releases for newer or other models of computer.</p>
        
<div class="panel panel-primary">
   <div class="panel-heading">
       <h2 class="panel-title"><b>All Categories</b></h2>
    </div>     
        <div class="panel-body"> 
           <?php
            $con;
            $ViewQuery="SELECT * FROM category ORDER BY datetime desc";
            $Execute=mysql_query($ViewQuery);
            while($DataRows=mysql_fetch_array($Execute)){
                $Id=$DataRows['id'];
                $Category=$DataRows['name'];
            ?>
         <a href="blog.php?category=<?php echo $Category ?>">
          <span style="color:goldenrod"><b><?php echo $Category."<br>"; ?></b></span>
        </a>
<?php } ?>
        </div>
    <div class="panel-footer">
    
    </div>
</div>
        
<div class="panel panel-primary">
   <div class="panel-heading">
       <h2 class="panel-title"><b>Recent Post</b></h2>
    </div>     
        <div class="panel-body" style="background:snow;">
           <?php
            $con;
            $viewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT 0,5";
            $Execute=mysql_query($viewQuery);
            while($DataRows=mysql_fetch_array($Execute)){
               $Id=$DataRows['Id'];
                $Title=$DataRows['title'];
                $datetime=$DataRows['datetime'];
                $Image=$DataRows['image'];
                if(strlen($datetime)>16){$datetime=substr($datetime,0,16);}
            ?>
     <div> 
     <h6 class="description pull-right" style="color:goldenrod"><?php echo $datetime; ?></h6>
    
    <hr>
   <img class="img-rounded pull-left" style="margin-top:10px; margin-left:10px;" src="upload/<?php echo $Image; ?>"width="100px";heigth="80px;">  
    <a href="fullpost.php?Id=<?php echo $Id; ?>">
    <p id="heading" style="margin-left:90px;"><?php echo $Title; ?></p>
  </a>                                                                        
    <hr>
                                            
     </div>
            
  <?php } ?>  
        </div>
    <div class="panel-footer">
    
    </div>
</div>
        <!--side Bar Ending-->
    </div>
        
    </div><!--row Bar Ending-->
        
    
          
    </div><!--container Bar Ending-->
    
    
    </body>
    
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