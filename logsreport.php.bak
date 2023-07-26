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
			    $profile= $found['Pic_name'];
   
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
        
    } );
        } );
      
      </script> 
			
			<div class="charts">		
			<div class="col-md-4 charts-grids widget states-mdl" style="width:100%">
					
				<div class="middle-content" >
						<h4 class="title">SYSTEM USER REPORTS</h4>
					     <div class="alert alert-info">
                             <i class="fa fa-envelope"></i>&nbsp;This screen displays 10 records use the search box to spool more records
                         </div>
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>SN</th>
            	<th>User</th>
            	<th>IP address</th>
                <th>Login</th>
                <th>Logout</th>               
                <th>Activities</th>
                <th>View</th>              
                <th>Delete</th>
               
            </tr>
        </thead>
        <tbody>
            <?php  
            
                  $query = "SELECT * FROM tbl_userlogs  ";
                      $result =mysqli_query($db,$query) or die('Error, query failed');
                        if( mysqli_num_rows($result) != 0)                         
                         {
                         	        
                         	 while($found = mysqli_fetch_array($result))
	                                        {   
												 $logid= $found['Userid'];
												
												$query = "SELECT * FROM tbl_users WHERE id='$logid'";
                                                 $result =mysqli_query($db,$query) or die('Error, query failed');
                                                 $urow = mysqli_fetch_assoc($result);	
		                                          $fname=$urow['Firstname'];$sname=$urow['Sirname'];
		                                           $position=$urow['Role'];
										  $querys = "SELECT * FROM tbl_userlogs WHERE Userid='$logid' ";
                                           $results =mysqli_query($db,$querys) or die('Error, query failed');
                 
	                                         while($found = mysqli_fetch_array($results))
	                                        { 
												 $number= $found['Count'];
												 $ip= $found['Machineip'];												
												 $logintime= $found['Login'];
												 $logouttime= $found['Logout'];
												 $id= $found['id'];$userid=$found['Userid'];
												 $string= $found['Activities'];
												$strin = nl2br($string); 
												 $uname=$fname.' '.$sname;
				                                 
			                 echo"
                             <tr> 
                             <td>$id</td>
                             <td>$uname</td>
                               <td>$ip</td>	
			                 <td>$logintime</td> 
			                 <td>$logouttime</td>
			                 <td>$number</td>			               
			                 <td>
                              <a  data-toggle='modal' href='#displaystudent' data-ia='$strin' data-id='$uname' data-ie='$number'   data-if='$ip' data-ig='$logintime' data-ih='$logouttime' data-ij='Dr Y B Mlombe Pvt Clinic' data-ik='$position' class='open-Passwordss btn  btn-success' title='Click here to view user all student record'><span class='glyphicon glyphicon-eye-open' style='color:white;' ></span></a>

                             </td>
			                 			                 
			                 <td>
			                   <a data-id='$id' data-ix='$userid'  class='open-Deleted2 btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
							 
			                 </td>			 
                            
			                 </tr>
			                     "; 
					           
					 } }}
		
		           	?>         
        </tbody>
       
    </table>

				        </div>
					
			</div>
		</div>
		
				