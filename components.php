<?php 
session_start();
include("db.php");
 
if(isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){
	
$adminid = $_COOKIE['adminid'];
$adminemail = $_COOKIE['adminemail'];

$sqluser ="SELECT * FROM Administrator WHERE Password='$adminid' && Email='$adminemail'";

$retrieved = mysql_query($sqluser);
    while($found = mysql_fetch_array($retrieved))
	     {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
             $id= $found['id'];
		 }	   
 }
 
elseif(isset($_COOKIE['userid'])&&$_COOKIE['useremail']){
	
	$userid=$_COOKIE['userid'];
$useremail=$_COOKIE['useremail'];

$sqluser ="SELECT * FROM Users WHERE Password='$userid' && Email='$useremail'";
$retrieved = mysql_query($sqluser);
    while($found = mysql_fetch_array($retrieved))
	     {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
			   $id= $found['id'];
			 
  	    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fadama III Components</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />
  </head>
  <body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
              <a href="index.php"><h1><span>FADAMA</span>III AF </h1></a>
						</div>
					</div>

					<div class="navbar-collapse collapse">
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php" >Home</a></li>
								<li role="presentation"><a href="overview.php">overview</a></li>
								<li role="presentation"><a href="components.php" class="active">components</a></li>
								<li role="presentation"><a href="multimedia.php">Multimedia</a></li>
								<li role="presentation"><a href="blog.php">Blog</a></li>
								<?php
								if(isset($firstname)){echo"<li role='presentation' ><a href='logout.php' style='font-weight: bold; font-family: Comic Sans MS; color: #5261D1;'>Logged in as: $firstname</a></li>";}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<div id="breadcrumb">
		<div class="container">
			<div class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Components</li>
			</div>
		</div>
	</div>

	<div class="services">
		<div class="container">
			<h3>Components</h3>
			<hr>
			
			                     
			?>
			<div class='col-md-6'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <ul class='blog_archieve'>
                                <?php
                                 $sqlnews ="SELECT * FROM Components LIMIT 3";
                                 $ret = mysql_query($sqlnews);           
                                 while($found = mysql_fetch_array($ret))
	                           {
                                 $Fullnews = $found['Fullnews'];
                                  $Title = $found['Title'];	
								  $id = $found['id'];
								  echo"<li>
                                	   <a href='components.php?id=$id'><i class='fa fa-angle-double-right'></i>$Title </a>
                                      </li>";      
		                       }
                                ?>
                           </ul>
                        </div>
                    </div>
                </div>
                
                
                <!--/.archieve-->



                <div class='col-md-6'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <ul class='blog_archieve'>
                                <?php
                                 $sqlnews ="SELECT * FROM Components WHERE id>3 ORDER BY id DESC ";
                                 $ret = mysql_query($sqlnews);           
                                 while($found = mysql_fetch_array($ret))
	                           {
                                
                                  $Title = $found['Title'];	
								   $id = $found['id'];
								  echo"<li>
                                	   <a href='components.php?id=$id'><i class='fa fa-angle-double-right'></i>$Title </a>
                                      </li>";      
		                       }
                                ?>
                           </ul>
                        </div>
                    </div>
                </div>
                !--/.archieve-->
		</div>
	</div>
	
	<div class="sub-services">
		<div class="container">
			<div class="col-md-6">
				<div class="media">
							<div class="media-left">
							</div>
							<div class="media-body">
								<?php            if(isset($_GET['id']))
			                    { $id=$_GET['id'];
                                 $sqlnews ="SELECT * FROM Components WHERE id='$id' ";
                                 $ret = mysql_query($sqlnews); 
								}
                             else{
                             	   $sqlnews ="SELECT * FROM Components ORDER BY id ASC ";
                                   $ret = mysql_query($sqlnews); 							
                                  } 
                                           
                                 while($found = mysql_fetch_array($ret))
	                           {
                                
                                    $Title = $found['Title'];	
								   $component = $found['Fullnews'];
								    $component2 = $found['Fullnews2'];
								    
		                       }
                                ?>	
				<h4 class="media-heading"><?php if(isset($Title)){echo$Title;}?></h4>
				 <?php
				 if(isset($Title)){
				 $sqln ="SELECT * FROM Picture1 WHERE Title='$Title' ";
                                                $rgetn = mysql_query($sqln);
												$numn=mysql_num_rows($rgetn);
                                                if($numn!=0){
												                   while($found = mysql_fetch_array($rgetn))
	                                                                {
                                                                       $profile= $found['Picturename'];
		                                                            }
																	echo"<img src='multimedia/pictures/$profile'  class='img-responsive' alt=''>";	   
												             }
									?>
                    <p><?php if(isset($component)){echo$component;}?></p>                
                    </div>
				</div>
			</div>

			<div class="col-md-6">
			<?php	$sqln1 ="SELECT * FROM Picture2 WHERE Title='$Title'  ";
                                                $rgetn1 = mysql_query($sqln1);
												$nB=mysql_num_rows($rgetn1);
                                                if($nB!=0){
												                   while($found1 = mysql_fetch_array($rgetn1))
	                                                                {
                                                                       $profile= $found1['Picturename'];
		                                                            }
																	echo"<img src='multimedia/pictures/$profile' class='img-responsive' alt=''>";	   
												             }
						echo"<p>&nbsp;</p>";  
										$sqln2 ="SELECT * FROM Picture3 WHERE Title='$Title'  ";
                                                $rgetn2 = mysql_query($sqln2);
												$numn2=mysql_num_rows($rgetn2);
                                                if($numn2!=0){
												                   while($found2 = mysql_fetch_array($rgetn2))
	                                                                {
                                                                       $profile= $found2['Picturename'];
		                                                            }
																	echo"<img src='multimedia/pictures/$profile' class='img-responsive' alt=''>";	   
												             }
					?>
                    <p><?php if(isset($component2)){echo$component2;}?></p>                

                    <?php }?>
			</div>
		</div>
	</div>

	

	<footer>
		<div class="footer">
			<div class="container">
				<div class="social-icon">
					<div class="col-md-4">
						<ul class="social-network">
							<li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
						</ul>
					</div>
				</div>

        <div class="col-md-4 col-md-offset-4">
					<div class="copyright">
						&copy; May  2018 by <a target="_blank" href="">
              Multi CapitalComputers</a>. All Rights Reserved.
					</div>
				</div>
			</div>


			<div class="pull-right">
				<a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
			</div>
		</div>
	</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>

  </body>
</html>
