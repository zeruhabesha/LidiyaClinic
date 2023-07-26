<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FADAMA III AF</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />
	
	
<script src="js/jquery.js"></script>
<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

  </head>
 <?php 
session_start();

 if(isset($_SESSION['unmatchpass'])){?>
           
           <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "Passwords dont match Try again", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
if(isset($_SESSION['emptybox'])){?>
           
           <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "You did not fill all textboxes Try again", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
if(isset($_SESSION['userexist'])){?>
           
           <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "User already exists Try again", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
 
           
 if(isset($_SESSION['register'])){?>

  <script type="text/javascript"> 

$(document).ready(function(){ 
                         
                                        swal({
                                         title: "Account created successfully",
                                         text: "Do you want to login?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="index.php";
                                                     } 
                                          
                                         });
                                         
                                                    });
       
                    </script>
                     <?php 
	   session_destroy();		
		    }?>

  <body>
	<header>

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">
					<div class="navbar-header">
            <div class="logo">
            <img src="images/court.png" height="160px" alt="">
            </img>
            </div>

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
								<li role="presentation"><a href="index.php" class="active">Home</a></li>
								<li role="presentation"><a href="overview.php">overview</a></li>
								<li role="presentation"><a href="components.php">components</a></li>
								<li role="presentation"><a href="multimedia.php">Multimedia</a></li>
								<li role="presentation"><a href="blog.php">Blog</a></li>
								<li role="presentation"><a href="locations.php">locations</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">Fadama <span>III AF</span>Sokoto</h2>
                                    <p class="animation animated-item-2">Sokoto Fadama Coordination Office</p>
                                    <a class="btn-slide animation animated-item-3" href="overview.php">Read More</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4" >
                                <div class="slider-img" >
                                  <div class="demo">
                                    <div class="login" style="background-color:blue">
                                    <div class="log_img">
                                      <img src="images/slider/img3.png" height="200px"></img>
                                      </div>
                                       <div class="login__form" style="margin-top:-40%" >
                                       <form class="form-login" method="post" action="register.php" id="login-form">
                                        <div class="login__row">
                                          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                                          </svg>
                                          <input type="text" class="login__input name" name="firstname" placeholder="Firstname"/>
                                        </div>
                                        <div class="login__row">
                                          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                                          </svg>
                                          <input type="text" class="login__input name" name="sirname" placeholder="Sirname"/>
                                        </div>
                                        <div class="login__row">
                                          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                                          </svg>
                                          <input type="text" class="login__input name" name="email" placeholder="Email"/>
                                        </div>
                                        <div class="login__row">
                                          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                                          </svg>
                                          <input type="password" class="login__input pass" name="password" placeholder="Password"/>
                                        </div>
                                        <div class="login__row">
                                          <svg class="login__icon email svg-icon" viewBox="0 0 20 20">
                                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                                          </svg>
                                          <input type="password" class="login__input email" name="rpassword" placeholder="Repeat Password"/>
                                        </div>

                                        <input type="submit" class="login__submit" name="submit" value="Sign Up">
                                        </form>
                                      </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->






    




	




  


	
	
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
