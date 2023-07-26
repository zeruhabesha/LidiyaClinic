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
$standard=$_GET['class'];
$term=$_GET['term'];


if($standard=='1'){$show="std_1";}
		elseif($standard=='2'){$show="std_2";}
		elseif($standard=='3'){$show="std_3";}
		elseif($standard=='4'){$show="std_4";}
		elseif($standard=='5'){$show="std_5";}					   
		elseif($standard=='6'){$show="std_6";}
		elseif($standard=='7'){$show="std_7";}	
		elseif($standard=='8'){$show="std_8";}

               $tyear=date('Y');
      	         $nextyear=$tyear+1;
				$year=$tyear.'-'.$nextyear;
			     

  $ramend ="SELECT * FROM tbl_students WHERE School='$institution' && Standard='$standard' ";
       $amendf = mysqli_query($db,$ramend); 	                 				                           
       while($found= mysqli_fetch_array($amendf))
	        {
                            $firstname = $found['Firstname'];
		                               $sirname= $found['Sirname'];
									   $studentid= $found['id'];
									   $username=$firstname.' '.$sirname;
									 
		      
	
$sqlx ="SELECT * FROM tbl_subjects WHERE School='$institution' && $show='Yes' ";
                                           $retr = mysqli_query($db,$sqlx);
										            			$total=0;			        
                                            while($found = mysqli_fetch_array($retr))
	                                         {
	                            	             $name = $found['Subjectname'];	
												  
												 $query = "SELECT * FROM tbl_assessment WHERE Studentid='$studentid' && Class='$standard' && School='$institution' && Term='$term' && Subject='$name' && Repeating!='Yes'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {               
                                                	while($found = mysqli_fetch_array($result))
	                                                {
	                                                	
	                            	                  $mark = $found['Grade'];
													    								  
												    }
													$total=$total+$mark ; 								  
                                                   
                                                 }
												
                                                 
                                           }
                                           
                                           		$query = "SELECT * FROM tbl_assessmentfinal WHERE Studentid='$studentid' && Class='$standard' && School='$institution' && Term='$term' && Repeating!='Yes' ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                            if( mysqli_num_rows($result) == 0)                         
                                            {
									           $enter="INSERT INTO tbl_assessmentfinal (Studentid,School,Class,Totalmarks,Term,Year) 
                               	                 VALUES('$studentid','$institution','$standard','$total','$term','$year')";
                                                 $db->query($enter);
											}
										else{
												$queryz = "UPDATE tbl_assessmentfinal Set Totalmarks='$total' WHERE Studentid='$studentid' && Class='$standard' && Term='$term'   ";                        
                                                $db->query($queryz) or die('Errorr, query failed to upload');	
											}      
                       }                 
		 
         	   	
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
			width: 90%;
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
  	
            <center>   
 <div id="printableArea">
      <p ><img src="images/Logo.png" height='100px' width="100px"></p>
      <p><b>MINISTRY OF EDUCATION SCIENCE & TECHNOLOGY</b><br> 
      	<?php echo$institution; ?> Primary School<br>
		Standard <?php echo$standard; ?> Results of Term <?php echo$term; ?><br>
      	<?php 	$year=date('Y');
      	         $nextyear=$year+1;
				 echo$year.'-'.$nextyear;
				
				
      	?>
			      Academic Year</p>                                  
		                                                                             
           	                                                 </div>
		                                                           </center>
  
	
            
				  <td>
				  <table class="table table-bordered">
				  	
	      <tbody>
        	<tr class='success' >
        	       </tr>
        	<tr class='success' >
        		  <th  style="border: 1px solid black;">Position</th>

        		<th  style="border: 1px solid black;">Student</th>
        		<?php
            $sql ="SELECT * FROM tbl_subjects WHERE School='$institution' && $show='Yes' ";

                                $retr = mysqli_query($db,$sql);
								       $count=0;
                              while($found = mysqli_fetch_array($retr))
	                            {
	                            	
									$count=$count+1;
                                         $name = $found['Subjectname'];
									   echo" 
                                              <th style='border: 1px solid black;'>$name</th>
                                            ";
                                 }               
            ?> 
            <th  style="border: 1px solid black;">Total</th> 
            <th  style="border: 1px solid black;">Average %</th>           
    
            </tr>
            <?php
            
                           $date=date('Y');
			                $todate=$date+1;
			                $year=$date.'-'.$todate;
							
                           $countd=0;
  $ramend ="SELECT * FROM tbl_assessmentfinal WHERE Class='$standard' && School='$institution' && Term='$term' && Class='$standard' && Year='$year' && Repeating!='Yes' ORDER BY Totalmarks DESC ";
       $amendf = mysqli_query($db,$ramend); 	                 				                           
       while($found= mysqli_fetch_array($amendf))
	        {
                           			   $studentid=$found['Studentid'];
									   $marks=$found['Totalmarks'];
							      $ramends ="SELECT * FROM tbl_students WHERE School='$institution' && id='$studentid' ";
                                  $amendfs = mysqli_query($db,$ramends); 	                 				                           
                                   while($found= mysqli_fetch_array($amendfs))
	                               {  
                                      $firstname = $found['Firstname'];
		                               $sirname= $found['Sirname'];									
									   $username=$firstname.' '.$sirname;
								   
										 $countd=$countd+1;
										  echo"
										  <tr><td style='border: 1px solid black;'>$countd</td>";
										  echo"<td style='border: 1px solid black;'>$username</td>";
										  
										   $sqlx ="SELECT * FROM tbl_subjects WHERE School='$institution' && $show='Yes' ";
                                           $retr = mysqli_query($db,$sqlx);										            						        
                                            while($found = mysqli_fetch_array($retr))
	                                         {
	                            	             $name = $found['Subjectname'];	
												    
												 $query = "SELECT * FROM tbl_assessment WHERE Studentid='$studentid' && Class='$standard' && School='$institution' && Term='$term' && Subject='$name' && Repeating!='Yes' ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {               
                                                	while($found = mysqli_fetch_array($result))
	                                                {
	                                                	
	                            	                   $grade = $found['Grade'];											          
										              echo"<td style='border: 1px solid black;'>$grade%</td>";
													 	 									  
												    }
																					  
                                                   
                                                 }
                                                 else{
                      								     echo"<td style='border: 1px solid black;'>0%</td>";										  
                                                           	
                                                      }
												    
												    
                                           }
                                         $averag=round($marks/$count);	
                                            echo"
										 <td style='border: 1px solid black;'>$marks</td>";
										  echo"<td style='border: 1px solid black;'>$averag%</td>";
										 
                                            echo"</tr>
													<tr>";        
										     	    
			}						  
			}
	?>                   
         </tbody>
         
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


