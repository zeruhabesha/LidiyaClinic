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
                             <i class="fa fa-envelope"></i>&nbsp;This screen displays petients records use the search box to spool more records
                         </div>
					
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>No</th><th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Location</th>                
                <th>Payment</th>
                <th>Send</th>
                
            </tr>
        </thead>
        <tbody>
        	 <?php   $sqlmember ="SELECT * FROM tbl_petients WHERE Status='' || Status='Treated' ORDER BY id DESC ";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 { $ID=$found['ID_Number'];
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];
                       $phone=$found['Phone'];$location=$found['Location'];
                       $id=$found['id']; $dob=$found['DOB'];$pay=$found['Payment'];
			                $count=$count+1;   $gender=$found['Gender'];
			              $names= $title.' '.$firstname." ".$sirname;
					  
					 $year=date('y');
			                 $month=date('m');       //todays month
			                 $todayyear='20'.$year;   //this give me todays year
			              
			                 $bornmnth= substr($dob,5,2); //this gives me the born month			   
		                     $bornyear = substr($dob,0,4); //this gives me the born year			  
			               if($month>=$bornmnth)
			                 {			  	
			  	                $age=$todayyear-$bornyear;
			                 }
			             else{
			  	 				 $aged=$todayyear-$bornyear;
						   				  $age=$aged-1;
			                  }
		$date=date('y-m-d');
			                          $sqlc ="SELECT * FROM tbl_laboratory WHERE Patientid='$id' && Date='$date' ";
                                      $retrievesc = mysqli_query($db,$sqlc);
									  $numc=mysqli_num_rows($retrievesc);
									  if($numc!=0){
                                                      while($found = mysqli_fetch_array($retrievesc))
	                                                 {
                                 	                   $tests=$found['Test_comment']; $results=$found['Results'];	
									                    /*$tgl=$found['Test_glucose'];$tbp=$found['Test_bp'];
									                       $tml=$found['Test_malaria'];$thv=$found['Test_hiv'];		              
				  	   			                          $idx=$found['Patientid'];*/
				  	                                  }
													 
									             }
									             else{$tests=""; $results="";}
												 
								   $sqld ="SELECT * FROM tbl_labresults WHERE Patientid='$id' && Date='$date' ";
                                      $retrievesd = mysqli_query($db,$sqld);
									  $numd=mysqli_num_rows($retrievesd);
									  if($numd!=0){
                                                      while($found = mysqli_fetch_array($retrievesd))
	                                                 {
                                 	                    
									                       $tgl=$found['Test_RBS'];$tbp=$found['Test_FBS'];
									                       $tml=$found['Test_PBS'];$thv=$found['Test_UCT'];
									                       $mrdt=$found['Test_MRDT'];$fbc=$found['Test_FBC'];
									                       $tft=$found['Test_TFT'];$lft=$found['Test_LFT'];
														   
														   $comrbs=$found['RBS_Comment'];$comfbs=$found['FBS_Comment'];
									                       $compbs=$found['PBS_Comment'];$comuct=$found['UCT_Comment'];
									                       $commrdt=$found['MRDT_Comment'];$comfbc=$found['FBC_Comment'];
									                       $comtft=$found['TFT_Comment'];$comlft=$found['LFT_Comment'];		              
				  	   			              
				  	                                  }
													 $btn='btn-success';
									             }
									             else{$btn='btn-primary'; $tgl='';$tbp="";$tml="";$thv="";
												            $mrdt="";$fbc="";$tft="";$lft="";$comrbs="";$comfbs="";
									                       $compbs="";$comuct="";$commrdt="";$comfbc="";
									                       $comtft="";$comlft="";		              
				  	   			              
														
												 }
												              $drug='';$disease='';
												  $sqld ="SELECT * FROM tbl_treatment WHERE Patientid='$id'  ";
                                      $retrievesd = mysqli_query($db,$sqld);
									   $numd=mysqli_num_rows($retrievesd);
									  if($numd!=0){     
                                                      while($found = mysqli_fetch_array($retrievesd))
	                                                 {
                                 	                    
									                      $drugname=$found['Drugid'];$quantinty=$found['Quantity'];
									                       $units=$found['Timesperday'];$comment=$found['Prescribe_Comment'];	
													          $officer=$found['Officer'];  $dates=$found['Date'];															  
														  $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$drugname' ";
                                                              $retrieved = mysqli_query($db,$sqluser);
                                                              while($found = mysqli_fetch_array($retrieved))
	                                                          {
                                                                   
																   $morning=$found['Strength'];
																   $after=$found['Medstype'];
																   $price= $found['RetailPrice'];
																  
																   		                                                          
													          }
						$drug=$drug.$drugname.' ('.$morning.') ('.$after.') Times per day('.$units.')  &nbsp; By('.$officer.')<br>';
														$disease=$disease.$comment.'   ('.$dates.')<br>';
													  
													 }
                                                           
                                                   }else{$officer='Pamzey';}
				  	          
				        echo"<tr>  
				             <td>$count</td>   <td>$ID</td>                                       
                             <td>$title $firstname $sirname</td>        	
                             <td>$age</td>
                             <td>$gender</td>
			                 <td>$location</td>
			                 <td>$pay</td>
			                 <td>
			                   <a data-id='$id'  class='open-Deleted btn  btn-primary' title='send petient' ><span class='fa fa-edit' style='color:white;'></span></a>
							 
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
	
    