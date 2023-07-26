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
<title>MASS</title>
<link rel="stylesheet" href="css/reset.min.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" type="text/css" href="css/style2.css" />


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

 	<!-- requried-jsfiles-for owl -->
									<!-- //requried-jsfiles-for owl -->
</head> 

			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">PATIENTS</h4>
					<!-- start content_slider -->
				<div class="alert alert-info">
                             <i class="fa fa-envelope"></i>&nbsp;This screen displays appointment records use the search box to spool more records
                         </div>
					
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>No</th>
                <th>PatientID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Send</th>
				 <th>Edit</th> <th>Print</th>
                
            </tr>
        </thead>
        <tbody>
        	 <?php   $sqlmember ="SELECT * FROM appointment WHERE status='' || status='Treated' ORDER BY id DESC ";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 { $PatientID=$found['PatientID'];
				  $title=$found['title'];
                       $first=$found['first'];
					  $middle=$found['middle'];
					   $sir=$found['sir'];
					   $status=$found['status'];
                       $date=$found['date'];
                       $id=$found['id']; 
			                $count=$count+1;     		                                                          

				  	          
				        echo"<tr>  
				             <td>$count</td>   <td>$PatientID</td>                                       
                             <td>$title $first $middle $sir</td>        	
                             <td>$date</td>
			                <td>
			                   <a data-s1='$PatientID'  class='open-Dele btn  btn-primary' title='send petient' ><span class='fa fa-edit' style='color:white;'></span></a>
			                 </td>	
							 
                            <td>
                                <a data-toggle='modal' data-bn='$PatientID' data-br='$title' data-s1='$first' data-bc='$middle' data-c7='$sir' data-tf='$status' data-id='$id' data-im='$date' href='#appoint' class='open-appoint btn  btn-info' title='Edit appointment records'><span class='glyphicon glyphicon-edit' style='color:white;'></span></a>
			         							 
			                  </td>	
<td>
					        <a  data-toggle='modal' href='#displayappoint' data-ff='$PatientID' data-it='$title' data-ik='$first' data-ig='$middle' data-et='$sir' data-ir='$status' data-id='$id' data-ic='$date' class='open-appointdisplay btn  btn-info' title='Click here to view and print receipt'><span class='glyphicon glyphicon-print' style='color:white;' ></span></a>
							
			                </td>							  
			                 		 
                             </tr>"; 
					 
					 } 
		
		           	?>
            </tbody>
        
    </table>
                           
				        </div>
		
				</div>

					<!--//sreen-gallery-cursual---->
			
	<!-- new added graphs chart js-->
	
    