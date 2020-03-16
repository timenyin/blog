<?php require_once("include/db.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("include/function.php"); ?>
<?php Confirm_Login(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin Dashboard</title>
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

    
    </head>  
<body>
    <div class="container-fluid">
    <div clas="row">
        <div class="col-sm-2">
            <ul id="style_menu" class="nav nav-pills nav-stacked">
            <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;DashBoard</a></li>
                
            <li><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
                
            <li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Categories</a></li>
                
             <li><a href="Admin.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Mange Admins</a></li>
                
            <li><a href="comments.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Coments
<?php
$con;
$Querytotal="SELECT COUNT(*) FROM comments WHERE  status='OFF'"; 
$Executetotal=mysql_query($Querytotal); 
$Rowstotal=mysql_fetch_array($Executetotal);
$Total=array_shift($Rowstotal);
if($Total>0){
?>
<span style="color:white" class="label pull-right label-warning" >
!!&nbsp;<?php echo $Total; ?>
 </span>                           
 <?php } ?>                 
  </a></li>
                
            <li><a target="_blank" href="blog.php?Page=1"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;&nbsp;Live Blog</a></li>
            
             <li><a target="_blank" href="home.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Go Back Home Page</a></li>
                
                
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
            </ul>
        </div> 
        <!--ending of sild area-->
        <div class="col-sm-10">
              <!--the main area-->
              <div>
               <?php echo Message(); 
                    echo SuccessMessage();
                ?>
            </div>
            <hr>
        <div class="panel panel-default" style=" color:black;
    font-family: cursive;">
            <!--panel-default-->
            <div class="panel-heading">Admin Dashboard</div>
            <div class="panel-body">
                <p>Apple, at its discretion, may make available future upgrades or updates to the Apple Software for your compatible computer. Upgrades and updates, if any, may not necessarily include all existing software features or new features that Apple releases for newer or other models of computer.</p>
            
            </div>
            <!--Table -->
                   <div class="table-responsive">
                <table  class="table table-striped table-hover">
                <tr style="color:black;font-family: cursive;">
                    <th>NO.</th>
                    <th>Post Title</th>
                    <th>Date &&nbsp;Time</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Comment</th>
                     <th>Action</th>
                    <th>Details</th>
                    <th>Live Preview</th>
                 </tr>
                    
<?php                  
$con;
$ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc";
$Execute=mysql_query($ViewQuery);
$SrNo=0;
while($DataRows=mysql_fetch_array($Execute)){
                    $Id=$DataRows["Id"];
                    $datetime=$DataRows["datetime"];
                    $Title=$DataRows["title"];
                    $Category=$DataRows["category"];
                    $Admin=$DataRows["author"];
                    $Image=$DataRows["image"];
                    $Post=$DataRows["post"];
                    $SrNo++;
                    ?>
                    <tr style=" color:orange; font-family: cursive;">
                        <td style=" color:black"><?php echo $SrNo;  ?></td>
                        <td><?php
                        if(strlen($Title)>4){
                            echo $Title=substr($Title,0,4).'...';
                        }
                        ?></td>
                        
                        <td><?php
                        if(strlen($datetime)>16){
                            echo $datetime=substr($datetime,0,16).'...';
                        }
                         ?>
                        </td>
                        
                        
                        <td><?php
                        if(strlen($Admin)>5){
                            echo $Admin=substr($Admin,0,5).'...';
                        }
                         ?></td>
                        
                        
                        <td><?php
                    
                        echo $Category; ?></td>
                        <td><img class="thumbnail img-rounded" src="upload/<?php echo $Image; ?>"width="100px";heigth="80px;"></td>
                        
                        
      <td>
<!---turn on comment statements-->
<?php
$con;
$QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='ON'"; 
$ExecuteApproved=mysql_query($QueryApproved); 
$RowsApproved=mysql_fetch_array($ExecuteApproved);
$TotalApproved=array_shift($RowsApproved);
if($TotalApproved>0){
?>
<span class="label pull-right label-success" >
<?php echo $TotalApproved; ?>
 </span>                           
 <?php } ?> 
          
<!---for off statements-->
          
<?php
$con;
$QueryUnpproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='OFF'"; 
$ExecuteUnpproved=mysql_query($QueryUnpproved); 
$RowsUnpproved=mysql_fetch_array($ExecuteUnpproved);
$TotalUnpproved=array_shift($RowsUnpproved);
if($TotalUnpproved>0){
?>
<span class="label pull-left label-danger" >
<?php echo $TotalUnpproved; ?>
 </span>                           
 <?php } ?> 
                            </td>
                        
                        
                        <td>
                            <a style="text-decoration: none;" href="editpost.php?Edit=<?php echo $Id; ?>"><span class="btn btn-warning">Edit</span> </a>&nbsp;                        
                            <a style="text-decoration: none;" href="delectpost.php?Delect=<?php echo $Id; ?>"><span class="btn btn-danger">Delect</span> </a>&nbsp;
                        </td>
                        <td><a style="text-decoration: none;" href="fullpost.php?Id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
                    </tr>
<?php } ?>
                    
                </table>
            
            </div>
        </div>
           
     
        </div>
    </div>
    
    </div>
    
    
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