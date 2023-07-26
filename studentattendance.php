<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['userid'])&&$_COOKIE['useremail']){
	
	$userid=$_COOKIE['userid'];
$useremail=$_COOKIE['useremail'];

$sqluser ="SELECT * FROM tbl_teachers WHERE Password='$userid' && Email='$useremail'";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
			  $institution = $found['School'];	
			  $emails = $found['Email'];
			  	   $id= $found['id'];
				   $school= $found['School'];			  
          	   $role= $found['Position'];	
		
			$sql ="SELECT * FROM Profile_Picture WHERE Studentid='$id' && Category='Teacher'";
             $ret = mysqli_query($db,$sql);
			 $nms=mysqli_num_rows($ret);
			 if($nms!=0){
               while($found = mysqli_fetch_array($ret))
	            {
                   $profile=$found['name'];   
  	            }
			    }else{$profile=''; }
  	    }
}else{
	 header('location:index.php');
      exit;
}

$studentid= $_GET['studentid'];
   $sqlmembe ="SELECT * FROM tbl_students WHERE School='$institution' && id='$studentid' ";
			       $retriev = mysqli_query($db,$sqlmembe);
				                
                     while($found = mysqli_fetch_array($retriev))
	                 {
                       $fname=$found['Firstname'];
                       $lname=$found['Sirname'];			             			            
			          $stand=$found['Standard'];
			         }
			         $studentname=$fname.' '.$lname;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>MASS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
             
             <!-- //the next plugin link below are for date --> 
      <link rel="stylesheet" href="css/zebra_datepicker.min.css" type="text/css">
      

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
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
 <!-- //the links below are for date plugin -->
 <style>
@import "bourbon";

// Breakpoints
$bp-maggie: 15em; 
$bp-lisa: 30em;
$bp-bart: 48em;
$bp-marge: 62em;
$bp-homer: 75em;

// Styles
* {
 @include box-sizing(border-box);
 
 &:before,
 &:after {
   @include box-sizing(border-box);
 }
}

body {
  font-family: $helvetica;
  color: rgba(94,93,82,1);
}

a {
  color: rgba(51,122,168,1);
  
  &:hover,
  &:focus {
    color: rgba(75,138,178,1); 
  }
}

.container {
  margin: 5% 3%;
  
  @media (min-width: $bp-bart) {
    margin: 2%; 
  }
  
  @media (min-width: $bp-homer) {
    margin: 2em auto;
    max-width: $bp-homer;
  }
}

.responsive-table {
  width: 100%;
  margin-bottom: 1.5em;
  border-spacing: 0;
  
  @media (min-width: $bp-bart) {
    font-size: .9em; 
  }
  
  @media (min-width: $bp-marge) {
    font-size: 1em; 
  }
  
  thead {
    // Accessibly hide <thead> on narrow viewports
    position: absolute;
    clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
    padding: 0;
    border: 0;
    height: 1px; 
    width: 1px; 
    overflow: hidden;
    
    @media (min-width: $bp-bart) {
      // Unhide <thead> on wide viewports
      position: relative;
      clip: auto;
      height: auto;
      width: auto;
      overflow: auto;
    }
    
    th {
      background-color: rgba(29,150,178,1);
      border: 1px solid rgba(29,150,178,1);
      font-weight: normal;
      text-align: center;
      color: white;
      
      &:first-of-type {
        text-align: left; 
      }
    }
  }
  
  // Set these items to display: block for narrow viewports
  tbody,
  tr,
  th,
  td {
    display: block;
    padding: 0;
    text-align: left;
    white-space: normal;
  }
  
  tr {   
    @media (min-width: $bp-bart) {
      // Undo display: block 
      display: table-row; 
    }
  }
  
  th,
  td {
    padding: .5em;
    vertical-align: middle;
    
    @media (min-width: $bp-lisa) {
      padding: .75em .5em; 
    }
    
    @media (min-width: $bp-bart) {
      // Undo display: block 
      display: table-cell;
      padding: .5em;
    }
    
    @media (min-width: $bp-marge) {
      padding: .75em .5em; 
    }
    
    @media (min-width: $bp-homer) {
      padding: .75em; 
    }
  }
  
  caption {
    margin-bottom: 1em;
    font-size: 1em;
    font-weight: bold;
    text-align: center;
    
    @media (min-width: $bp-bart) {
      font-size: 1.5em;
    }
  }
  
  tfoot {
    font-size: .8em;
    font-style: italic;
    
    @media (min-width: $bp-marge) {
      font-size: .9em;
    }
  }
  
  tbody {
    @media (min-width: $bp-bart) {
      // Undo display: block 
      display: table-row-group; 
    }
    
    tr {
      margin-bottom: 1em;
      
      @media (min-width: $bp-bart) {
        // Undo display: block 
        display: table-row;
        border-width: 1px;
      }
      
      &:last-of-type {
        margin-bottom: 0; 
      }
      
      &:nth-of-type(even) {
        @media (min-width: $bp-bart) {
          background-color: rgba(94,93,82,.1);
        }
      }
    }
    
    th[scope="row"] {
      background-color: rgba(29,150,178,1);
      color: white;
      
      @media (min-width: $bp-lisa) {
        border-left: 1px solid  rgba(29,150,178,1);
        border-bottom: 1px solid  rgba(29,150,178,1);
      }
      
      @media (min-width: $bp-bart) {
        background-color: transparent;
        color: rgba(94,93,82,1);
        text-align: left;
      }
    }
    
    td {
      text-align: right;
      
      @media (min-width: $bp-bart) {
        border-left: 1px solid  rgba(29,150,178,1);
        border-bottom: 1px solid  rgba(29,150,178,1);
        text-align: center; 
      }
      
      &:last-of-type {
        @media (min-width: $bp-bart) {
          border-right: 1px solid  rgba(29,150,178,1);
        } 
      }
    }
    
    td[data-type=currency] {
      text-align: right; 
    }
    
    td[data-title]:before {
      content: attr(data-title);
      float: left;
      font-size: .8em;
      color: rgba(94,93,82,.75);
      
      @media (min-width: $bp-lisa) {
        font-size: .9em; 
      }
      
      @media (min-width: $bp-bart) {
        // Don’t show data-title labels 
        content: none; 
      }
    } 
  }
}
.grey {
  background-color: rgba(128,128,128,.25);
}
.red {
  background-color: rgba(255,0,0,.25);
}
.blue {
  background-color: rgba(0,0,255,.25);
}
</style>
       <script>
      
      $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
        } );
      
      </script>
   	  
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
	
<script type="text/javascript">
 $(document).on("click", ".open-Updatepicture", function () {
     var myTitle = $(this).data('id');
     $(".modal-body #bookId").val(myTitle);
     
}); 
 </script>
 
	<!-- requried-jsfiles-for owl -->
					<link href="admin/css/owl.carousel.css" rel="stylesheet">
					<script src="admin/js/owl.carousel.js"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
					<!-- //requried-jsfiles-for owl -->
</head> 
<script type="text/javascript"> 
 $(document).on("click",".open-Approved",function(){
 	var myApproved=$(this).data('id');
 	  
               $.ajax({
                url: "upload.php", //php file which recive the new value and save it to the database
                data: { "Approvedstudies": myApproved },  //send the new value
               dataType:'json',
                method: "POST",
                success : function(response){
                $("#login_buttonz").html(response.Value);
                 //$("#total").html(response.Value2); 
	                	    }          
                  });  	
 });
</script>
<script type="text/javascript">


 $(document).on("click", ".open-Others", function () { //user clicks on button
               			$(".open-Others").html("Yes we can");

          });
//Ajax load function

</script>

 
<?php if(isset($_SESSION['reports'])) {?>
<script type="text/javascript"> 

$(document).ready(function(){ 
                           var myValue = "Load";
                                        swal({
                                         title: "successfully",
                                         text: "Students Attendance saved",
                                         type: "success",
                                         showCancelButton: false,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                           location.reload();
                                                     } 
                                           
                                         });
                                         
                                                    });
       
                    </script>
      <?php  session_destroy(); }?>
      
  
 
   
 
<div id="Updatepicture" class="modal fade" role="dialog">
  <div class="modal-dialog" style="float:right;width:20%">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">        	        	
        	</h4>
      </div>
      <div class="modal-body" >
        <center><p></p>
        	<form method="post" action="upload.php" enctype='multipart/form-data'>        		
            
        	<p style="margin-bottom:10px;">
        			Select picture<input name='file2' type='file' id='file2' >
           </p>  
           <p>
        	<input name='id' type='hidden' value='' id='bookId'>
        	<input name='category' type='hidden' value='User'>

           </p>     	      		
	                
        </center>
      </div>
      <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Change" id="btns1" name="Change"> &nbsp;
                  
      </div>
      </div>
       </form>
  </div>
  </div>
 <div id="Taxreceipted" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SEARCH STUDENT ATTENDANCE BY ACADEMIC YEAR
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	     <form action="printrange.php" method="post">
  <div class="input-group" style="margin-bottom:10px;">
          <span class="input-group-addon">Academic Year</span>
   <select  name="biological"  id='gender' style="height:30px; width: 100%" > 
            				        <option>2018-2019</option>
            				        <option>2019-2020</option>             				     		                           
		                            <option>2020-2022</option>
		                            <option>2022-2023</option>
		                            <option>2023-2024</option>	
		                               <option>2024-2025</option>									             			 	
				                                  
            				                         </select>

  </div>
  
  

      </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
      </div>
      </form> 
      </div>       
  </div>
  </div> 
<body >
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section">
			<div class="header-left">
				<!--toggle button start-->
				<a href='administrator.php'><button id="showLeftPush" ><i class="fa fa-home"></i></button></a>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
						<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				
				<div class="profile_details" >		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
								<span class="prfil-img">
										<?php   
										
                                                if($profile!=""){
												                 
																	echo"<img src='multimedia/pictures/$profile' height='50px' width='50px' alt=''>";	   
												             }
												        else{
												           	echo"<img src='admin/images/profile.png' height='50px' width='50px' alt=''>";	   
														     	
												             }
										
										?>
										 </span> 
									<div class="user-name" >
										<p style="color:#1D809F;"><?php if(isset($sirname))
                                            {echo"<strong>".$firstname." ".$sirname."! </strong>";} ?>
				                         </p>
										<span><?php if(isset($sirname)){echo$role;} ?> &nbsp;<img src='admin/images/dot.png' height='15px' width='15px' alt=''>
										</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								 <li>
                                  <a data-toggle='modal' data-id='<?php echo$id; ?>' href='#Updatepicture' class='open-Updatepicture'><i class="fa fa-user"></i>Change profile picture</a>
                                 </li>
								<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper"  >
		
			<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">ATTENDANCE RECORDS OF <?php echo$studentname;?> </h4>
                            
					     
<table class="table table-bordered table-striped table-hover">
	
   
        <tbody>
            <tr>
                <td colspan="19">School</td>
                <td colspan="8">Standard</td>
                <td colspan="7">Academic Year</td>
                </tr>
            <tr>
                <td colspan="19"><?php echo$institution; ?></td>
                <td colspan="8"><?php echo$stand; ?></td>
                <td colspan="7"><?php $date=date('Y');
			             $todate=$date+1;
			             echo$year=$date.'-'.$todate; ?>
					 </td>
             </tr>
            <tr>
                <td rowspan="2" colspan="32">&nbsp;</td>
                <td colspan="2">Attendance</td>
                   </tr>
            <tr>
                <td>Present</td>
                <td>Absent</td>
                         </tr>
           <tr>
                <td>January</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                 <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
            
                         </tr>
       <tr>
                <td></td>
                       <?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count1=0;$counted1=0;						   
				while ($x <=31) {							                       	
			  				 $month ='01';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count1=$count1+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted1=$counted1+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                <td>$count1</td>
                <td>$counted1</td>";
               
                ?>                     </tr>
                          <tr>
                <td>February</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td></td>
                <td></td>
                <td></td>
               <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
                         </tr>
       <tr>
                <td></td>
                   <?php
                       $date=date('y');
                       $selectedyear=$date;
                		$count2=0;$counted2=0;
						$x =1; 						   
				while ($x <=28) {							                       	
			  				 $month ='02';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count2=$count2+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted2=$counted2+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                 <td></td>
                <td></td>
                <td></td>
             
                <td>$count2</td>
                <td>$counted2</td>";
               
                ?> 
               
                 
               
                         </tr>
                         <tr>
                <td>March</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td>31</td>
               <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
               
                         </tr>
       <tr>
                <td></td>
                <?php
                      $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count3=0;$counted3=0;						   
				while ($x <=31) {							                       	
			  				 $month ='03';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count3=$count3+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted3=$counted3+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                 
                <td>$count3</td>
                <td>$counted3</td>";
               
                ?> 
                      
                         </tr>
                         <tr>
                <td>April</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td></td>
                <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
               
                         </tr>
       <tr>
                <td></td>
                <?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count4=0;$counted4=0;						   
				while ($x <=30) {							                       	
			  				 $month ='04';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count4=$count4+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted4=$counted4+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                  <td></td>
                <td>$count4</td>
                <td>$counted4</td>";
               
                ?>   
                 
                         </tr>
                         <tr>
                <td>May</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
               
                         </tr>
       <tr>
                <td></td>
                <?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count5=0;$counted5=0;						   
				while ($x <=31) {							                       	
			  				 $month ='05';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count5=$count5+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted5=$counted5+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                  
                <td>$count5</td>
                <td>$counted5</td>";
               
                ?>   
                     
                         </tr>
                         <tr>
                <td>June</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td></td>
               <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
               
               
                         </tr>
       <tr>
                <td></td>
                         <?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count6=0;$counted6=0;						   
				while ($x <=30) {							                       	
			  				 $month ='06';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count6=$count6+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted6=$counted6+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                  <td></td>
                <td>$count6</td>
                <td>$counted6</td>";
               
                ?> 
               
                 
                         </tr>
                         <tr>
                <td>July</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                 <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
               
                         </tr>
       <tr>
                <td></td>
                <?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count7=0;$counted7=0;						   
				while ($x <=31) {							                       	
			  				 $month ='07';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count7=$count7+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted7=$counted7+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                  
                <td>$count7</td>
                <td>$counted7</td>";
               
                ?> 
                         </tr><tr>
                <td>August</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
               
                         </tr>
       <tr>
                <td></td>
<?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count8=0;$counted8=0;						   
				while ($x <=31) {							                       	
			  				 $month ='08';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count8=$count8+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted8=$counted8+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                  
                <td>$count8</td>
                <td>$counted8</td>";
               
                ?>                  
                         </tr>
                         <tr>
                <td>September</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td></td>
                 <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
              
                         </tr>
       <tr>
                <td></td>
                <?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count9=0;$counted9=0;						   
				while ($x <=30) {							                       	
			  				 $month ='09';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count9=$count9+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted9=$counted9+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                  <td></td>
                <td>$count9</td>
                <td>$counted9</td>";
               
                ?>                  
                
                 
                         </tr>
                         <tr>
                <td>October</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                  <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
               
                        </tr>
                         <tr>
                <td></td>
               <?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count10=0;$counted10=0;						   
				while ($x <=31) {							                       	
			  				 $month ='10';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count10=$count10+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted10=$counted10+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                  
                <td>$count10</td>
                <td>$counted10</td>";
               
                ?>                  
                
                 
                          </tr>
                  <tr>
              <td>November</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td></td>
                 <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
                         </tr>
       <tr>
                <td></td>
                <?php
                $x =1; 		$count11=0;$counted11=0;						   
				while ($x <=30) {							                       	
			  				 $month ='11';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count11=$count11+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted11=$counted11+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"<td></td>
                <td>$count11</td>
                <td>$counted11</td>";
               
                ?>
                  </tr>
                         <tr>
                <td>December</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                  <td><i style='color:green' class='fa fa-check'></td>
                <td><i  style='color:red' class='fa fa-close'></i></td>
                         </tr>
                         <tr>
                <td></td>
                <?php
                       $date=date('y');
                       $selectedyear=$date;
                $x =1; 		$count12=0;$counted12=0;						   
				while ($x <=31) {							                       	
			  				 $month ='12';
                             $year =$selectedyear;
                             $date =$year.'-'.$month.'-'.$x;													    
							$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$studentid' && Attendance='Yes' && Date='$date' ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {    $count12=$count12+1;
                                                           echo"<td><i style='color:green' class='fa fa-check'></td>";	
														  
														  }else{ $counted12=$counted12+1;
														  	       echo"<td></td>";}
																							
		                                              
													   $x=$x+1;
								           }
                
                
                echo"
                
                <td>$count12</td>
                <td>$counted12</td>";
               
                ?>                  
                    
                         </tr>
                         <tr>
                         	<td colspan="32"></td>
                 <td >Present</td>
                <td>Absent</td>
                         </tr>
                         <tr>
                         	<td colspan="32">Total</td>

                <td><?php echo$present=$count1+$count2+$count3+$count4+$count5+$count6+$count7+$count8+$count9+$count10+$count11+$count12?></td>
                <td><?php echo$absent=$counted1+$counted2+$counted3+$counted4+$counted5+$counted6+$counted7+$counted8+$counted9+$counted10+$counted11+$counted12?></td>
                         </tr>
         </tbody>
         
</table>
					           <a data-toggle='modal' href="#Taxreceipted" class="Open-Taxreceipted btn btn-info"><i class='fa fa-search'></i>Filter</a>

							<button type="submit" class="btn btn-success" id="PrintButton" onclick="PrintPage()"><span class='glyphicon glyphicon-print' style="color: white"></span>&nbsp;Print </button>&nbsp;

</div>

<br /><br />

</div>

				        </div>
					
			</div>
		</div>
		
				</div>
		</div>
	<!--footer-->
	<div class="footer">
	   <p>  <a href="#" target="">Design and Developed by mvumapatrick@gmail.com</a></p>		
	</div>
    <!--//footer-->
	</div>
		
		
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
	
	<!-- // the two links below are for date picker calendar -->
   <script type="text/javascript" src="js/zebra_datepicker.min.js"></script>        
        <script type="text/javascript" src="js/examples.js"></script>

			
	<!-- Bootstrap Core JavaScript -->
   <script src="admin/js/bootstrap.js"> </script>
	 <!-- //Bootstrap Core JavaScript -->
	 
	 	<script src="css/bootstrap-dropdownhover.js"></script>
	 	
<script type="text/javascript">

	function PrintPage() {
		window.print();
	}
</script>
	
  	
 </body>
</html>