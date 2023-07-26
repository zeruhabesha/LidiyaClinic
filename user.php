<?php 
session_start();
include("db_connect.php");

if(isset($_COOKIE['userid'])&&$_COOKIE['useremail']){
	
	$userid=$_COOKIE['userid'];
$useremail=$_COOKIE['useremail'];

$sqluser ="SELECT * FROM tbl_users WHERE Password='$userid' && Email='$useremail'";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
			  //$institution = $found['Institution'];	
			  $emails = $found['Email'];
			  	   $id= $found['id'];
          	   $role= $found['Role'];	
		          $profile='';
		 } 
}else{
	 header('location:index.php');
      exit;
     }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Clinic System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

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

<!-- chart -->
<script src="admin/js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
 
 <!-- <script src="jquery.js"></script> -->    
<link href="css/animate.min.css" rel="stylesheet"/>   
      <link rel="stylesheet" href="css/bootstrap-dropdownhover.css">

   
<link rel="stylesheet" href="data-table/jquery.dataTables.min.css"/>
 <link rel="stylesheet" href="data-table/buttons.dataTables.min.css"/>      

   
   <script src='data-table/jquery-1.12.4.js'></script>
   <script src='data-table/jquery.dataTables.min.js'></script>
   <script src='data-table/dataTables.buttons.min.js'></script>
   <script src='data-table/buttons.flash.min.js'></script>
   <script src='data-table/jszip.min.js'></script>
   <script src='data-table/pdfmake.min.js'></script>
   <script src='data-table/vfs_fonts.js'></script>
   <script src='data-table/buttons.html5.min.js'></script>
   <script src='data-table/buttons.print.min.js'></script>
         <script>
      
      $(document).ready(function() {
    $('#example').DataTable( {
        
        
    } );
        } );
      
      </script>


<script type="text/javascript">
 $(document).on("click", ".open-Updatepicture", function () {
     var myTitle = $(this).data('id');
     $(".modal-body #bookId").val(myTitle);
     
}); 
 </script>
 	<!-- requried-jsfiles-for owl -->
									<!-- //requried-jsfiles-for owl -->
</head> 
<script type="text/javascript">


 $(document).on("click", ".open-Others", function () { //user clicks on button
               			$(".open-Others").html("Yes we can");

          });
//Ajax load function

</script>
<?php if(isset($_SESSION['memberadded'])){?>
 <script type="text/javascript"> 
 	          $(document).ready(function(){
 	          	                             swal({title: "Successful!", text: "User added successfully!!.", type: "success"});
                                  });
              </script>
            
           <?php 
	   session_destroy();		
		    }?>
		    <?php if(isset($_SESSION['memberexist'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "There is arleady a tutor with those details in the system", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
            <?php if(isset($_SESSION['emptytextboxes'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "You did not fill all the textboxes on the form", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
           
           <?php if(isset($_SESSION['cat'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "This category arleady in the system", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
           
           
 

      
 
     


   
  
				
	
			<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">Staff</h4>
					<!-- start content_slider -->
				<div class="alert alert-info">
                             <i class="fa fa-envelope"></i>&nbsp;This screen displays 50 records use the search box to spool more records
                         </div>
					
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Status</th>
                <th>Last Seen</th>
                <th>Give Rights</th>
                 <th>Reset Password</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        	 <?php   
        	 
        	 
        	      $sqlmember ="SELECT * FROM tbl_users WHERE State!='Super'";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];$phones=$found['Phone'];
                       $id=$found['id'];$online=$found['Online'];$role=$found['Role'];
			                $count=$count+1;  $get_time=$found['Time']; $time=time(); $pass=$found['Password'];
			              $names=$firstname." ".$sirname;
					     $sql ="SELECT * FROM tbl_userprivilages WHERE Userid='$id' ";
                                                              $retr = mysqli_query($db,$sql);
                                                              while($found = mysqli_fetch_array($retr))
	                                                          {
                                                                       $adduser = $found['Adduser'];
		                                                               $manageuser= $found['Manageuser'];
																	   $logact= $found['Logactivities'];
		                                                               $addpat= $found['Addpatient'];
	        														   $editpat = $found['Editpatient'];																	   
																	   $managepat= $found['Managepatient'];																	   
																	   $consul = $found['Consultation'];
		                                                               $labs= $found['Labaccess'];
																	   $accountsa= $found['Accountaccess'];
		                                                               $gdrugs= $found['Givedrugs'];
	        														   $adddrugs = $found['Adddrugs'];																	   
																	   $managedrugs= $found['Managedrugs'];
																	   $tsales= $found['Todayssales'];
	        														   $ttreat = $found['Todaystreat'];																	   
																	   $montre= $found['Monthlyreport'];
											    } 
					   if($online=='Online'){
						                    $dis="<img src='admin/images/dot.png' height='15px' width='15px' alt=''>";
                                           }else
                                           {
                                             $dis="<img src='admin/images/dotoffline.png' height='15px' width='15px' alt=''>";											
                                           }
				                   
				                  $diff= $time-$get_time;		
		    switch(1)
		           {
				case ($diff < 60):       //calculate seconds
					$count=$diff;
				  if($count==0)
					$count="a moment";
				elseif($count==1)
				    $suffix="second";
				else
					$suffix="seconds";
				break;
				
				case ($diff > 60 && $diff < 3600): //calculate minutes
					$count=floor($diff/60);
				  if($count==1)
					$suffix="minute";
				else
				    $suffix="minutes";
				break;
				
				case ($diff > 3600 && $diff < 86400):   //calculate hours
					$count=floor($diff/3600 );
				  if($count==1)
					$suffix="hour";
				else
				    $suffix="hours";
				break;
				
				case ($diff>86400): //calculate days
					$count=floor($diff/86400);
				  if($count==1)
					$suffix="day";
				else
				    $suffix="days";
				break;
		           
		           }
		           if ($get_time==0){$lseen="Not activated";}
		           
				   elseif(!isset($suffix)) { $lseen=$count." ago ";}
		                                         else{
		                                         	   $lseen=$count." ".$suffix." ago ";
		                                              }
		           	 
			           echo"<tr>                                           
                             <td>$title $firstname $sirname</td>        	
                             <td>$phones</td>
                             <td>$role</td>
			                 <td>$online $dis</td>
			                 <td>$lseen</td>
			                 <td>
			                <a data-toggle='modal' data-p1='$adduser' data-p2='$manageuser' data-p3='$logact' data-p4='$addpat' data-p5='$editpat' data-p6='$managepat' data-p7='$consul' data-p8='$labs' data-p9='$accountsa' data-p10='$gdrugs' data-p11='$adddrugs' data-p12='$managedrugs' data-p13='$tsales' data-p14='$ttreat' data-p15='$montre' data-id='$id' data-ik='$names' href='#Privilages' class='open-Privilages btn  btn-primary' title='Click here to add/change user privilages'><span class='glyphicon glyphicon-check' style='color:white;' ></span></a>
			                	 
			                 </td>
			                 <td>
			                   <a data-toggle='modal' data-id='$pass' data-ik='$firstname'  class='open-Passwords btn  btn-warning' title='rest user password' href='#Passwords'><span class='glyphicon glyphicon-cog' style='color:white;'></span></a>
							 
			                 </td>				                 
			                 <td>
			                   <a data-id='$id'  class='open-Delete btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
							 
			                 </td>			 
                             </tr>"; 
					 
					 } 
		
		           	?>
            </tbody>
        
    </table>
                           
				        </div>
		
				</div>

					<!--//sreen-gallery-cursual---->
			</div>
		 