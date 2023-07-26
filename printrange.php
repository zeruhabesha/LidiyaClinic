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
          	   $role= $found['Position'];	
			    $profile="";
   
  	    
  	    }
 
 }else{
	 header('location:index.php');
      exit;

}
$fromm=$_POST['startpoint'];
$too=$_POST['endpoint'];
$startsat=$_POST['receiptrange'];
$standard=$_POST['class'];
$term=$_POST['term'];
$students=$_POST['students'];

$_SESSION['from']=$fromm;
$_SESSION['to']=$too;
$_SESSION['receiptrange']=$startsat;

$from=$_SESSION['from'];
$to=$_SESSION['to'];
$startsat=$_SESSION['receiptrange'];

if($standard=='1'){$show="std_1";}
		elseif($standard=='2'){$show="std_2";}
		elseif($standard=='3'){$show="std_3";}
		elseif($standard=='4'){$show="std_4";}
		elseif($standard=='5'){$show="std_5";}					   
		elseif($standard=='6'){$show="std_6";}
		elseif($standard=='7'){$show="std_7";}	
		elseif($standard=='8'){$show="std_8";}
	
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
		<title>MASS</title>
		<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

		<style>	
		.table {
			width: 100%;
			margin-left:80px;
			margin-right:80px;
		}	
		
		.table tbody > tr:nth-child(odd) > td,
		.table tbody > tr:nth-child(odd) > th {
			background-color: white;
			
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
		
		table.blueTable {
  font-family: "Times New Roman", Times, serif;
  border: 0px solid #1C6EA4;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 2px solid #141414;
}
table.blueTable tbody td {
  font-size: 17px;
}
table.blueTable thead {
  }
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
}
table.blueTable tfoot {
  font-size: 17px;
  font-weight: bold;
  border-top: 0px solid #444444;
}
table.blueTable tfoot td {
  font-size: 17px;
}
	</style>
	</head>
  <body>
  	<table>
  		<tr>
	<?php

  $ramend ="SELECT * FROM tbl_students WHERE id>=$from && id<=$to && School='$institution' && Standard='$standard' ";
       $amendf = mysqli_query($db,$ramend); 
	                  $countz=0;  				                           
       while($found= mysqli_fetch_array($amendf))
	        {
                            $firstname = $found['Firstname'];
		                               $sirname= $found['Sirname'];
									   $studentid= $found['id'];
									   $username=$firstname.' '.$sirname;
									 
		      
	?>
            
				  <td>
				  <table class="table table-bordered">
				  	
	<caption><img src="images/Logo.png" height='50px' width="50px">
		<b>MINISTRY OF EDUCATION SCIENCE & TECHNOLOGY</b><br><?php echo$institution; ?> PRIMARY SCHOOL</caption>
        <tbody>
        	<tr class='success' style='font-weight: bold'>
        		<td colspan="4" style="border: 1px solid black;">Student:<?php echo$username; ?></td>           
           <tr> 
           	<tr class='success' style='font-weight: bold'>
        		<td colspan="3" style="border: 1px solid black;">Standard <?php echo$standard; ?></td>
        		<td style="border: 1px solid black;">Term <?php echo$term; ?></td>
                
            
           <tr>  
        	<tr class='success' style='font-weight: bold'>
        		<td style="border: 1px solid black;">Subjects</td>
        		<td style="border: 1px solid black;">Marks</td>
                <td style="border: 1px solid black;">Grades</td>
        		<td style="border: 1px solid black;">Teacher's Comments</td>  
            
                                             
           <?php	
                       $totalr=0; $total2=0;$total3=0;$countedb=0;$countedb2=0;$countedb3=0;
           $sqlx ="SELECT * FROM tbl_subjects WHERE School='$institution' && $show='Yes' ";
                                           $retr = mysqli_query($db,$sqlx);
										            						        
                                            while($found = mysqli_fetch_array($retr))
	                                         {
	                            	            $countedb=$countedb+1;
												 $name = $found['Subjectname'];	
												 echo"<tr><td style='border: 1px solid black;'>$name</td>";
												           
												 $query = "SELECT * FROM tbl_assessment WHERE Studentid='$studentid' && Class='$standard' && School='$institution' && Term='$term' && Subject='$name' && Repeating!='Yes' ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {               
                                                	while($found = mysqli_fetch_array($result))
	                                                {
	                                                	
	                            	                   $names = $found['Grade'];
													   $remarks = $found['Remarks'];											          
										              echo"<td style='border: 1px solid black;'>$names%</td>";
													 	 if($names<=49){$mark='F';}
														 elseif	($names>=50 && $names<=59){$mark='Pass';}
														 elseif	($names>=60 && $names<=69){$mark='D';}
														 elseif	($names>=70 && $names<=79){$mark='C';}
                                                         elseif	($names>=80 && $names<=89){$mark='B';}
														 elseif	($names>=90 && $names<=100){$mark='A';}
														 
														$totalr=$totalr+$names; 
														 
														 								  
												    }
																					  
                                                   
                                                 }
                                                 else{
                      								     echo"<td style='border: 1px solid black;'></td>";										  
                                                 	      $mark='';
														  $remarks='';
                                                      }
												  echo"<td style='border: 1px solid black;'>$mark</td>
                                                 <td style='border: 1px solid black;'>$remarks</td>            									  
		                                                                                       </tr>   "; 
									            
																							   
									           if($term==3){
									           	          
									           	    $query = "SELECT * FROM tbl_assessment WHERE Studentid='$studentid' && Class='$standard' && School='$institution' && Term='2' && Subject='$name' && Repeating!='Yes' ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {               
                                                	while($found = mysqli_fetch_array($result))
	                                                {	                                                	
	                            	                     $names = $found['Grade'];										              											 
														 $total2=$total2+$names; 
														 $countedb2=$countedb2+1;														 								  
												    }                                                
                                                 }
												
											    $query = "SELECT * FROM tbl_assessment WHERE Studentid='$studentid' && Class='$standard' && School='$institution' && Term='3' && Subject='$name' && Repeating!='Yes' ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {               
                                                	while($found = mysqli_fetch_array($result))
	                                                {
	                                                	
	                            	                     $names = $found['Grade'];										              											 
														 $total3=$total3+$names; 
														 $countedb3=$countedb3+1;
														 								  
												    }
																					  
                                                   
                                                 }
                                                  
											
									           }else{$info='';}
									           
									          
                                           }        
				                                
				                             
				     if($countedb>0){$averagf=round($totalr/$countedb); }else{$averagf=0; $posts="Fail";}	                               	
				     if($countedb2>0){$averag2=round($total2/$countedb2); }else{$averag2=0;} 
					 if($countedb3>0){$averag3=round($total3/$countedb3); }else{$averag3=0;}									
					 
					 if($averagf>=50){$posts='Pass';}else{$posts="Fail";}
									   
									        if($term==3){
									   			          $ave=$averagf+$averag2+$averag3;
											              $totalave=round($ave/3);
									                      if($totalave>=50){$info=' and Proceed!';}else{$info=' and Repeat class!';} 						 
	                               			             }
								   
								     
												 $date=date('Y');
			                                     $todate=$date+1;
			                                   $year=$date.'-'.$todate;
											  
				  $query = "SELECT * FROM tbl_assessmentfinal WHERE Class='$standard' && School='$institution' && Term='$term' && Year='$year' ORDER BY Totalmarks DESC ";
                                                         $resultX =mysqli_query($db,$query) or die('Error, query failed');
                                                          if( mysqli_num_rows($resultX) != 0)                         
                                                           {                     $position=0;
                                                           	         while($found = mysqli_fetch_array($resultX))
	                                                                  {
	                            	                                       $stdpos = $found['Studentid'];	
																		  $position=$position+1;
																		   if($stdpos==$studentid){$post=$position;}
																		   
																	  }
                                                           	
													       }
	                               		                   
		 ?>
         	 <tr>      
         <td colspan="3" style='border: 1px solid black;'>Total Number of students:<?php echo$students; ?></td>
         <td style='border: 1px solid black;'>Position:<?php echo$post; ?></td>
         </tr> 
         <tr>      
         <td colspan="3" style='border: 1px solid black;'>Class teacher remarks</td>
         <td style='border: 1px solid black;'><?php echo$posts.' '.$info; ?></td>
         </tr>     
                               
         </tbody>
         
</table>  
<p style="padding-top:-10px;"><hr style="width:25%;float:left;margin-left:125px;border:1px solid black;"></hr><hr style="width:25%;float:left;margin-left:130px;border:1px solid black;"></hr></p>
			        
	   <p style="width:100%;padding-left:30%;"><h>Head Master</h> <h style="margin-left:50%">Class Teacher</h></p>
		<?php 
         
			   echo"</td>
			   <td style='width:5%'>&nbsp;</td>";
				$countz=$countz+1;
			   if($countz==2){
			   	$countz=0;
			   	echo"	
            	</tr> 
            	<tr>                
            ";
            
			   }
} ?>
</table>		 
   <center>
			
<table>	
      <tr></td><button onclick="PrintPage()" class="btn btn-primary" id="PrintButton" onclick="PrintPage()" style="margin-bottom:2%"><span class='glyphicon glyphicon-print'></span> &nbsp;Print</button></td>
	 
	  </td><a href='administrator.php' class="btn btn-info"  style="margin-bottom:2%;margin-left:2%"><span class='glyphicon glyphicon-home'></span> &nbsp;Home</a></td></tr>
        </table>	
   </center>
</body>
<script type="text/javascript">

	function PrintPage() {
		window.print();
	}
</script>
</html>


