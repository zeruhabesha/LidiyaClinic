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
else{
	 header('location:index.php');
      exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>FADAMA III AF</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- below they are plugins for the submission form --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">  
      <link rel="stylesheet" href="css/style1.css">

<!-- Bootstrap Core CSS -->
<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="admin/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='admin/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="admin/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

<script type="text/javascript"> 
            $(document).on("click", ".open-Delete", function () {
                                  var myValue = $(this).data('id');

                                        swal({
                                         title: "Are you sure?",
                                         text: "You will not be able to recover this news!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, delete it!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {
                                      	
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "upload.php",
                                                      data: { Deletenews : myValue },
                                                      success: function( result ) {
                                                      if(result=="ok"){
                                                                    swal({title: "Deleted!", text: "Your Proposal file has been deleted.", type: "success"},
                                                          function(){
                                                                          location.reload();
                                                                          }
                                                                      );                               	                        
                                                                 }

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "Your news is safe :)", "error");
                                             }
                                         });
                                       
                                       });
                </script>          
      
<!-- <script type="text/javascript"> 

$(document).ready(function(){  
 		                           swal({title: "Successful!", text: "Organisation Information Loaded!!.", type: "success"});

                               });
       
                    </script> -->
      
<style type="text/css">  
     .popover-title{
               	font-weight: bold;
                 font-size: 20px; 
                 font-family: Times New Roman;
                 color: black;
                 background-color: #CCE8F5;            
               }
               </style>
 <script type="text/javascript">
    $(document).ready(function(){

        $('[data-toggle="popover"]').popover();  
            //$('#pats').popover('show')  

    });
    </script>

 </head> 
 
 <script type="text/javascript">
 $(document).on("click", ".open-Updatepicture", function () {
     var myTitle = $(this).data('id');
     var myNews = $(this).data('it');
     var mysn = $(this).data('sn');
     var Newsid = $(this).data('ni');
      $(".modal-title #title").html(myTitle);
     $(".modal-body #title").val(myTitle);
      $(".modal-body #news").val(myNews);
      $(".modal-body #sn").val(mysn);
       $(".modal-body #ni").val(Newsid);
  
}); 
 </script>

<div id="Updatepicture" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	EDIT NEWS&nbsp;<span id='title'></span>
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	<center> 
        		<form action="upload.php" method="post"  enctype='multipart/form-data' >

           
            <div class="input-group" style="margin-bottom:10px; width: 100%">
    <span class="input-group-addon">News Title</span>
    <input id='title'type="text" name="title" placeholder="Enter news title" style="width: 100%"/>
         </div>
  <div class="input-group" style="margin-bottom:10px">
   
    <textarea rows="12" cols="92" placeholder="Type/paste here full news" name="news" id='news'></textarea>  </div>
    
   <div class='input-group' style='margin-bottom:10px'><span class='input-group-addon'>Select picture</span><input name='picfile' type='file' id='file' ></div>
    <input id='sn'type="hidden" name="sn" value="" />
    <input id='ni'type="hidden" name="newsid" value="" />
                                	      		
         </center>
      </div>
      <div class="modal-footer">
        <button  class="btn btn-success"  value="Enumeration" name="submit2">Update</button> 
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>
 



<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left" style="background-color:#2E8B57">
      <nav class="navbar navbar-inverse" >
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
       </button>
         <center><img src='images/court.png'  width='70%' height='170px' alt=''></center>	   
                               
	     </div>      
        
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">
              	 <h4>CONTROL PANEL</h4>
              </li>
              <li class="treeview">
                <a href="index.php">
                <i class="fa fa-tv"></i> <span>System Home Page</span>
                </a>
              </li> 
              <li class="treeview">
                <a href="administrator.php">
                <i class="fa fa-dashboard"></i> <span>Admin Dashboard</span>
                </a>
              </li>  
              <?php
               $sqlnews ="SELECT * FROM Useroles WHERE Admin='$adminid' ";
                                 $rets = mysql_query($sqlnews);
								 $count= mysql_num_rows($rets);
                                if($count!=0)
	                           {
	                           	       while($found = mysql_fetch_array($rets))
	                                   {
                                            $news= $found['News'];$users = $found['Users'];
								            $media = $found['Multimedia'];$compo = $found['Components'];
											$roles = $found['Roles'];$abus=$found['Aboutus'];
									   }
                               } ?>
              <li class="treeview">
               <?php if(isset($news)&&$news=="No"){
               	  
				  
               	  echo"<a  disabled=''>
                 <i class='fa fa-lock'></i>
                <span>News(No privilages)</span>
                </a>";
				
               }
               else
               {
               	echo"<a href='#'>
                 <i class='fa fa-newspaper-o'></i>
                <span>News</span>
                <i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>
                 <li><a href='addnews.php'><i class='fa fa-plus'></i>Add News</a></li>
                 <li><a href='managenews.php'><i class='fa fa-plus'></i>Manage News</a></li>
                </ul>
                ";
               }?>
                
              </li>              
              <li class="treeview">
                
                <?php if(isset($abus)&&$abus=='No'){
               	  echo"<a  disabled=''>
                 <i class='fa fa-lock'></i>
                <span>About Us(No privilages)</span>
                </a>";
               }
               else
               {
               	echo"<a href='#'>
                 <i class='fa fa-bank'></i>
                <span>Users/Team</span>
                <i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>
                 <li><a href='aboutus.php'><i class='fa fa-plus'></i>Add Users</a></li>
                 <li><a href='editaboutus.php'><i class='fa fa-plus'></i>Manage Users</a></li>
                </ul>
                ";
               }?>
                
              </li>
              <li class="treeview">
                
                <?php if(isset($users)&&$users=='No'){
               	  echo"<a  disabled=''>
                 <i class='fa fa-lock'></i>
                <span>Users/Team(No privilages)</span>
                </a>";
               }
               else
               {
               	echo"<a href='#'>
                 <i class='fa fa-users'></i>
                <span>Users/Team</span>
                <i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>
                 <li><a href='adduser.php'><i class='fa fa-plus'></i>Add Users</a></li>
                 <li><a href='editusers.php'><i class='fa fa-plus'></i>Manage Users</a></li>
                </ul>
                ";
               }?>
                
              </li>
              <li class="treeview">
                
                <?php if(isset($compo)&&$compo=='No'){
               	  echo"<a  disabled=''>
                 <i class='fa fa-lock'></i>
                <span>Componets(No privilages)</span>
                </a>";
               }
               else
               {
               	echo"<a  href='#'>
                 <i class='fa fa-spinner'></i>
                <span>Componets</span>
                <i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>
                 <li><a href='addcomponets.php'><i class='fa fa-plus'></i>Add Component</a></li>
                 <li><a href='editcomponent.php'><i class='fa fa-plus'></i>Manage Component</a></li>
                </ul>
                ";
               }?>
                
              </li>
              
			   <li class="treeview">
                
                <?php if(isset($media)&&$media=='No'){
               	  echo"<a  disabled=''>
                 <i class='fa fa-lock'></i>
                <span>Multimedia(No privilages)</span>
                </a>";
               }
               else
               {
               	echo"<a href='#'>
                 <i class='fa fa-film'></i>
                <span>Multimedia</span>
                <i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>
                 <li><a href='addmultimedia.php'><i class='fa fa-plus'></i>Add Multimedia</a></li>
                 <li><a href='editmultimedia.php'><i class='fa fa-plus'></i>Manag Multimedia</a></li>
                </ul>
                ";
               }?>
                
                
              </li>
              <li class="treeview">
                
                 <?php if(isset($roles)&&$roles=='No'){
               	  echo"<a  disabled=''>
                 <i class='fa fa-lock'></i>
                <span>User roles(No privilages)</span>
                </a>";
               }
               else
               {
               	echo"<a href='userroles.php'>
                 <i class='fa fa-user'></i>
                <span>User roles</span>
                <i class='fa fa-angle-left pull-right'></i>
                </a>         
                ";
               }?>
                
              </li>
              <li class="treeview">
                <a href="logout.php">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                
              </li> 
               
              
                          
                </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section">
			
			<div class="header-right">			
				
				<div class="profile_details" >		
					
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper"  >
		
			
				
				<div class="charts">
					<div class="col-md-4 charts-grids widget" style="width:100%" >
						           
                           <h3>
							  List of News available in the database
					
								</h3>
						    
						<div class="row-one widgettable">
			
					
						  <!-- multistep form -->
    <table class="table table-striped">
      <caption><?php if(isset($_SESSION['updated'])) {
      	echo"<div class='alert alert-success'>
                You have Successfully Update your news
             </div>"; 
			 session_destroy();
      }?> </caption>
      <thead>
        <tr>
          <th>SN</th>
          <th>Title</th>
          <th>Writer</th>
          <th>Date</th>
          <th>Full News</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
      	<?php $sqlnews ="SELECT * FROM LatestNews ";

                                 $ret = mysql_query($sqlnews);
                                while($found = mysql_fetch_array($ret))
	                           {
                                 $Fullnews = $found['Fullnews'];$title = $found['Title'];
								 $date = $found['Date'];$password = $found['Uploader'];	
								 $id = $found['id'];
								 
								
								 $sqluser ="SELECT * FROM Administrator WHERE Password='$password'";
                                   $retrieved = mysql_query($sqluser);
                                 while($found = mysql_fetch_array($retrieved))
	                            {
                                   $firstname = $found['Firstname'];
		                           $sirname= $found['Sirname'];
                                     $t= $found['Title'];
				                }	  	      
		                        $name=$t.' '.$firstname.' '.$sirname;
         echo"<tr>        
          <td>$id</td>
          <td>$title</td>
          <td>$firstname</td>
          <td>$date</td>
          <td><button type='button' class='btn btn-primary' data-toggle='popover' data-placement='right' title='$name' data-content='$Fullnews' ><i class='pull-left fa fa-newspaper-o'></i>Full story</button></td>

          <td><a data-toggle='modal' href='#Updatepicture'  data-ni='$title' data-id='$title' data-it='$Fullnews' data-sn='$id' class='open-Updatepicture btn btn-info' style='color: #FFFFFF;font-family:Times New Roman;'><span class='glyphicon glyphicon-edit' style='color: #FFFFFF;'></span>&nbsp;Edit</a></td>
          <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span>&nbsp;Delete</a></td>
		           
        </tr>";
        }?>
      </tbody>
    </table>			
				<div class="clearfix"> </div>
		</div>
								
					</div>
					
					
			
					<div class="clearfix"> </div>
				</div>
			
			</div>
		</div>
	<!--footer-->
	<div class="footer">
	   <p>  <a href="#" target="">Design and Developed by mvumapatrick@gmail.com</a></p>		
	</div>
    <!--//footer-->
	</div>
		
	<!-- new added graphs chart js-->
	
   	<!-- new added graphs chart js-->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src='admin/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- for index page weekly sales java script -->
	
	
	<!-- Bootstrap Core JavaScript -->
   <script src="admin/js/bootstrap.js""> </script>
	<!-- //Bootstrap Core JavaScript -->
	
</body>
</html>