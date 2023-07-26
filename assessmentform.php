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
			  	   $idz= $found['id'];			  
          	   $role= $found['Position'];	
			    $profile='';
				$username=$firstname.' '.$sirname;
   
  	    }
}else{
	 header('location:index.php');
      exit;
}


?>


		
			<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title"><?php  
		$std=$_POST['standard'];
		if($std=='std_1'){$show="1";}
		elseif($std=='std_2'){$show="2";}
		elseif($std=='std_3'){$show="3";}
		elseif($std=='std_4'){$show="4";}
		elseif($std=='std_5'){$show="5";}					   
		elseif($std=='std_6'){$show="6";}
		elseif($std=='std_7'){$show="7";}	
		elseif($std=='std_8'){$show="8";}
						   
			$term=$_POST['term'];				   
		echo"GRADES ENTRY FORM FOR STANDARD ".$show.' TERM '.$term;
		 ?></h4>
          <div class="alert alert-info">
                             <i class="fa fa-info"></i>&nbsp;The form below allows the teacher to enter grades after marking
                         </div>                  
					     
<form  method="post" action="register.php" >
  <!-- progressbar -->
  
  <!-- fieldsets -->
  <fieldset>
    <table class="table table-bordered table-hover">
	
   
        <tbody>
        	<tr class='success' style='font-weight: bold'>
        		<td>Number</td>
        		<td>Student</td>
            <?php
            $sql ="SELECT * FROM tbl_subjects WHERE School='$institution' && $std='Yes' ";

                                $retr = mysqli_query($db,$sql);								       
                              while($found = mysqli_fetch_array($retr))
	                            {
	                            	$name = $found['Subjectname'];
	                            	   $count=0;
									$sqlt ="SELECT * FROM tbl_teacherallocation WHERE Teacherid='$idz' && Class='$show' && School='$institution' && Subject='$name' ";
                                     $retrt = mysqli_query($db,$sqlt);								      
                                     $fd = mysqli_num_rows($retrt);
									 if($fd!=0)
	                                 {	                            	
									      $count=$count+1;
                                         //$name = $found['Subject'];
									      echo" <td >$name</td>";
                                     }  
									
                                 }               
            ?>       
            
           <tr>              
              
               	<?php 
               
               	                 
            				           $sqlc ="SELECT * FROM tbl_students WHERE School='$institution' && Standard='$show' ";
                                                $counts=0;$turns=0;
                                $retrc = mysqli_query($db,$sqlc);
                              while($found = mysqli_fetch_array($retrc))
	                            {
                                              $turns=$turns+1; 
								      $firstname = $found['Firstname'];
		                               $sirname= $found['Sirname'];
									   $studentid= $found['id'];
									   $username=$firstname.' '.$sirname;
									   
									  $startvalue=($counts*$count);
									  echo" <tr><td >$turns</td> 
										       <td >$username</td>";	
										             
										   $sqlx ="SELECT * FROM tbl_subjects WHERE School='$institution' && $std='Yes' ";
                                           $retr = mysqli_query($db,$sqlx);
										            $countd=$startvalue;								        
                                            while($found = mysqli_fetch_array($retr))
	                                         {
	                            	                $name = $found['Subjectname'];
													$countd=$countd+1;
													$comment=$studentid.$countd;
													$sqlt ="SELECT * FROM tbl_teacherallocation WHERE Teacherid='$idz' && Class='$show' && School='$institution' && Subject='$name' ";
                                                         $retrt = mysqli_query($db,$sqlt);								      
                                                         $fo = mysqli_num_rows($retrt);
														 if($fo!=0)	{									 	
														                                                    	
												    
												 $query = "SELECT * FROM tbl_assessment WHERE Studentid='$studentid' && Class='$show' && School='$institution' && Term='$term' && Subject='$name' && Repeating!='Yes' ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {
                                                	while($found = mysqli_fetch_array($result))
	                                                {
	                            	                   $names = $found['Grade'];	$remaks = $found['Remarks'];										          
										              echo"<td><input type='number'  name='$countd' value='$names' style='width:100%;'  >
										              <input type='text'  name='$comment' value='$remaks' style='width:100%;color:blue' placeholder='Type remarks here '  ></td>";										  
													} 								  
                                                   
                                                 }
                                                 else{
                      								     echo"<td><input type='number'  name='$countd' value='' style='width:100%;'>
                      								     <input type='text'  name='$comment' value='' style='width:100%;color:blue' placeholder='Type remarks here '  ></td>";										  
//                                                  	
                                                      }    
                                           }        
                                           }     
										  echo"</tr>";             
											$counts=$counts+1; 		  								        
									 // if($counts==1){
									  // for($x=1;$x<=11;$x++){
// 									  	
										// }
										// echo"</tr>";
									 // }
									 // if($counts==2){
									  // for($x=12;$x<=22;$x++){
// 									  	
										// echo"<td><textarea  name='$x' value='' style='width:100%'  ></textarea></td>";										  
										// }
										// echo"</tr>";
									 // }  
									   
									   
								   }			          
							        
						 echo"<input type='hidden' name='standard' value='$show' />
						      <input type='hidden' name='subjects' value='$count' />
						      <input type='hidden' name='term' value='$term' />
						      <input type='hidden' name='clas' value='$std' />";		
				?>
              
               
                
                
                        
                         
         </tbody>
         
</table>   
							<button type="submit" class="btn btn-success" name='assessment' value="2"><span class="glyphicon glyphicon-floppy-disk" style="color: white"></span>&nbsp;Save </button>&nbsp;
  </fieldset>
</form>


</div>

<br /><br />

</div>

				        </div>
					
			