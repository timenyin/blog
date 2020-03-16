<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php
if(isset($_POST["submit"])){
$Name= mysql_real_escape_string($_POST["name"]);
$Email= mysql_real_escape_string($_POST["email"]);
$Comment= mysql_real_escape_string($_POST["comment"]);
date_default_timezone_set("Africa/Lagos");
$currenttime=time();  
$datetime=  strftime("%Y-%m-%d %H:%M:%S", $currenttime);  
$datetime=  strftime("%B-%d-%Y %H:%M:%S", $currenttime); 
$datetime;
$postId=$_GET["Id"];
    
if(empty($Name) || empty($Email) || empty($Comment)){
    $_SESSION["ErrorMessage"]="All Field Must Be Filled Out";
    
}elseif(strlen($Title)>500){
    $_SESSION["ErrorMessage"]="Only 500 Is  Charatres Need iN Comment Section";

    
}else{
    global $con;
    $postIDFromURL=$_GET['Id'];
    $Query="INSERT INTO comments (datetime,name,email,comment,approvedby, status,admin_panel_id)VALUES('$datetime','$Name','$Email','$Comment','Pending','OFF','$postIDFromURL')";
    $Execute=mysql_query($Query);
    if($Execute){
    $_SESSION["SuccessMessage"]="Comment is Submited  Successfully";
    Redirect_to("fullpost.php?Id={$postId}");  

    }else{
    $_SESSION["ErrorMessage"]="Post Failed To Input";
    Redirect_to("fullpost.php?Id={$postId}");
        
    }
    
     
}
    

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Full Post</title>
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
</style><!--styler Ending-->

    
    </head>  
    <nav class="navbar navbar-custom">
        <div class="container-fuild">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">C.M.S Blog</a>
               
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
<body>
    <div class="container">
        <div class="blog-header">
        <h1 id="h1">The Complet Responsive CMS Blog</h1>
            <h5 style="color:goldenrod;font-family: cursive;" class="lead">The complet Blog Using Php By Timenyin Harmony</h5>
        
        </div>
         <div>
               <?php echo Message(); 
                    echo SuccessMessage();
                ?>
            </div>
        <hr>
    <div class="row">
        <div class="col-sm-7">
            <?php
                global $con;
                if(isset($_GET["searchbutton"])){
                    $Search=$_GET["search"];
                $viewQuery="SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%' OR post LIKE '%Search%'";
                }else{
                    $PostIDFromURL=$_GET["Id"];
                $viewQuery="SELECT * FROM admin_panel WHERE Id='$PostIDFromURL' ORDER BY datetime desc";}
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
          <h3 id="heading"> <?php echo ($Title); ?></h3>
                <hr>
                <div class="caption">
            <p class="description" style="color:goldenrod">Category:&nbsp;<?php echo $Category ?>||&nbsp;Published On:&nbsp;<?php echo $datetime ?></p>
            <p style="font-family:cursive;"><?php 
            
                echo nl2br($Post); ?></p>
                </div>
            <hr>
              <?php } ?>   
            
            
            <!---form starts here-->
    <div>
         <h2 style=" color:goldenrod;font-family: cursive;" class="fielidinfo">Comments</h2> 
        <br>
<?php
$con;
$PostIdForComment=$_GET["Id"];
$ExtractingCommentQuery="SELECT * FROM comments WHERE admin_Panel_id='$PostIdForComment'AND status='ON' ";
$Execute=mysql_query($ExtractingCommentQuery);
while($DataRows=mysql_fetch_array($Execute)){
    $CommentData=$DataRows["datetime"];
    $CommentName=$DataRows["name"];
    $Comments=$DataRows["comment"];
            
?>
        <!---coments strs here-->
    <div>
   <div class="panel panel-default" style="font-family: cursive;">
            <!--panel-default-->
            <div class="panel-heading" style="background:white;">
                <img  class="img-circle" src="images/pic120.fw.png">
                <p style="font-family: cursive;color:red" class="list-group-item-text pull-center">By||<?php echo $CommentName; ?></p>&nbsp;&nbsp;
                <p style="font-family: cursive;color:red" class="list-group-item-text pull-right">On:<?php echo $CommentData;  ?></p>
                </div>
            <div class="panel-body">
                <p><?php echo  $Comments;  ?></p>
            
       </div>
        </div>
        <hr>
            </div> 
<?php } ?>
        <hr>
        <h3 style=" color:goldenrod;font-family:goldenrod;" class="fieldinfo" >Share Your Thougths About This Post</h3>
        <br>
        <form action="fullpost.php?Id=<?php echo $postId;  ?>" method="post" enctype="multipart/form-data">
         <fieldset>
             <div class="form-group">
                 <label style=" color:goldenrod;" for="Name"><span class="fieldinfo">&nbsp;Your Name:</span></label>
                 <input class="form-control" type="text"  name="name" id="name"  placeholder="your name..">
                    </div>
             
             <div class="form-group">
                 <label style=" color:goldenrod;" for="email"><span class="fieldinfo">&nbsp;Your E-mail:</span></label>
                 <input class="form-control" type="text"  name="email" id="email"  placeholder="your email address..">
                    </div>
             
              <div class="form-group">
                        <label style=" color:goldenrod;" for="postarea"><span   class="commentarea">&nbsp;Comment:</span></label>
                        <textarea rows="7" class="form-control" name="comment"   id="commentarea"></textarea>
             </div>
             
             
                    <br>
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </fieldset>
         </form>
    
             </div> <!--first row end here-->
  <hr>
        <div class="col-sm-offset-1 col-sm-3">
        <h2>TEST</h2>
            <p>Apple, at its discretion, may make available future upgrades or updates to the Apple Software for your compatible computer. Upgrades and updates, if any, may not necessarily include all existing software features or new features that Apple releases for newer or other models of computer.</p>
        <!--side Bar Ending-->
    </div>
    
    </div><!--row Bar Ending-->
        
    
          
    </div><!--container Bar Ending-->
    
        </div>
    </div>

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
    </body>
</html>