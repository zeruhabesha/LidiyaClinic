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
	

 	<!-- requried-jsfiles-for owl -->
									<!-- //requried-jsfiles-for owl -->
</head> 

			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">LIST OF PATIENTS TO BE GIVEN DRUGS</h4>
					<!-- start content_slider -->
				<div class="alert alert-info">
                             <i class="fa fa-envelope"></i>&nbsp;This screen displays petients records use the search box to spool more records
                         </div>
					
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>No</th> <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Location</th>                
                <th>Consultation</th>
                <th>Laboratory</th>
                <th>Receipt</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        
        	 $sqlmember ="SELECT * FROM tbl_petients WHERE Status='Pharmacy'  ";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];
                       $phone=$found['Phone'];$residence=$found['Location'];
                       $id=$found['id']; $dob=$found['DOB']; $status2=$found['Status2'];
                         $ID=$found['ID_Number'];
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
			                          $sqlc ="SELECT * FROM tbl_laboratory WHERE Patientid='$id'  ";
                                      $retrievesc = mysqli_query($db,$sqlc);
									  $numc=mysqli_num_rows($retrievesc);
									  if($numc!=0){
                                                      while($found = mysqli_fetch_array($retrievesc))
	                                                 {
                                 	                   $tests=$found['Test_comment']; $results=$found['Results']; $oficer=$found['Officer'];	
									                    $comment=$found['Diseased'];
				  	                                  }
													$labcost=500;
											$show3="<i style='color:green' class='fa fa-close'></i>&nbsp; <i class='fa fa-eyedropper fa-lg'></i>";
													
									             }
									             else{$tests=""; $results=""; $oficer="No consultation";
												 			           
												   $labcost=0;
											$show3="<i style='color:red' class='fa fa-close'></i>&nbsp; <i class='fa fa-eyedropper fa-lg'></i>";
												 
												 
												 }
												           
													   $cost='';$drug='';$total=1500;
								   $sqld ="SELECT * FROM tbl_treatment WHERE Patientid='$id' && Status!='Closed' && Status!='Notpaid'  ";  //
                                      $retrievesd = mysqli_query($db,$sqld);
									   $numd=mysqli_num_rows($retrievesd);
									  if($numd!=0){     
                                                      while($found = mysqli_fetch_array($retrievesd))
	                                                 {
                                 	                    
									                      $drugname=$found['Drugid'];$quantinty=$found['Quantity'];
									                       $units=$found['Timesperday'];$comments=$found['Prescribe_Comment'];	
													           $status=$found['Status'];$ddays=$found['Days']; $amo=$found['Amount'];
														  $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$drugname' ";
                                                              $retrieved = mysqli_query($db,$sqluser);
                                                              while($found = mysqli_fetch_array($retrieved))
	                                                          {
                                                                   
																   $morning=$found['Strength'];
																   $after=$found['Medstype'];
																   $price= $found['RetailPrice'];
																  
																   		                                                          
													          }
															  // $date=date('y-m-d');
                                                             $sqldx ="SELECT * FROM tbl_transactions WHERE Patientid='$id' && Drugname='$drugname' ";
                                                                $retrievesdx = mysqli_query($db,$sqldx);
		                                                        $numdx=mysqli_num_rows($retrievesdx);
		                                                       if($numdx!=0){
		                                                       	             
                                                                               while($foundz = mysqli_fetch_array($retrievesdx))
	                                                                         {
                                 	                                               $price= $foundz['Unitprice'];
						                                                           $costs=$quantinty*$price;
																			 }
													                       }else{
													                         	   $costs=$quantinty*$price;
													                             }
													                       
													                       			              
				  	   			                           $cost=$cost.$quantinty.' x MK'.$price.'= MK'.$costs.'<br>';
														   $drug=$drug.$drugname.' ('.$morning.') '.$amo.' ('.$after.') ('.$units.') a day for '.$ddays.' days<br>';
				  	                                        $total=$total+$labcost+$costs;
														   $labc='Lab tests fee = MK'.$labcost.'.00';
                                                        }
                                                       if( $status=="Paid" || $status==""){$button='btn-success';}else{$button='btn-danger';}
													 
									             }
									             else{$tgl='';$tbp="";$tml="";$thv="";}
						
									$shows="<i style='color:green' class='fa fa-check'>&nbsp; <i class='fa fa-user-md fa-lg'></i>";			 
                                
                                echo"<tr>  
				             <td>$count</td>        <td>$ID</td>                                      
                             <td>$title $firstname $sirname</td>        	
                             <td>$age</td>
                             <td>$gender</td>
			                 <td>$residence</td>			                 
			                 <td>$shows</td>
			                 <td>$show3</td>	
			                 <td>
					        <a  data-toggle='modal' href='#displaystudentinfo2' data-pc='hh' data-pp='$drug' data-bn='$names' data-br='$sirname' data-bl='$gender' data-bc='$dob' data-dp='$cost' data-tf='$total' data-pn='$comment' data-ad='$tests' data-ig='$results' data-id='$id' data-ik='$status2' data-it='kims'  data-im='kkk' data-em='$residence' data-ep='$phone' data-et='$labc' data-pm='$oficer' class='open-studentinfo2 btn  btn-success' title='Click here to print view cost'><span class='fa fa-file-word-o' style='color:white;' ></span></a>
							
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
	
    