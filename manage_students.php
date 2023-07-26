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
//$pass=200;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>MASS</title>

<!-- below they are plugins for the submission form --> 
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


<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">

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
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
        } );
      
      </script> 
	
				
				
					
					
					<div class="col-md-4 charts-grids widget states-mdl" style="width:100%">
						
						<div class="middle-content">
						<h4 class="title">DRUGS AVAILABLE IN THE SYSTEM</h4>
					     <div class="alert alert-info">
                             <i class="fa fa-info"></i>&nbsp;This screen displays 10 records use the search box to spool more records
                         </div>
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>No</th>
            	<th>Name</th>
            	<th>Mafg</th>
            	<th>Exp</th>
                <th>Available</th>                               
                <th>Retail Price</th>               
                <th>Edit</th> 
             
            </tr>
        </thead>
        <tbody>
            <?php   $sqlmembe ="SELECT * FROM tbl_drugs ORDER BY id DESC";
			       $retriev = mysqli_query($db,$sqlmembe);
				                $count=0;
                     while($found = mysqli_fetch_array($retriev))
	                 {            $count=$count+1;
                             $fname=$found['Name'];$Quantity=$found['Drugsremain'];
			                 $doe=$found['DOE']; $retail=$found['RetailPrice']; 
			                 $ids=$found['id']; $pp=$found['PurchasedPrice']; 			            
			                       
						    
                          $sqluser ="SELECT * FROM tbl_vendors WHERE Drugid='$ids'";
                              $retrieved = mysqli_query($db,$sqluser);
                      while($found = mysqli_fetch_array($retrieved))
	                     {
                                 	 $fullnames=$found['Fullname']; $location=$found['Location'];
									  $phone=$found['Phone']; $email=$found['Email']; 
						                  $dop=$found['DOP']; 
			              
				  	    }
						  
						
						     echo"
                             <tr> 
                             <td>$count</td>
                             <td>$fname</td>
			                 <td>$dop</td> 
			                 <td>$doe</td>
			                 <td>$Quantity</td>			                 
			                 <td>Birr $retail</td>	
			                  
			                
			                
			                 <td>
                                <a data-toggle='modal' data-bn='$fname' data-br='$dop' data-bl='$doe' data-bc='$Quantity' data-dp='$retail' data-tf='$email' data-id='$ids' data-im='$fullnames' data-em='$location' data-ep='$phone' data-et='$email' data-pm='$pp' href='#Code1' class='open-Code1 btn  btn-info' title='Edit Drugs records'><span class='glyphicon glyphicon-edit' style='color:white;'></span></a>
			         							 
			                  </td>				                 
			                     <td>
			                   <a data-id='$ids'  data-ix='$fname' class='open-Deleted3 btn  btn-danger' title='delete drugs' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
							 
			                 </td>	
			                 
			                 </tr>
			                     "; // data-id='".$found['id']."' 
					           
					 } 
		
		           	?>         
        </tbody>
        
    </table>

				        </div>
					
					</div>
			
				
			<!--<a   href='#' data-ip='$ids' class='openrecords btn btn-success' title='Click here to view all student education history'><span class='glyphicon glyphicon-calendar' style='color:white;' ></span></a>
-->

			