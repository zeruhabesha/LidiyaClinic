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

<link rel="stylesheet" href="dist/css/lightbox.min.css"></head>
<script src="dist/js/lightbox-plus-jquery.min.js"></script>

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
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
        } );
      
      </script>

 	<!-- requried-jsfiles-for owl -->
									<!-- //requried-jsfiles-for owl -->
</head> 

			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">ADMISSION LIST OF PATIENTS</h4>
					<!-- start content_slider -->
				<div class="alert alert-info">
                             <i class="fa fa-envelope"></i>&nbsp;This screen displays petients records use the search box to spool more records
                         </div>
					
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>No</th>
                <th>Name</th>                
                <th>Age</th>                               
                <th>Treatment</th>
                <th>Tests</th>
                <th>Results</th>
                <th>Vitals</th>
                <th>Progress</th>
                <th>Prescribe</th>
                
                
            </tr>
        </thead>
        <tbody>
        	 <?php   $sqlmember ="SELECT * FROM tbl_petients WHERE Status2='Admission' ORDER BY id DESC ";
			       $retrieve = mysqli_query($db,$sqlmember);
				                 $count=0;$disease='';$plan='';$mps='';
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];
                       $phone=$found['Phone'];$location=$found['Location'];
                       $id=$found['id']; $dob=$found['DOB'];
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
									  
									    $sqluser ="SELECT * FROM tbl_managementplan WHERE Patientid='$id' && Status!='Closed' ";
                                                              $retrieved = mysqli_query($db,$sqluser);
                                                              while($found = mysqli_fetch_array($retrieved))
	                                                          {
																   $mp=$found['Management_plan'];
																    $d=$found['Date'];
													                $mps=$mps.$mp.'   ('.$d.')<br>';
															  }
			                          $sqlc ="SELECT * FROM tbl_laboratory WHERE Patientid='$id' && Status!='Closed' ";
                                      $retrievesc = mysqli_query($db,$sqlc);
									  $numc=mysqli_num_rows($retrievesc);
									  if($numc!=0){
                                                      while($found = mysqli_fetch_array($retrievesc))
	                                                 {
                                 	                   $tests=$found['Test_comment']; $results=$found['Results'];
													   $dise=$found['Diseased'];$dtes=$found['Date'];
													   $complaint=$found['Patient_Complaint'];	
													   $story=$found['Patient_Story'];
									                    /*;
									                       ;$thv=$found['Test_hiv'];		              
				  	   			                          $idx=$found['Patientid'];*/
				  	                                  }
													 
									             }
									             else{$tests=""; $results="";}
												 
								   $sqld ="SELECT * FROM tbl_labresults WHERE Patientid='$id'  ";
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
												              $drug='';
									  $sqld ="SELECT * FROM tbl_treatment WHERE Patientid='$id' && Status!='Closed'  ";
                                      $retrievesd = mysqli_query($db,$sqld);
									   $numd=mysqli_num_rows($retrievesd);
									  if($numd!=0){     
                                                      while($found = mysqli_fetch_array($retrievesd))
	                                                 { 
                                 	                      $counts=$count+1;
									                      $drugname=$found['Drugid'];$quantinty=$found['Quantity'];
									                       $units=$found['Timesperday'];$instructions=$found['Prescribe_Comment'];	
													          $officer=$found['Officer'];  $dates=$found['Date'];	
															  $comment=$found['Plan'];
															
                                                         	  $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$drugname' ";
                                                              $retrieved = mysqli_query($db,$sqluser);
                                                              while($found = mysqli_fetch_array($retrieved))
	                                                          {
                                                                   
																   $morning=$found['Strength'];
																   $after=$found['Medstype'];
																   $price= $found['RetailPrice'];
																  
																   		                                                          
													          }
													     $disease=$disease.'<br>';
						                                $drug=$drug.$drugname.' ('.$morning.') ('.$after.') Times per day('.$units.')  &nbsp; By('.$officer.')<br>';
													
                                                		//$plan=$comment.'   ('.$dates.')<br>';	
													  }
												 $disease=$dise.'   ('.$dtes.')'.$disease;
													 
                                                           
                                                   }else{$officer='Pamzey';}
				        echo"<tr>  
				             <td>$count</td>                                         
                             <td>$title $firstname $sirname</td>        	
                             <td>$age</td>
                            
			                
			                 
			                 <td>
			                 <a  data-toggle='modal' href='#medicaltreatment' data-pc='$story' data-pp='$drug' data-bn='$names' data-br='$sirname' data-bl='$gender' data-bc='$dob'  data-pn='$disease' data-ad='$mps' data-ig='$results' data-id='$id' data-ik='James' data-it='$complaint'  data-im='kkk' data-em='$location' data-ep='$phone'  data-pm='$officer' class='open-patientadmin btn  btn-warning' title='Click here to view and print receipt'><span class='fa fa-folder-open' style='color:white;' ></span></a>
			                
			                 </td>
			                 <td>
							  <a data-toggle='modal' data-id='$id' data-bn='$names'  href='#displayadmin' class='open-patientadmin btn btn-primary' title='Click here to diagonise patient'><span class='fa fa-eyedropper fa-lg' style='color:white;' ></span></a>
							 
			                 </td>
			                 <td>
							<a data-toggle='modal' data-c5='$commrdt' data-a5='$mrdt'  data-c7='$comtft' data-a7='$tft' data-bp='$tbp' data-c1='$comfbs' data-gl='$tgl' data-c2='$comrbs' data-ml='$tml' data-c4='$compbs' data-hv='$thv' data-c3='$comuct' data-a6='$fbc' data-c6='$comfbc' data-a8='$lft' data-c8='$comlft' data-id='$id' data-dp='$names' data-pd='$tests' data-dd='$results' href='#displaylabresults' class='open-patient22 btn $btn' title='Click here to prescribe patient'><span class='fa fa-check fa-lg' style='color:white;' ></span></a>
							 
			                 </td>
			                  <td>
							<a data-toggle='modal' data-id='$id' data-dp='$names' href='#Addreadings' class='open-patient22 btn $btn' title='Click here to add vital signs readings'><span class='fa fa-area-chart fa-lg' style='color:white;' ></span></a>
							 
			                 </td>
			                  <td>
			                   <a href='progress.php?id=$id' class='btn  btn-info' title='check patient progress' ><span class='fa fa-line-chart' style='color:white;'></span></a>
							 
			                 </td>		
			                 <td>
							<a data-toggle='modal' data-c5='$commrdt' data-a5='$mrdt'  data-c7='$comtft' data-a7='$tft' data-bp='$tbp' data-c1='$comfbs' data-gl='$tgl' data-c2='$comrbs' data-ml='$tml' data-c4='$compbs' data-hv='$thv' data-c3='$comuct' data-a6='$fbc' data-c6='$comfbc' data-a8='$lft' data-c8='$comlft' data-id='$id' data-dp='$names' data-pd='$tests' data-dd='$results' href='#displaytests' class='open-patient22 btn $btn' title='Click here to prescribe patient'><span class='fa fa-edit fa-lg' style='color:white;' ></span></a>
							 
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
	
    