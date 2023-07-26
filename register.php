<?php
session_start();
include("db_connect.php");
if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}


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
			   $ttle= $found['Mtitle'];	
			    $profile="";
              $authorizer=$ttle.' '.$firstname.' '.$sirname;
  	    }
}

if(isset($_POST['pconsultat'])){
 	
	 $petient=$_POST['pconsultat'];
 
      	 	                   $querry="UPDATE appointment SET status='Consultation' WHERE PatientID='$petient'";
                              $db->query($querry);
                              $querry1="UPDATE tbl_petients SET appointment='yes' WHERE ID_Number='$petient'";
                              $db->query($querry1);
							  
                              $sql="SELECT * FROM tbl_petients WHERE ID_Number='$petient' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                    $activity="Patient ".$fname.' '.$oname." sent to consultation";
							                             	
					            echo"119";
 }
if(isset($_POST['pconsultation'])){
 	
	 $petient=$_POST['pconsultation'];
 
      	 	                   $querry="UPDATE tbl_petients SET Status='Consultation' WHERE id='$petient'";
                              $db->query($querry);
                              
							  
                              $sql="SELECT * FROM tbl_petients WHERE id='$petient' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                    $activity="Patient ".$fname.' '.$oname." sent to consultation";
							                             	
					            echo"111";
 }
 if(isset($_POST['addicd10'])){
	                    
			  $dname = mysqli_real_escape_string($db,$_POST["dname"]);      //phone variable
			  $dcode = mysqli_real_escape_string($db,$_POST["dcode"]);	//Email variable
		
			 				   
	$sql="SELECT * FROM tbl_icd10 WHERE Diagnosisname='$dname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                                           						
							 $sqln = "INSERT INTO tbl_icd10 (Diagnosisname,Diagnosiscode)
			               VALUES ('$dname','$dcode')";
		                     $db->query($sqln);
		                         
								  $activity ="ICD 10 diagnosis name of '.$dname.'added to the system  ";
                              
	                               
	                              $_SESSION['icdo']="KK";								  
								 header("Location:administrator.php");
								                             
                         }
                              
                     } 
 
if(isset($_POST['medstypes'])){
 	
	 $medscount=$_POST['medstypes'];
                                 $x=1;$xx=20;$xxx=40;$xxxx=60;$xxxxx=80;$xxxxxx=100;
                                
      	 	                  while ($x <=$medscount) {							                       	
			  				 													    
							$qu = "SELECT * FROM tbl_drugs ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {
                                                          	      
															    echo"<table><tr>
                                                                     <td>
																	  <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Medicine</span>
                                                                       <select style='height:35px' name='$x' id='drugname'  >
    				                                                  ";
                                                          	    while($found = mysqli_fetch_array($resul))
	                                                           {
                                                                      $Mname = $found['Name'];
																	  $strength = $found['Strength'];
																	  $meds = $found['Medstype'];
																	  
            				                                				echo"<option value='$Mname'>$Mname ($strength) $meds </option>";          				
            				                                		  		 
															   } 
															   echo" </select> </div></td>
															   <td>
															   <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Amount</span>
                                                                      <input type='number' name='$xx' value='' style='width:100px;height:35px'>
                                                                     </div></td>
                                                                    <td>
															   <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Times a day</span>
                                                                       <select style='height:35px' name='$xxx'   >
    				                                                  
            				                                		<option>OD</option>
            				                                		<option>BD</option>
            				                                		<option>TDS</option>
            				                                		<option>QDS</option>
            				                                		<option>STAT</option>
            				                                		<option>OTHER</option>
            				                                		</select>  
            				                                	</div>
            				                                	</td>
            				                                	<td>
                                                                     <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Duration(days)</span>
                                                                      <input type='number' name='$xxxx' value='' style='width:80px;height:35px'>
                                                                     </div></td> 
															   <td>
															   
                                                                     <td>															  
                                                                      <input type='hidden' name='repeatimes' value='$medscount' style='width:50px;height:35px'>
                                                                     </td></tr></table>";
														  }
																							
		                                              
													   $x=$x+1;$xx=$xx+1;$xxx=$xxx+1;$xxxx=$xxxx+1;$xxxxx=$xxxxx+1;$xxxxxx=$xxxxxx+1;
								           }
                
 }
 if(isset($_POST['medstypes2'])){
 	
	 $medscount=$_POST['medstypes2'];
                                 $x=1;$xx=20;$xxx=40;$xxxx=60;$xxxxx=80;$xxxxxx=100;
                                
      	 	                  while ($x <=$medscount) {							                       	
			  				 													    
							$qu = "SELECT * FROM tbl_drugs ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {
                                                          	      
															    echo"<table><tr>
                                                                     <td>
																	  <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Medicine</span>
                                                                       <select style='height:35px' name='$x' id='drugname'  >
    				                                                  ";
                                                          	    while($found = mysqli_fetch_array($resul))
	                                                           {
                                                                      $Mname = $found['Name'];
																	  $strength = $found['Strength'];
																	  $meds = $found['Medstype'];
																	  
            				                                				echo"<option value='$Mname'>$Mname ($strength) $meds </option>";          				
            				                                		  		 
															   } 
															   echo" </select> </div></td>
															   <td>
															   <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Quantity</span>
                                                                      <input type='number' name='$xx' value='' style='width:100px;height:35px'>
                                                                     </div></td>
                                                                    <td>
															   <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Times a day</span>
                                                                       <select style='height:35px' name='$xxx'   >
    				                                                  
            				                                		<option>OD</option>
            				                                		<option>BD</option>
            				                                		<option>TDS</option>
            				                                		<option>QDS</option>
            				                                		<option>TDD</option>
            				                                		<option>STAT</option>
            				                                		<option>OTHER</option>
            				                                		</select>  
            				                                	</div></td>
                                                                     
															   <td>
															   
                                                                     <td>															  
                                                                      <input type='hidden' name='repeatimes' value='$medscount' style='width:50px;height:35px'>
                                                                     </td></tr></table>";
														  }
																							
		                                              
													   $x=$x+1;$xx=$xx+1;$xxx=$xxx+1;$xxxx=$xxxx+1;$xxxxx=$xxxxx+1;$xxxxxx=$xxxxxx+1;
								           }
                
 }
 if(isset($_POST['savediagnosis'])){
	                    
			  $patient = mysqli_real_escape_string($db,$_POST["mypatientid2"]);      //phone variable
			   $confirm = mysqli_real_escape_string($db,$_POST["confirmdiagnosis"]);
			    
	$querry="UPDATE tbl_laboratory SET Diseased='$confirm' WHERE Patientid='$patient' && Status!='Closed' ";
     $db->query($querry);
            $_SESSION['resultssent22']="Pamzey";	
           header("Location:administrator.php");   
						 
 }
 if(isset($_POST['sendaccounts'])){
	                    
			  $dname = mysqli_real_escape_string($db,$_POST["mypatientid2"]);      //phone variable
			  $drcomment = mysqli_real_escape_string($db,$_POST["prescribtioncomment"]);
			    $repeat = mysqli_real_escape_string($db,$_POST["repeatimes"]);
			  $plan = mysqli_real_escape_string($db,$_POST["managementplan"]);
			  	$send=$_POST['sendaccounts'];		  
			  
			  $date=date('y-m-d');	//Email variable
			  
			  $sql="SELECT * FROM tbl_laboratory WHERE Patientid='$dname' && Date='$date' ";
                   $retrieved=mysqli_query($db,$sql);
                  $rowcount=mysqli_num_rows($retrieved);                    
                         if($rowcount!=0)
                         {                                           						
							
                               while($found = mysqli_fetch_array($retrieved))
	                            {
                                 	 $idz=$found['id']; 
			              
				  	             }
				         }else{$idz='No Lab test';}
			 	
			             
			
			 				   $x=1;$xx=20;$xxx=40;$xxxx=60;
			 				   //$medscount=5;
			 				   
      	 	                  while ($x <=$repeat) {							                       	
			  				 													    
							$qu = "SELECT * FROM tbl_drugs ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {
                                                          	 while($found = mysqli_fetch_array($resul))
	                                                           {
                                                                      $Mname = $found['Name'];
																	
															if($_POST[$x]==$Mname){
	                                                           	  	                     $drug=$_POST[$x];
																                         
	                                                           	  	               }
															   }
															      
                                                          	   $amnt=$_POST[$xx];//amount
															   $units=$_POST[$xxx]; //timesperday
															  	$duration=$_POST[$xxxx];//days
															 if($_POST[$xxx]=='OD')
                                                                  {
     	                                                              $timesd=1;
								                                   }
															 elseif($_POST[$xxx]=='BD')
                                                                  {
     	                                                              $timesd=2;
								                                   }
														 elseif($_POST[$xxx]=='TDD')
                                                                  {
     	                                                              $timesd=3;
								                                   }
														      elseif($_POST[$xxx]=='QDS')
                                                                  {
     	                                                              $timesd=4;
								                                   }
															 elseif($_POST[$xxx]=='STAT')
                                                                  {
     	                                                              $timesd=1;
								                                   }
															  	$amount=($timesd*$amnt)*$duration;
																														   
															    $sqln = "INSERT INTO tbl_treatment (Resultsid,Patientid,Drugid,Quantity,Timesperday,Prescribe_comment,Date,Officer,Status,Days,Amount)
			                                                              VALUES ('$idz','$dname','$drug','$amount','$units','$drcomment','$date','$authorizer','Pay','$duration','$timesd')";
		                                                         $db->query($sqln);
		                   
															  $x=$x+1; $xx=$xx+1;$xxx=$xxx+1;$xxxx=$xxxx+1;
																$sqld ="SELECT * FROM tbl_managementplan WHERE Patientid='$dname' && Management_plan='$plan'  ";
                                                                 $retrievesd = mysqli_query($db,$sqld);
									                          $numd=mysqli_num_rows($retrievesd);
									                   if($numd==0){     
                                    
																         $sqln = "INSERT INTO tbl_managementplan (Resultsid,Patientid,Management_plan,Date,Status)
			                                                              VALUES ('$idz','$dname','$plan','$date','Pay')";
		                                                                 $db->query($sqln);
		                                                         }
											              }
							    }
if($send=='Send to Accounts'){
                              $querry="UPDATE tbl_petients SET Status='Accounts' WHERE id='$dname'";
                              $db->query($querry);  
					         }
					$sql="SELECT * FROM tbl_petients WHERE id='$dname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." sent to accounts";
                     		  
							  $_SESSION['resultssent2']="Pamzey";	
                                    header("Location:administrator.php");   
						
	/*$sql="SELECT * FROM tbl_drugs WHERE Name='$dname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                                           						
							 $sqln = "INSERT INTO tbl_drugs (Name,Quantity,DOE,PurchasedPrice,RetailPrice)
			               VALUES ('$dname','$quantity','$doe','$pprice','$retailprice')";
		                     $db->query($sqln);
		                         
								  $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$dname' && Quantity='$quantity'  ";
                              $retrieved = mysqli_query($db,$sqluser);
                      while($found = mysqli_fetch_array($retrieved))
	                     {
                                 	 $idz=$found['id']; 
			              
				  	    }
	                               
	                             $sql = "INSERT INTO tbl_vendors (Fullname,Location,Phone,Email,DOP)
			               VALUES ('$vendorname','$vendorlocation','$vendorphone','$vendoremail','$ppdS')";
		                     $db->query($sql);
							 
							 $activity="registered student ".$fname.' '.$oname." into the system";
								  
								   $login=$_COOKIE['login'];
	                                $user=$_COOKIE['user'];
	   	                            
								   $query = "SELECT * FROM tbl_userlogs WHERE Login='$login' && Userid='$user' ";
                      $result =mysqli_query($db,$query) or die('Error, query failed');
                        if( mysqli_num_rows($result) != 0)                         
                         {
                         	while($found = mysqli_fetch_array($result))
                         	{
                         		   $useractions= $found['Activities'];
								   $count= $found['Count'];
							}
				           if($useractions==''){
				           	          
									  $queryz = "UPDATE tbl_userlogs Set Activities='$activity',Count='1'  WHERE Login='$login' && Userid='$user' ";                        
                                    $db->query($queryz) or die('Errorr, query failed to upload');	
					        
				           }else{
				           	                     $count=$count+1;
				           	             $arry=explode('\n',$useractions);
                                      		array_push($arry,$activity);                                                      
                                                       $addaction=implode('\n',$arry);
                                       	$queryz = "UPDATE tbl_userlogs Set Activities='$addaction',Count='$count'  WHERE Login='$login' && Userid='$user' ";                        
                                    $db->query($queryz) or die('Errorr, query failed to upload');	
					           
                                      	
                                        }
                                    }
                                  $_SESSION['studentreg']="KK";								  
								 header("Location:administrator.php");
								                             
                         }*/
                              
                     } 
					 
					 
					 
			
 if(isset($_POST['sendaccount'])){
	                    
			  $dname = mysqli_real_escape_string($db,$_POST["mypatientid2"]);      //phone variable
			  $drcomment = mysqli_real_escape_string($db,$_POST["prescribtioncomment"]);
			    $repeat = mysqli_real_escape_string($db,$_POST["repeatimes"]);
			  $plan = mysqli_real_escape_string($db,$_POST["managementplan"]);
			  	$send=$_POST['sendaccounts'];		  
			  
			  $date=date('y-m-d');	//Email variable
			  
			  $sql="SELECT * FROM tbl_laboratory WHERE Patientid='$dname' && Date='$date' ";
                   $retrieved=mysqli_query($db,$sql);
                  $rowcount=mysqli_num_rows($retrieved);                    
                         if($rowcount!=0)
                         {                                           						
							
                               while($found = mysqli_fetch_array($retrieved))
	                            {
                                 	 $idz=$found['id']; 
			              
				  	             }
				         }else{$idz='No Lab test';}
			 	
			             
			
			 				   $x=1;$xx=20;$xxx=40;$xxxx=60;
			 				   //$medscount=5;
			 				   
      	 	                  while ($x <=$repeat) {							                       	
			  				 													    
							$qu = "SELECT * FROM tbl_drugs ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {
                                                          	 while($found = mysqli_fetch_array($resul))
	                                                           {
                                                                      $Mname = $found['Name'];
																	
															if($_POST[$x]==$Mname){
	                                                           	  	                     $drug=$_POST[$x];
																                         
	                                                           	  	               }
															   }
															      
                                                          	   $amnt=$_POST[$xx];//amount
															   $units=$_POST[$xxx]; //timesperday
															  	$duration=$_POST[$xxxx];//days
															 if($_POST[$xxx]=='OD')
                                                                  {
     	                                                              $timesd=1;
								                                   }
															 elseif($_POST[$xxx]=='BD')
                                                                  {
     	                                                              $timesd=2;
								                                   }
														 elseif($_POST[$xxx]=='TDD')
                                                                  {
     	                                                              $timesd=3;
								                                   }
														      elseif($_POST[$xxx]=='QDS')
                                                                  {
     	                                                              $timesd=4;
								                                   }
															 elseif($_POST[$xxx]=='STAT')
                                                                  {
     	                                                              $timesd=1;
								                                   }
															  	$amount=($timesd*$amnt)*$duration;
																														   
															    $sqln = "INSERT INTO tbl_treatment (Resultsid,Patientid,Drugid,Quantity,Timesperday,Prescribe_comment,Date,Officer,Status,Days,Amount)
			                                                              VALUES ('$idz','$dname','$drug','$amount','$units','$drcomment','$date','$authorizer','Pay','$duration','$timesd')";
		                                                         $db->query($sqln);
		                   
															  $x=$x+1; $xx=$xx+1;$xxx=$xxx+1;$xxxx=$xxxx+1;
																$sqld ="SELECT * FROM tbl_managementplan WHERE Patientid='$dname' && Management_plan='$plan'  ";
                                                                 $retrievesd = mysqli_query($db,$sqld);
									                          $numd=mysqli_num_rows($retrievesd);
									                   if($numd==0){     
                                    
																         $sqln = "INSERT INTO tbl_managementplan (Resultsid,Patientid,Management_plan,Date,Status)
			                                                              VALUES ('$idz','$dname','$plan','$date','Pay')";
		                                                                 $db->query($sqln);
		                                                         }
											              }
							    }
if($send=='Send to Accounts'){
                              $querry="UPDATE tbl_petients SET Status='Accounts' WHERE id='$dname'";
                              $db->query($querry);  
					         }
					$sql="SELECT * FROM tbl_petients WHERE id='$dname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." sent to accounts";
                     		  
							  $_SESSION['resultssent2']="Pamzey";	
                                    header("Location:administrator.php");   
 }		 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
 if(isset($_POST['sendadmissions'])){
	                    
			  $dname = mysqli_real_escape_string($db,$_POST["mypatientid22"]);      //phone variable
			  $drcomment = mysqli_real_escape_string($db,$_POST["prescribtioncomment"]);
			  			  $repeat = mysqli_real_escape_string($db,$_POST["repeatimes"]);
			  
			  $date=date('y-m-d');	//Email variable
			  
			  $sql="SELECT * FROM tbl_labresults WHERE Patientid='$dname' && Date='$date' ";
                   $retrieved=mysqli_query($db,$sql);
                  $rowcount=mysqli_num_rows($retrieved);                    
                         if($rowcount!=0)
                         {                                           						
							
                               while($found = mysqli_fetch_array($retrieved))
	                            {
                                 	 $idz=$found['id']; 
			              
				  	             }
				         }else{$idz='No Lab test';}
			 	
			             
			
			 				   $x=1;$xx=20;$xxx=40;$xxxx=60;
			 				   //$medscount=5;
			 				   
      	 	                  while ($x <=$repeat) {							                       	
			  				 													    
							$qu = "SELECT * FROM tbl_drugs ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {
                                                          	 while($found = mysqli_fetch_array($resul))
	                                                           {
                                                                      $Mname = $found['Name'];
																	
															if($_POST[$x]==$Mname){
	                                                           	  	                     $drug=$_POST[$x];
																                         
	                                                           	  	               }
															   }
															      
                                                          	   $amount=$_POST[$xx];
															   $units=$_POST[$xxx];
															  															   
															    $sqln = "INSERT INTO tbl_treatment (Resultsid,Patientid,Drugid,Quantity,Timesperday,Prescribe_comment,Date,Officer,Status)
			                                                              VALUES ('$idz','$dname','$drug','$amount','$units','$drcomment','$date','$authorizer','Pay')";
		                                                         $db->query($sqln);
		                   
															  $x=$x+1; $xx=$xx+1;$xxx=$xxx+1;$xxxx=$xxxx+1;
															  $sqld ="SELECT * FROM tbl_managementplan WHERE Patientid='$dname' && Management_plan='$drcomment'  ";
                                                                 $retrievesd = mysqli_query($db,$sqld);
									                          $numd=mysqli_num_rows($retrievesd);
									                   if($numd==0){     
                                    
																         $sqln = "INSERT INTO tbl_managementplan (Resultsid,Patientid,Management_plan,Date,Status)
			                                                              VALUES ('$idz','$dname','$drcomment','$date','Pay')";
		                                                                 $db->query($sqln);
		                                                         }
																
											              } 
							    }
                    $querry="UPDATE tbl_petients SET Status='Pharmacy' WHERE id='$dname'";
                              $db->query($querry);  
					
					$sql="SELECT * FROM tbl_petients WHERE id='$dname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." sent to accounts";
                     		  
							  $_SESSION['resultssent2']="Pamzey";	
                                    header("Location:administrator.php");   
						
	                            
                     } 
 
 
if(isset($_POST['labdata'])){
	 	                  
						  $comment=$_POST['labtestss'];
	                      $patientid=$_POST['mypatientid'];
	                       $pcomplaint=$_POST['pcomplaint'];
	                      $pstory=$_POST['pstory'];
	                         $pamzey=$_POST['labdata'];
							 
						     if(isset($_POST["test1"])&&$_POST["test1"]!='')                       //here
                                 {
     	                           $tests1=$_POST["test1"];
								 }
                                 else{$tests1="";}
                             if (isset($_POST["test2"])&&$_POST["test2"]!='')
                                 {     	
		                           $tests2=$_POST["test2"];
                                  }
								 else{$tests2="";}
                             if (isset($_POST["test3"])&&$_POST["test3"]!='')                   //here
                                 {
     	                           $tests3=$_POST["test3"];
								 }
								 else{$tests3="";}
                           if (isset($_POST["test4"])&&$_POST["test4"]!='')                   //here
                                 {
     	                           $tests4=$_POST["test4"];
								 }
						  	 	else{$tests4="";}
					  if(isset($_POST["test5"])&&$_POST["test5"]!='')                       //here
                                 {
     	                           $tests5=$_POST["test5"];
								 }
                                 else{$tests5="";}
                             if (isset($_POST["test6"])&&$_POST["test6"]!='')
                                 {     	
		                           $tests6=$_POST["test6"];
                                  }
								 else{$tests6="";}
                             if (isset($_POST["test7"])&&$_POST["test7"]!='')                   //here
                                 {
     	                           $tests7=$_POST["test7"];
								 }
								 else{$tests7="";}
                           if (isset($_POST["test8"])&&$_POST["test8"]!='')                   //here
                                 {
     	                           $tests8=$_POST["test8"];
								 }
						  	 	else{$tests8="";}						
	 	                        $date=date('y-m-d');
	 	                           //$enter="INSERT INTO tbl_laboratory (Patientid,Test_RBS,Test_FBS,Test_PBS,Test_UCT,Test_MRDT,Test_FBC,Test_TFT,Test_LFT,Test_comment,Date,Officer) 
                               	    // VALUES('$patientid','$tests1','$tests2','$tests3','$tests4','$tests5','$tests6','$tests7','$tests8','$comment','$date','$authorizer')";
                                  //$db->query($enter);
                                  
                                  $enter="INSERT INTO tbl_laboratory (Patientid,Test_RBS,Test_FBS,Test_PBS,Test_UCT,Test_MRDT,Test_FBC,Test_TFT,Test_LFT,Patient_Complaint,Patient_Story,Test_comment,Date,Officer) 
                               	    VALUES('$patientid','$tests1','$tests2','$tests3','$tests4','$tests5','$tests6','$tests7','$tests8','$pcomplaint','$pstory','$comment','$date','$authorizer')";
                                 $db->query($enter);
								 
						if($pamzey=='Send2Lab'){			 
							  $querry="UPDATE tbl_petients SET Status='Laboratory',Status2='Admission' WHERE id='$patientid'";
                              $db->query($querry);
						}else{
							$querry="UPDATE tbl_petients SET Status='Laboratory' WHERE id='$patientid'";
                              $db->query($querry);
						}
							      
							$sql="SELECT * FROM tbl_petients WHERE id='$patientid' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." sent to lab";
                         		
									$_SESSION['resultssent3']="Pamzey";	
                                    header("Location:administrator.php");
 }			
if(isset($_POST['admissionp'])){
	 	                  
	 $patientid=$_POST['admissionp']; 	                        					
	$querry="UPDATE tbl_petients SET Status2='Admission',Status='Pharmacy' WHERE id='$patientid'";
     $db->query($querry);										
     echo"12345";
 }

if(isset($_POST['addvital'])){
	 	                  
	$patientid=$_POST['patientnumber']; 
	$bloodtemp=$_POST['bloodtemp'];
	$pulser=$_POST['pulserate'];
	 $resp=$_POST['respirationr'];
	 $bloodp=$_POST['bloodp'];
	 $bloodp2=$_POST['bloodp2'];
	 $oxyg=$_POST['oxyg'];
	 
	                                        // date_default_timezone_set('Africa/Cairo');      change this timezone to suit your location
                                               $time=date( 'h:i:s A', time () );
											   $date=date('Y-m-d');
 $queryz = "INSERT INTO tbl_readings (Patientid,BodyT,PulseRate,RespirationRate,SystolicBP,DiastolicBP,Oxygensaturation,Date,Time) ".
  "VALUES ('$patientid','$bloodtemp','$pulser','$resp','$bloodp','$bloodp2','$oxyg','$date','$time')";
  $db->query($queryz) or die('Errorr1, query failed to upload');		
								                        					
	//$querry="UPDATE tbl_petients SET Status='Admission' WHERE id='$patientid'";
     //$db->query($querry);										
     echo"12345566";
 }
 if(isset($_POST['cashier'])){
	 	                  
						  
	                      $patientid=$_POST['cashier'];	
	 	                     $date=date('y-m-d');
							$sql22="SELECT * FROM tbl_petients WHERE id='$patientid' && Status='Accounts' ";
                            $resultn22=mysqli_query($db,$sql22);                    
                         $row3=mysqli_num_rows($resultn22);
						 
						$sql2="SELECT * FROM tbl_petients WHERE id='$patientid' && Status='Admission' && Status2='Admission'";
                         $resultn2=mysqli_query($db,$sql2); 
                         $row=mysqli_num_rows($resultn2);                   
                         if($row!=0)
                         {                                           						
							 $enter1="UPDATE tbl_petients SET Status='Treated',Status2='' WHERE id='$patientid'  ";
                             $db->query($enter1);
                             
                             $enter2="UPDATE tbl_treatment SET Status='Closed' WHERE Patientid='$patientid' && Status!='Closed' ";
                             $db->query($enter2);
							 
							 $enter3="UPDATE tbl_managementplan SET Status='Closed' WHERE Patientid='$patientid'  ";
                             $db->query($enter3);	
							                              
                             $enter3d="UPDATE tbl_laboratory SET Status='Closed' WHERE Patientid='$patientid' && Status=''  ";
                             $db->query($enter3c);	
                             
							 $enter3c="UPDATE tbl_labresults SET Status='Closed' WHERE Patientid='$patientid' && Status!='Closed'  ";
                             $db->query($enter3d);                             
                         }
						 elseif($row3!=0){	     					
	 	                                   $querry="UPDATE tbl_petients SET Status='Pharmacy' WHERE id='$patientid'";
                                          $db->query($querry);	
						    }    
	$sql="SELECT * FROM tbl_petients WHERE id='$patientid' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." sent to Pharmacy";
                        									
                                    echo"22";
 }
 if(isset($_POST['cashpayment'])){
	 	                  
						  $date=date('y-m-d');
	                      $patientid=$_POST['cashpayment'];
	                       //$cost='';$drug='';$total=1500; //$drugs=0;
	                       $total=1500;
 $sqld ="SELECT * FROM tbl_treatment WHERE Patientid='$patientid' && Status!='Closed' ";
  $retrievesd = mysqli_query($db,$sqld);
		$numd=mysqli_num_rows($retrievesd);
		if($numd!=0){
                       while($found = mysqli_fetch_array($retrievesd))
	                  {
                                 	                    
						 $drugname=$found['Drugid'];$amount=$found['Quantity'];
						  $amo=$found['Amount'];$dayss=$found['Days'];								  
					       $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$drugname' ";
                           $retrieved = mysqli_query($db,$sqluser);
                           while($found = mysqli_fetch_array($retrieved))
	                            {
                                   //$priced= $found['PurchasedPrice']; 
                                   $quantity= $found['Drugsremain'];
								   $price=$found['RetailPrice']; 
						           $costs=$amount*$price;		                                                          
								}
								
								$num=$costs;
                               $fig=round($num,0); // this gives the value without decimal
                               $num0=$fig % 50;   // this gives the reminder
                                $num1=50-$num0;   //this gives the diffrence
                               $costs=$fig+$num1;  //this add the difference to the amount
																			
								$sqlc ="SELECT * FROM tbl_laboratory WHERE Patientid='$patientid' && Status!='Closed' ";
                                      $retrievesc = mysqli_query($db,$sqlc);
									  $numc=mysqli_num_rows($retrievesc);
									  if($numc!=0){
                                                      	$labcost=500;
										                
									               }else{$labcost=0; }		              
				  	   			  $drugs=$quantity-$amount;
								  //$costs=$costs+$labcost+$total;
								  $enter="UPDATE tbl_drugs SET Drugsremain='$drugs' WHERE Name='$drugname' ";
                                  $db->query($enter);
                                  $querry="UPDATE tbl_treatment SET Status='Paid' WHERE Patientid='$patientid' && Status!='Closed' ";
                                  $db->query($querry);
								  //$querry="UPDATE tbl_petients SET Status='Treated' WHERE id='$patientid'";
                                   //$db->query($querry);	
					             
	                                        // date_default_timezone_set('Africa/Cairo');      change this timezone to suit your location
                                               $time=date( 'h:i:s A', time () );
 
								   $queryz = "INSERT INTO tbl_transactions (Patientid,Drugname,Quantity,Unitprice,Totalcost,Consultation_fee,Lab_fee,Payment,Date,Time,Days,Amount) ".
                                              "VALUES ('$patientid','$drugname','$amount','$price','$costs','$total','$labcost','CASH','$date','$time','$dayss','$amo')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
										
				  	   $sql="SELECT * FROM tbl_petients WHERE id='$patientid' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." sent to pharmacy";
                        
                        }
													 
				  }	            
         echo"1234";
 }
if(isset($_POST['recordpatient'])){
	 	                  
						  $date=date('y-m-d');
	                      $patientid=$_POST['recordpatient'];
	                      $patientype=$_POST['patientype'];
						  if($patientype=='Admission'){
						  	$querry="UPDATE tbl_petients SET Status='Admission' WHERE id='$patientid' && Status2='Admission' ";
                          $db->query($querry);
						  
						  $querry="UPDATE tbl_treatment SET Status='Notpaid' WHERE Patientid='$patientid' && Status='Pay' ";
                          $db->query($querry);
						  }
					else{	
	                      
						   $querry="UPDATE tbl_petients SET Status='Treated',Status2='Treated' WHERE id='$patientid'";
                          $db->query($querry);	
					     $querry="UPDATE tbl_laboratory SET Status='Closed'  WHERE Patientid='$patientid' && Status='' ";
                          $db->query($querry);	              
						$querry="UPDATE tbl_labresults  SET Status='Closed'  WHERE Patientid='$patientid' && Status='' ";
                          $db->query($querry);
						  }				  					
				  	   $sql="SELECT * FROM tbl_petients WHERE id='$patientid' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." given medicine";
                                       // $db->query($querry);										
                                    echo"223";
 }
 if(isset($_POST['sendresults'])){
	 	                  
				    
	                      $patientid=$_POST['mypatientid'];	
	                      $results=$_POST['labresultss']; 
						  $lab=$_POST['statelab'];							
	 	                   $date=date('y-m-d');
				  
			                  $sql ="SELECT * FROM tbl_laboratory WHERE Patientid='$patientid' && Date='$date' ";
                              $retrievev = mysqli_query($db,$sql);
                              while($found = mysqli_fetch_array($retrievev))
	                          {
                                 	 $labid=$found['id']; 
							  }
				 
				  
				 if(isset($_FILES['file1']['name']) ){//image is a folder in which you will save documents
				               $formName = $_FILES['file1']['name'];
                               $formtmpName = $_FILES['file1']['tmp_name'];
                                $formSize = $_FILES['file1']['size'];
                                $formType = $_FILES['file1']['type'];
								
								$comment1= mysqli_real_escape_string($db,$_POST["commentfbs"]);
				   	           move_uploaded_file ($formtmpName, 'labresults/'.$formName);
							   
							   $sql="SELECT * FROM tbl_labresults WHERE  Patientid='$patientid' && Date='$date'  ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount==0)
                                              {              				                 				     		                           
		                                              $queryz = "INSERT INTO tbl_labresults (Patientid,Testid,Test_FBS,FBS_Comment,Date,Officer) ".
                                                           "VALUES ('$patientid','$labid','$formName','$comment1','$date','$authorizer')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
											  }
										  else{
										  	       $querry="UPDATE tbl_labresults SET Test_FBS='$formName',FBS_Comment='$comment1' WHERE Patientid='$patientid' && Date='$date' ";
                                                     $db->query($querry);	
										      }
							   
					 	}
			if(isset($_FILES['file2']['name']) ){//image is a folder in which you will save documents
			                        $icfName = $_FILES['file2']['name'];
                                     $icftmpName = $_FILES['file2']['tmp_name'];
                                     $icfSize = $_FILES['file2']['size'];
                                    $icfType = $_FILES['file2']['type'];
                                    
                                    $comment2= mysqli_real_escape_string($db,$_POST["commentrbs"]);
				                 move_uploaded_file ($icftmpName, 'labresults/'.$icfName);
			              $sql="SELECT * FROM tbl_labresults WHERE  Patientid='$patientid' && Date='$date'  ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount==0)
                                              {              				                 				     		                           
		                                              $queryz = "INSERT INTO tbl_labresults (Patientid,Testid,Test_RBS,RBS_Comment,Date,Officer) ".
                                                           "VALUES ('$patientid','$labid','$icfName','$comment2','$date','$authorizer')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
											  }
										  else{
										  	       $querry="UPDATE tbl_labresults SET Test_RBS='$icfName',RBS_Comment='$comment2' WHERE Patientid='$patientid' && Date='$date' ";
                                                     $db->query($querry);	
										      }
						}
			if(isset($_FILES['file3']['name']) ){//image is a folder in which you will save documents
			             $protocolName = $_FILES['file3']['name'];
                         $protocoltmpName = $_FILES['file3']['tmp_name'];
                         $protocolSize = $_FILES['file3']['size'];
                         $protocolType = $_FILES['file3']['type'];
				$comment3= mysqli_real_escape_string($db,$_POST["commentuct"]);
				               move_uploaded_file ($protocoltmpName, 'labresults/'.$protocolName);
			                   $sql="SELECT * FROM tbl_labresults WHERE  Patientid='$patientid' && Date='$date'  ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount==0)
                                              {              				                 				     		                           
		                                              $queryz = "INSERT INTO tbl_labresults (Patientid,Testid,Test_UCT,UCT_Comment,Date,Officer) ".
                                                           "VALUES ('$patientid','$labid','$protocolName','$comment3','$date','$authorizer')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
											  }
										  else{
										  	       $querry="UPDATE tbl_labresults SET Test_UCT='$protocolName',UCT_Comment='$comment3' WHERE Patientid='$patientid' && Date='$date'";
                                                     $db->query($querry);	
										      }
					 	}
             if(isset($_FILES['file4']['name'])){//image is a folder in which you will save documents
                         $reportName = $_FILES['file4']['name'];
                         $reporttmpName = $_FILES['file4']['tmp_name'];
                         $reportSize = $_FILES['file4']['size'];
                         $reportType = $_FILES['file4']['type'];
			$comment4= mysqli_real_escape_string($db,$_POST["commentpbs"]);				   
				            move_uploaded_file ($reporttmpName, 'labresults/'. $reportName);
                         $sql="SELECT * FROM tbl_labresults WHERE  Patientid='$patientid' && Date='$date'  ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount==0)
                                              {              				                 				     		                           
		                                              $queryz = "INSERT INTO tbl_labresults (Patientid,Testid,Test_PBS,PBS_Comment,Date,Officer) ".
                                                           "VALUES ('$patientid','$labid','$reportName','$comment4','$date','$authorizer')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
											  }
										  else{
										  	       $querry="UPDATE tbl_labresults SET Test_PBS='$reportName',PBS_Comment='$comment4' WHERE Patientid='$patientid' && Date='$date' ";
                                                     $db->query($querry);	
										      }
					 		}
          if(isset($_FILES['file5']['name'])){//image is a folder in which you will save documents
                         $reportName = $_FILES['file5']['name'];
                         $reporttmpName = $_FILES['file5']['tmp_name'];
                         $reportSize = $_FILES['file5']['size'];
                         $reportType = $_FILES['file5']['type'];
				$comment5= mysqli_real_escape_string($db,$_POST["commentmrdt"]);
				             move_uploaded_file ($reporttmpName, 'labresults/'. $reportName);
                         $sql="SELECT * FROM tbl_labresults WHERE  Patientid='$patientid' && Date='$date'  ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount==0)
                                              {              				                 				     		                           
		                                              $queryz = "INSERT INTO tbl_labresults (Patientid,Testid,Test_MRDT,MRDT_Comment,Date,Officer) ".
                                                           "VALUES ('$patientid','$labid','$reportName','$comment5','$date','$authorizer')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
											  }
										  else{
										  	       $querry="UPDATE tbl_labresults SET Test_MRDT='$reportName',MRDT_Comment='$comment5' WHERE Patientid='$patientid' && Date='$date' ";
                                                     $db->query($querry);	
										      }
					 		}
          if(isset($_FILES['file6']['name'])){//image is a folder in which you will save documents
                         $reportName = $_FILES['file6']['name'];
                         $reporttmpName = $_FILES['file6']['tmp_name'];
                         $reportSize = $_FILES['file6']['size'];
                         $reportType = $_FILES['file6']['type'];
				$comment6= mysqli_real_escape_string($db,$_POST["commentfbc"]);
				               move_uploaded_file ($reporttmpName, 'labresults/'. $reportName);
                         $sql="SELECT * FROM tbl_labresults WHERE  Patientid='$patientid' && Date='$date'  ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount==0)
                                              {              				                 				     		                           
		                                              $queryz = "INSERT INTO tbl_labresults (Patientid,Testid,Test_FBC,FBC_Comment,Date,Officer) ".
                                                           "VALUES ('$patientid','$labid','$reportName','$comment6','$date','$authorizer')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
											  }
										  else{
										  	       $querry="UPDATE tbl_labresults SET Test_FBC='$reportName',FBC_Comment='$comment6',Testid='$lab' WHERE Patientid='$patientid' && Date='$date' ";
                                                     $db->query($querry);	
										      }
					 		}
if(isset($_FILES['file7']['name'])){//image is a folder in which you will save documents
                         $reportName = $_FILES['file7']['name'];
                         $reporttmpName = $_FILES['file7']['tmp_name'];
                         $reportSize = $_FILES['file7']['size'];
                         $reportType = $_FILES['file7']['type'];
				$comment7= mysqli_real_escape_string($db,$_POST["commenttft"]);
				                move_uploaded_file ($reporttmpName, 'labresults/'. $reportName);
                         $sql="SELECT * FROM tbl_labresults WHERE  Patientid='$patientid' && Date='$date'  ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount==0)
                                              {              				                 				     		                           
		                                              $queryz = "INSERT INTO tbl_labresults (Patientid,Testid,Test_TFT,TFT_Comment,Date,Officer) ".
                                                           "VALUES ('$patientid','$labid','$reportName','$comment7','$date','$authorizer')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
											  }
										  else{
										  	       $querry="UPDATE tbl_labresults SET Test_TFT='$reportName',TFT_Comment='$comment7' WHERE Patientid='$patientid' && Date='$date' ";
                                                     $db->query($querry);	
										      }
					 		}
if(isset($_FILES['file8']['name'])){//image is a folder in which you will save documents
                         $reportName = $_FILES['file8']['name'];
                         $reporttmpName = $_FILES['file8']['tmp_name'];
                         $reportSize = $_FILES['file8']['size'];
                         $reportType = $_FILES['file8']['type'];
				 $comment8= mysqli_real_escape_string($db,$_POST["commentlft"]);
	                       move_uploaded_file ($reporttmpName, 'labresults/'. $reportName);
                         $sql="SELECT * FROM tbl_labresults WHERE  Patientid='$patientid' && Date='$date'  ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount==0)
                                              {              				                 				     		                           
		                                              $queryz = "INSERT INTO tbl_labresults (Patientid,Testid,Test_LFT,LFT_Comment,Date,Officer) ".
                                                           "VALUES ('$patientid','$labid','$reportName','$comment8','$date','$authorizer')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
											  }
										  else{
										  	       $querry="UPDATE tbl_labresults SET Test_LFT='$reportName',LFT_Comment='$comment8' WHERE Patientid='$patientid' && Date='$date' ";
                                                     $db->query($querry);	
										      }
					 		}
	
		                          $enter="UPDATE tbl_laboratory SET Results='$results' WHERE Patientid='$patientid' && Date='$date' && Status!='Closed' ";
                                  $db->query($enter);
	 	          if($lab!='Admission')
	 	            			{					  
						          $querry="UPDATE tbl_petients SET Status='Consultation' WHERE id='$patientid'";
                                  $db->query($querry);	
								 }
				  elseif($lab=='Admission')
	 	            			{					  
						          $querry="UPDATE tbl_petients SET Status='Admission' WHERE id='$patientid'";
                                  $db->query($querry);	
								 }
					$sql="SELECT * FROM tbl_petients WHERE id='$patientid' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." lab lab results produced";
                        
                                   $_SESSION['resultssent']="Pamzey";															
                                    header("Location:administrator.php");
 }
if(isset($_POST['tdeleted'])){
 	
	 $delcat=$_POST['tdeleted'];
	$sql="SELECT * FROM tbl_teacherallocation WHERE  id='$delcat' ";
                                            $retriev=mysqli_query($db,$sql); 
                                            $rowcount=mysqli_num_rows($retriev);                   
                                             if($rowcount!=0)
                                              {              				                 				     		                           
		                                              while($found = mysqli_fetch_array($retriev))
	                                                     {
			                                                  $class=$found['Class'];
														 }
			$querry="DELETE FROM tbl_teacherallocation WHERE id='$delcat'";
           mysqli_query($db,$querry);
          echo$class;             
	
											  }
 	 	   
				
						} 
 
						
               
                
               
                 

		 
 
 if(isset($_POST['UpdateFiles'])){         
	           
			       $pagez= mysqli_real_escape_string($db,$_POST["category"]);
				   $pageid= mysqli_real_escape_string($db,$_POST["pageid"]);
				   $pagez= mysqli_real_escape_string($db,$_POST["page"]);
	
	             $orgName = $_FILES['filed']['name'];
                 $orgtmpName = $_FILES['filed']['tmp_name'];
                 $orgSize = $_FILES['filed']['size'];
                 $orgType = $_FILES['filed']['type'];
			
			
		  $sqln="SELECT * FROM Excelfiles  WHERE PaymentP='$pages' && name='$orgName'";
                   $resultn=mysqli_query($db,$sqln);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                 //$date= date("d.m.y");
                         
                                  move_uploaded_file ($orgtmpName, 'media/'.$orgName);
                             	 $enter="INSERT INTO Excelfiles (name,PaymentP,ids,size,content,type) 
                               	     VALUES('$orgName','$pagez','$pageid','$orgSize','$orgName','$orgType')";
                                  $db->query($enter);
								  
                                  $_SESSION['regk']="Pamzey";
								  
								 header("Location:$pagez");
								                             
                         }
                      else{
                      	          move_uploaded_file ($orgtmpName, 'media/'.$orgName);
                      	     	$enter="UPDATE Excelfiles SET name='$orgName',PaymentP='$pagez',ids='$pageid',size='$orgSize',content='$orgName',type='$orgType' WHERE name='$orgName' ";
                                  $db->query($enter);
								   $_SESSION['regk']="Pamzey";
								  
								 header("Location:$pagez");
								   
					      }                
                     }                
 if(isset($_POST['Userprivilages'])){
 	          $userid =mysqli_real_escape_string($db,$_POST["userid"]);	        //password variable               
       			      //$adduser = mysqli_real_escape_string($db,$_POST["adduser"]); //Sirname variable
           if (isset($_POST["adduser"])) {  $adduser="Yes"; } else { $adduser="No"; }
           if (isset($_POST["manageuser"])){ $edituser="Yes"; }  else {$edituser="No";}
           if (isset($_POST["logactivities"])) {$logactivities="Yes"; } else {$logactivities="No"; }
           if (isset($_POST["addpatient"])) {  $addpatient="Yes"; } else { $addpatient="No"; }
           if (isset($_POST["editpatients"])){ $editpatients="Yes"; }  else {$editpatients="No";}
           if (isset($_POST["managep"])) {$managep="Yes"; } else {$managep="No"; }
          if (isset($_POST["consultationacc"])) {  $consultationacc="Yes"; } else { $consultationacc="No"; }
           if (isset($_POST["labaccess"])){ $labaccess="Yes"; }  else {$labaccess="No";}
           if (isset($_POST["accountacc"])) {$accountacc="Yes"; } else {$accountacc="No"; }
           if (isset($_POST["givedrugs"])) { $givedrugs="Yes"; } else { $givedrugs="No"; }
           if (isset($_POST["addrugs"])){ $addrugs="Yes"; }  else {$addrugs="No";}
           if (isset($_POST["managedrugs"])) {$managedrugs="Yes"; } else {$managedrugs="No"; }
           if (isset($_POST["todaysales"])) { $todaysales="Yes"; } else { $todaysales="No"; }
           if (isset($_POST["todayret"])){ $todayret="Yes"; }  else {$todayret="No";}
           if (isset($_POST["monthlyreport"])) {$monthlyreport="Yes"; } else {$monthlyreport="No"; }
       
		  $sqln="SELECT * FROM tbl_userprivilages WHERE Userid='$userid' ";
                   $resultn=mysqli_query($db,$sqln);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {
                             	 $enter="UPDATE tbl_userprivilages SET Adduser='$adduser',Manageuser='$edituser',Logactivities='$logactivities',
                             	 Addpatient='$addpatient',Editpatient='$editpatients',Managepatient='$managep',Consultation='$consultationacc',
                             	 Labaccess='$labaccess',Accountaccess='$accountacc',Givedrugs='$givedrugs',Adddrugs='$addrugs',
                             	 Managedrugs='$managedrugs',Todayssales='$todaysales',Todaystreat='$todayret',Monthlyreport='$monthlyreport'
                             	  WHERE Userid='$userid' ";
                                  $db->query($enter);
								  
                                  $_SESSION['priv']="Pamzey";
								  
								 header("Location:administrator.php");
								                             
                         }
                      else{
                      	     	  $enter="INSERT INTO tbl_userprivilages (Userid,Adduser,Manageuser,Logactivities,Addpatient,Editpatient,Managepatient,Consultation,Labaccess,Accountaccess,Givedrugs,Adddrugs,Managedrugs,Todayssales,Todaystreat,Monthlyreport) 
                               	     VALUES('$userid','$adduser','$edituser','$logactivities','$addpatient','$editpatients','$managep','$consultationacc','$labaccess','$accountacc','$givedrugs','$addrugs','$managedrugs','$todaysales','$todayret','$monthlyreport')";
                                  $db->query($enter);
								   $_SESSION['priv']="Pamzey";
								  
								 header("Location:administrator.php");
					
								
					      }                
                     }                    
                 
if(isset($_POST['submited2'])){
	                    
        $query2 = "select * from tbl_petients order by id desc limit 1";
        $result2 = mysqli_query($db,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['ID_Number'];
        if ($last_id == "")
        {
            $customer_ID = "L-0001";
        }
        else
        {
			 $IDD = str_replace("L-", "", $last_id);
  $ID = str_pad($IDD + 1, 4, 0, STR_PAD_LEFT);
     $customer_ID = 'L-'.$ID;
           
        }

			  $fname = mysqli_real_escape_string($db,$_POST["fname"]);      //phone variable
			  $mname = mysqli_real_escape_string($db,$_POST["mname"]);	//Email variable
			  $sname =mysqli_real_escape_string($db,$_POST["lname"]);	        //password variable
			  $gender = mysqli_real_escape_string($db,$_POST["gender"]);       //institution variable			  
              $phone =mysqli_real_escape_string($db,$_POST["phone"]);       //institution variable
			  $kphone = mysqli_real_escape_string($db,$_POST["kphone"]);      //phone variable
	          $guardian= mysqli_real_escape_string($db,$_POST["guardian"]);//Firstname variable			 
			 $village = mysqli_real_escape_string($db,$_POST["village"]);       //institution variable				 
			 $relationship = mysqli_real_escape_string($db,$_POST["relationshipd"]);	//Email variable
			  $dob = mysqli_real_escape_string($db,$_POST["dob"]);	        //password variable
		      $patientpay = mysqli_real_escape_string($db,$_POST["patientpay"]);	        //password variable
		     
			
			 if (isset($_POST["mr"]))
                                 {
     	                           $mtitle="Mr";
								 }
                 elseif(isset($_POST["miss"]))
                                 {     	
		                           $mtitle="Miss";
                                  }
                 elseif(isset($_POST["mrs"]))
                                   {     	
		                      $mtitle="Mrs";
                                   }	 
                 elseif (isset($_POST["dr"]))
                                  {
     	
		                           $mtitle="Dr";
								  }
			    elseif (isset($_POST["pro"]))
                               {   $mtitle="Pro";
								  }
				               else	
				               {
				               	$mtitle="";
				               }
							   
							     $date= date("d-m-y");
   
		  $sql="SELECT * FROM tbl_petients WHERE Firstname='$fname' && Sirname='$sname' && DOB='$dob'";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                                           						
							 $sqln = "INSERT INTO tbl_petients (ID_Number,Mtitle,Firstname,Middlename,Sirname,Gender,Phone,NextKphone,DOB,Location,Guardian,Relation,Date,Payment)
			               VALUES ('$customer_ID','$mtitle','$fname','$mname','$sname','$gender','$phone','$kphone','$dob','$village','$guardian','$relationship','$date','$patientpay')";
		                     $db->query($sqln);
							          $_SESSION['addpetient']="KK";
								  
								 header("Location:administrator.php");
								 
					        $activity="Registered new patient ".$mtitle." ".$fname.' '.$sname." ";	   
 	               
								                             
                         }
                              
                     } 

if(isset($_POST['studentrecord'])){
	                    
			  $dname = mysqli_real_escape_string($db,$_POST["fname"]);      //phone variable
			  $pprice = mysqli_real_escape_string($db,$_POST["pprice"]);	//Email variable
			  $quantity =mysqli_real_escape_string($db,$_POST["quantity"]);	        //password variable
			  $doe = mysqli_real_escape_string($db,$_POST["dob"]);      //phone variable
	         //$retailprice = mysqli_real_escape_string($db,$_POST["retailprice"]);	//Email variable
	          
			 $vendorname = mysqli_real_escape_string($db,$_POST["vendorname"]);	        //password variable
			 $vendorlocation = mysqli_real_escape_string($db,$_POST["vendorlocation"]);       //institution variable
		        $vendorphone =mysqli_real_escape_string($db,$_POST["vendorphone"]);       //institution variable		      
		      $vendoremail = mysqli_real_escape_string($db,$_POST["vendoremail"]);	//Email variable
			  $ppdS = mysqli_real_escape_string($db,$_POST["ppdss"]);	        //password variable
			  $strength = mysqli_real_escape_string($db,$_POST["strength"]);	        //password variable
			 $medstype = mysqli_real_escape_string($db,$_POST["medstype"]);	        //password variable
			  $marker = mysqli_real_escape_string($db,$_POST["marker"]);	        //password variable
			 
			 
			$retailprice=($pprice/$quantity)*$marker;
			 				   
	$sql="SELECT * FROM tbl_drugs WHERE Name='$dname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                                           						
							 $sqln = "INSERT INTO tbl_drugs (Name,Quantity,DOE,PurchasedPrice,RetailPrice,Strength,Medstype,Marker,Drugsremain)
			               VALUES ('$dname','$quantity','$doe','$pprice','$retailprice','$strength','$medstype','$marker','$quantity')";
		                     $db->query($sqln);
		                         
								  $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$dname' && Quantity='$quantity'  ";
                              $retrieved = mysqli_query($db,$sqluser);
                      while($found = mysqli_fetch_array($retrieved))
	                     {
                                 	 $idz=$found['id']; 
			              
				  	    }
	                               
	                             $sql = "INSERT INTO tbl_vendors (Fullname,Location,Phone,Email,DOP,Drugid)
			               VALUES ('$vendorname','$vendorlocation','$vendorphone','$vendoremail','$ppdS','$idz')";
		                     $db->query($sql);
							 
							 
                                  $_SESSION['studentreg']="KK";								  
								 header("Location:administrator.php");
								                             
                         }
                              
                     } 
//***********************************************************************************************************************************************************

if(isset($_POST['catagory'])){
	                    
			  $cname = mysqli_real_escape_string($db,$_POST["cname"]);      
			 
			 
			 
			 				   
	$sql="SELECT * FROM labcat WHERE name='$cname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                                           						
							 $sqln = "INSERT INTO labcat (name)
			               VALUES ('$cname')";
		                     $db->query($sqln);
		                         
					
							 
							 
                                  $_SESSION['labcat']="KK";								  
								 header("Location:administrator.php");
								                             
                         }
                              
                     } 					 
	if(isset($_POST['subcatagory'])){
	          $cid = mysqli_real_escape_string($db,$_POST["cid"]);    
			  $sname = mysqli_real_escape_string($db,$_POST["sname"]);      
			  $price = mysqli_real_escape_string($db,$_POST["price"]);      
			  $range = mysqli_real_escape_string($db,$_POST["range"]);      

			 
			 
			 				   
	$sql="SELECT * FROM labsub WHERE name='$sname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                                           						
							 $sqln = "INSERT INTO labsub (cid,name,price,nrange)
			               VALUES ('$cid','$sname','$price','$range')";
		                     $db->query($sqln);
		                         
					
							 
							 
                                  $_SESSION['labsub']="KK";								  
								 header("Location:administrator.php");
								                             
                         }
                              
                     } 	


	if(isset($_POST['updatesub'])){
	                    
			  $name = mysqli_real_escape_string($db,$_POST["name"]);      
			  $cid = mysqli_real_escape_string($db,$_POST["cid"]);      
			  $price = mysqli_real_escape_string($db,$_POST["price"]);      
			  $range = mysqli_real_escape_string($db,$_POST["range"]);      
			  $id = mysqli_real_escape_string($db,$_POST["subid"]);      

			 
			 
			 				   
$sqln = "UPDATE labsub SET name='$name',cid='$cid',price='$price',nrange='$range' WHERE id='$id' ";
		                     $db->query($sqln);
		                         
					
							 
							 
                                  $_SESSION['ulabsub']="KK";								  
								 header("Location:administrator.php");
								                             
                         }
                              
                      					 
					 
//***********************************************************************************************************************************************************				 
					 
if(isset($_POST['updatestudent'])){
	                    
			  $dname = mysqli_real_escape_string($db,$_POST["dname"]);      //phone variable
			  $quantity = mysqli_real_escape_string($db,$_POST["quantity"]);	//Email variable
			  $uprice =mysqli_real_escape_string($db,$_POST["uprice"]);	        //password variable
              $rprice =mysqli_real_escape_string($db,$_POST["rprice"]);       //institution variable
			  $expdate = mysqli_real_escape_string($db,$_POST["expdate"]);      //phone variable
	          $mafdate= mysqli_real_escape_string($db,$_POST["mafdate"]);//Firstname variable
			 $vname = mysqli_real_escape_string($db,$_POST["vname"]);       //institution variable
			 $vlocation = mysqli_real_escape_string($db,$_POST["vlocation"]);       //institution variable			 
			 $vphone = mysqli_real_escape_string($db,$_POST["vphone"]);	//Email variable
			  $vemail = mysqli_real_escape_string($db,$_POST["vemail"]);	        //password variable
			   $drugid = mysqli_real_escape_string($db,$_POST["drugid"]);
		                    						
$sqln = "UPDATE tbl_drugs SET Name='$dname',Quantity='$quantity',PurchasedPrice='$uprice',RetailPrice='$rprice',DOE='$expdate' WHERE id='$drugid' ";
		                     $db->query($sqln);

$sqln2 = "UPDATE tbl_vendors SET Fullname='$vname',Location='$vlocation',Phone='$vphone',Email='$vemail',DOP='$mafdate' WHERE Drugid='$drugid' ";
		                     $db->query($sqln2);
			
			                      
	                               
                                  $_SESSION['updatestudent']="K";
								  
								 header("Location:administrator.php");
								                             
                         }  	
  
  if(isset($_POST['updateappoint'])){
	                    
			  $Pid = mysqli_real_escape_string($db,$_POST["Pid"]);      //phone variable
			  $title = mysqli_real_escape_string($db,$_POST["title"]);	//Email variable
			  $first =mysqli_real_escape_string($db,$_POST["first"]);	        //password variable
              $middle =mysqli_real_escape_string($db,$_POST["middle"]);       //institution variable
			  $sir = mysqli_real_escape_string($db,$_POST["sir"]);      //phone variable
	          $adate= mysqli_real_escape_string($db,$_POST["adate"]);//Firstname variable
			 	          $id= mysqli_real_escape_string($db,$_POST["id"]);//Firstname variable

$sqln = "UPDATE appointment SET PatientID='$Pid',title='$title',first='$first',middle='$middle',sir='$sir',date='$adate' WHERE id='$id' ";
		                     $db->query($sqln);

                               
                                  $_SESSION['updateappoint']="K";
								  
								 header("Location:administrator.php");
								                             
                         }
  
  
  
  
   
 if(isset($_POST["submitedd"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;$count = 0; 
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			
			$title = $filesop[0];
			$fname= $filesop[1];
			$othern = $filesop[2];
			$lsname = $filesop[3];		
			$gender = $filesop[4];
			$phone = $filesop[5];
			$email= $filesop[6];
			$idno = $filesop[7];
			$edate = $filesop[8];		
			$eno = $filesop[9];		      
			 $pstn = $filesop[10];
			$qlf= $filesop[11];
			$ddate= date("d.m.y");
			 $count++;
			 	$alphabet='1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $usercode=implode($pass); //turn the array into a string
    $fn= substr($fname,0,1);
    $ln= substr($lsname,0,1);
          $passid=$fn.$ln.$usercode;
			  if($count>1){ 
			$sql = "INSERT INTO tbl_teachers (Mtitle,Firstname,Middlename,Sirname,Gender,Phone,Email,IDno,Employmentdt,Employmentno,Position,Qualification,School,Password)
			VALUES ('$title','$fname','$othern','$lsname','$gender','$phone','$email','$idno','$edate','$eno','$pstn','$qlf','$institution','$passid')";
			 $db->query($sql);
			  }
			$c = $c + 1;
		}

		
			if($sql){
                      $_SESSION['Import']="Pamzey";								  
                          header("Location:administrator.php");
				    }
					else{
				          echo "Sorry! There is some problem.";
			            }

	} 
if(isset($_POST["submitedd2"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;$count = 0; 
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			
			$dname = $filesop[0];
			$doe= $filesop[1];
			$quantity = $filesop[2];
			$cost = $filesop[3];		
			$strength = $filesop[4];
			$medstype = $filesop[5];
			$marker= $filesop[6];			
			$vendorname = $filesop[7];
			$vendorlocation = $filesop[8];		
			$vendorphone = $filesop[9];		      
			$vendoremail = $filesop[10];			
			$ppdS= $filesop[11];	
			 $count++;

			  if($count>1){ 
			                   $retailprice=($cost/$quantity)*$marker;
			 				   
	                        $sql="SELECT * FROM tbl_drugs WHERE Name='$dname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                                           						
							 $sqln = "INSERT INTO tbl_drugs (Name,Quantity,DOE,PurchasedPrice,RetailPrice,Strength,Medstype,Marker,Drugsremain)
			               VALUES ('$dname','$quantity','$doe','$cost','$retailprice','$strength','$medstype','$marker','$quantity')";
		                     $db->query($sqln);
		                         
								  $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$dname' && Quantity='$quantity'  ";
                              $retrieved = mysqli_query($db,$sqluser);
                      while($found = mysqli_fetch_array($retrieved))
	                     {
                                 	 $idz=$found['id']; 
			              
				  	    }
	                               
	                             $sql = "INSERT INTO tbl_vendors (Fullname,Location,Phone,Email,DOP,Drugid)
			               VALUES ('$vendorname','$vendorlocation','$vendorphone','$vendoremail','$ppdS','$idz')";
		                     $db->query($sql);
							 
							 
								                             
                         }
                 	}
			$c = $c + 1;
		}

		
			if($sql){
                      $_SESSION['Importstu']="Pamzey";								  
                          header("Location:administrator.php");
				    }
					else{
				          echo "Sorry! There is some problem.";
			            }

	}       



if(isset($_POST["addappoint"]))
	{
		
		$PatientID = mysqli_real_escape_string($db,$_POST["mid"]);    
			  $title = mysqli_real_escape_string($db,$_POST["mtitle"]);	
			  $first = mysqli_real_escape_string($db,$_POST["mfirst"]);    
			  $middle = mysqli_real_escape_string($db,$_POST["mmiddle"]);	
			  $sir = mysqli_real_escape_string($db,$_POST["msir"]);    
			  $date = mysqli_real_escape_string($db,$_POST["mdate"]);	
		      $status = 'Treated';
	                                         						
							 $sqln = "INSERT INTO appointment (PatientID,title,first,middle,sir,date,status)
			               VALUES ('$PatientID','$title','$first','$middle','$sir','$date','$status')";
		                     $db->query($sqln);
		                         
                              
	                               
	                              $_SESSION['Importst']="Pamzey";								  
								 header("Location:administrator.php");
								                             
                     
                              
                     } 
			
		
		
             
			                                            						
						

	  








 
 
  if(isset($_POST['Valuedel'])){ 	
	
	 $id=$_POST['Valuedel'];
	                $sql="SELECT * FROM tbl_users WHERE id='$id' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
      	                 $activity="Staff ".$fname.' '.$oname." deleted from the system";			       
	   
 	 $querry="SELECT * FROM tbl_users WHERE id='$id' ";
                     $results=mysqli_query($db,$querry);
                    $checks=mysqli_num_rows($results);
                     if($checks!=0)
                     {
      	 	                    $enters="DELETE FROM tbl_users  WHERE id='$id'";
                                 $db->query($enters);
                                 
								   $enters1="DELETE FROM tbl_userprivilages  WHERE Userid='$id'";
                                 $db->query($enters1);
                               
				      }
	             echo"098"; 
 } 
if(isset($_POST['Valuedel2'])){
	
	$id=$_POST['Valuedel2'];
	$userid=$_POST['valu3'];
	                $sql="SELECT * FROM tbl_users WHERE id='$userid' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
      	                 $activity="Staff ".$fname.' '.$oname." logs deleted from the system";			       
	   
 	 $querry="SELECT * FROM tbl_userlogs WHERE id='$id' ";
                     $results=mysqli_query($db,$querry);
                    $checks=mysqli_num_rows($results);
                     if($checks!=0)
                     {
      	 	                    $enters="DELETE FROM tbl_userlogs WHERE id='$id'";
                                 $db->query($enters);
                               
				      }
	  	
	
	             echo"0918"; 
 }
 //--------------------------------------------------------------------------------------------
 
 
 
if(isset($_POST['Valuedel3'])){
	
	$ids=$_POST['Valuedel3'];
	$fname=$_POST['valu5'];
	                $sql="SELECT * FROM tbl_drugs WHERE id='$fname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['name'];
									 $Quantity = $found['Drugsremain'];
					               } 			                             
                         }
      	                 $activity="drugs deleted from the system";			       
	   
 	 $querry1="SELECT * FROM tbl_drugs WHERE id='$ids' ";
                     $results1=mysqli_query($db,$querry1);
                    $checks1=mysqli_num_rows($results1);
                     if($checks1!=0)
                     {
      	 	                    $enter="DELETE FROM tbl_drugs WHERE id='$ids'";
                                 $db->query($enter);
                               
				      }
	  	
	
	             echo"0918"; 
 }
 
 
 
 
 if(isset($_POST['Valuedel31'])){
	
	$ids=$_POST['Valuedel31'];
	$fname=$_POST['valu5'];
	                $sql="SELECT * FROM labsub WHERE id='$fname' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['name'];
					               } 			                             
                         }
      	                 $activity="Sub Category deleted from the system";			       
	   
 	 $querry1="SELECT * FROM labsub WHERE id='$ids' ";
                     $results1=mysqli_query($db,$querry1);
                    $checks1=mysqli_num_rows($results1);
                     if($checks1!=0)
                     {
      	 	                    $enter="DELETE FROM labsub WHERE id='$ids'";
                                 $db->query($enter);
                               
				      }
	  	
	
	             echo"0918"; 
 }
 
 
 //------------------------------------------------------------------------------------------------
if(isset($_POST['resetpass'])){
	 	                  
						  $oldpass=$_POST['oldpassword'];
	                      $newpass=$_POST['newpassword'];	 							
	 	                   $pager=$_POST['page'];  
	 	                   
						   $sql="SELECT * FROM tbl_users WHERE Password='$oldpass' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                            
	 	                           $qulikes = "UPDATE tbl_users Set Password='$newpass' WHERE Password='$oldpass' ";
						            $db->query($qulikes) or die('Errorr, query failed');
		                        
		                          $activity="Changed password of ".$fname.' '.$onam;			       
		
						            $_SESSION['pass']="okjs";				
                                    header("Location:administrator.php");
 }
 if(isset($_POST['gnamed'])){               
	           $gname=$_POST['gnamed'];
              	$teacher=$_POST['username'];		
	      
		  $sql="SELECT * FROM Groups  WHERE GName='$gname' && Userid='$userid'";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {
                             	 $date=date("d/m/y");
                               	 $enter="INSERT INTO Groups (GName,Userid,Teacherid,Members,Date) VALUES('$gname','$userid','$teacher','1','$date')";
                                  $db->query($enter);								                                 
							  
						 } 
                      
                    $sqlL="SELECT * FROM Groups WHERE Teacherid='$id' || Userid='$userid'  ORDER BY id DESC";
                   $resultnL=mysqli_query($db,$sqlL);                    
                         if($rowcount=mysqli_num_rows($resultnL)!=0)
                         {
                                        echo"<h3>Direct Messeges</h3>
					                   <div class='scrollbar' id='style-3'>
						               <div class='activity-row activity-row1'>
							              <div class='single-bottom'>";				
		                                                
                             while($foundk = mysqli_fetch_array($resultnL))
	                               {
                                     $grname= $foundk['GName'];$crid= $foundk['Userid'];
		                             $members= $foundk['Date'];$id= $foundk['id']; $idc= $foundk['Teacherid'];
		                                                   $sql ="SELECT * FROM Profile_Picture WHERE Studentid='$idc' && Category='Teacher' ";
                                                $rget = mysqli_query($db,$sql);
												$num=mysqli_num_rows($rget);
                                                if($num!=0){
												                   while($foundk = mysqli_fetch_array($rget))
	                                                                {
                                                                       $profile= $foundk['name'];
		                                                           $profile="multimedia/pictures/".$profile;
		                                                            }
																	
												             }
												         else{
												         	     $profile="admin/images/groups.png";
												            }
						
		                             echo"<div class='activity-row'>
							               <div class='col-xs-3 activity-img'>
							               
							               <a data-toggle='modal' data-id='$id' href='#Updatepictures' class='open-Updatepictures'>
							               <img src='$profile' height='50px' width='50px' alt=''></a></div>
							                <div class='col-xs-7 activity-desc'>
								            <h5><a data-id='$grname' data-ii='$crid' class='open-group' href='#'>$grname</a></h5>
								              <p>Created on:$members</p>
							               </div>";
							               if($crid==$userid){
							              echo"<div class='col-xs-2 activity-desc1'>
			                                       <a data-id='$id' href='#' class='open-Deletegroup'  >
			                                       <span class='glyphicon glyphicon-trash' style='color:red;font-size:15px'></span></a>
							              </div>";}
							               echo"<div class='clearfix'> </div>
						             </div>";
		                           }
								   echo"</div>
						</div>
					</div>
					<form id='groupsz' method='post' >
					  Click the name of the teacher to send a direct message
						   </form>";
                      
                         }
                               
 }       
 if(isset($_POST['groups'])){
	   
	    $groupname=$_POST['groups'];
	     $groupcreator=$_POST['groupcre'];
		
	   
	$get="SELECT * FROM Chart WHERE Group_Name='$groupname' &&  Group_creator='$groupcreator' ";
						    $gets=mysqli_query($db,$get);						   
                          $entered=mysqli_num_rows($gets);
                          
                          echo"<h3>DM ($groupname)<a href='#' style='float: right;color:white' class='open-exit'><span class='glyphicon glyphicon-log-out' style='color: white'></span>&nbsp;Exit</a>			                          </h3>
	             <div class='scrollbar' id='style-3'>
	             <div class='activity-row activity-row1'>
	             <div class='single-bottom'>";				
		
              if($entered!=0)
              {
              		if($groupname==$authorizer){
              			$querry="UPDATE Chart SET Status='Opened' WHERE Group_Name='$groupname' && Userid='$groupcreator'";
                              $db->query($querry);
              		}
              	
              	$time=time();
			                           
      while($get_row=mysqli_fetch_array($gets))
      {
      	
		$password=$get_row['Userid'];
      	$nameo=$get_row['Name'];
      	$get_time=$get_row['Time'];
		$get_text=$get_row['Message'];
		$date=$get_row['Date'];
		 
		 $time=strtotime($get_time);
                  $times=date("g:i a",$time);
				  
		
				
				   
				           $sqluserk ="SELECT * FROM tbl_teachers WHERE Password='$password'";
                            $ret = mysqli_query($db,$sqluserk);
                            while($found = mysqli_fetch_array($ret))
	                        {
                                   $idb= $found['id'];
  	                        }
							  
										$sql ="SELECT * FROM Profile_Picture WHERE Studentid='$idb' && Category='Teacher' ";
                                                $rget = mysqli_query($db,$sql);
												$num=mysqli_num_rows($rget);
                                                if($num!=0){
												                   while($foundk = mysqli_fetch_array($rget))
	                                                                {
                                                                       $profile= $foundk['name'];
		                                                           $profile="multimedia/pictures/".$profile;
		                                                            }
																	
												             }
												         else{
												         	     $profile="admin/images/profile.png";
												            }
										   
				      if ($password!=$userid)
		           {
		           	          			
		                echo"<div class='activity-row activity-row1'>
							<div class='col-xs-3 activity-img'><img src='$profile' class='img-responsive' alt=''/></div>
							<div class='col-xs-5 activity-img1'>
								<div class='activity-desc-sub'>
									<h5>$nameo</h5>
									<p>$get_text</p>
									<span>$date $times</span>
								</div>
							</div>
							<div class='col-xs-4 activity-desc1'></div>
							<div class='clearfix'> </div>
						</div>";
				 
				   }      
				  else{
				  	     echo"
				  	        <div class='activity-row activity-row1'>
							<div class='col-xs-2 activity-desc1'></div>
							<div class='col-xs-7 activity-img2'>
								<div class='activity-desc-sub1'>
									<h5>$nameo</h5>
									<p>$get_text</p>
									<p>$date $times</p>
								</div>
							</div>
							<div class='col-xs-3 activity-img'><img src='$profile' class='img-responsive' alt=''/></div>
							<div class='clearfix'> </div>
						     </div>";
				  	                           
					 }
                 }
                
       }
        echo"</div>
						</div>
					</div>					
				   <form id='groupsz' method='post' >
						  <input type='text' value=''  id='txtpost' placeholder='Post your message..'/>
       	                  <a data-id='$userid' data-gc='$groupcreator' data-ib='$groupname' class='open-btnPost btn  btn-success' style='color:white;'><i class='fa fa-send'></i></a>
        
				   </form>";
}
if(isset($_POST['schmetype'])){
	   
	    $patientid=$_POST['schemepid'];
	    $schemenumber=$_POST['schemeno'];	   
	    $scheme=$_POST['schmetype'];
	    
	$date=date('y-m-d');
	                      	
	                       //$cost='';$drug='';$total=1500; //$drugs=0;
	                       $total=1500;
 $sqld ="SELECT * FROM tbl_treatment WHERE Patientid='$patientid' && Status='Pay' || Status='Notpaid' ";
  $retrievesd = mysqli_query($db,$sqld);
		$numd=mysqli_num_rows($retrievesd);
		if($numd!=0){
                       while($found = mysqli_fetch_array($retrievesd))
	                  {
                                 	                    
						 $drugname=$found['Drugid'];$amount=$found['Quantity'];
						 $amo=$found['Amount'];$dayss=$found['Days'];								  
					       $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$drugname' ";
                           $retrieved = mysqli_query($db,$sqluser);
                           while($found = mysqli_fetch_array($retrieved))
	                            {
                                   $priced= $found['PurchasedPrice']; $quantity= $found['Drugsremain'];
								   $price=round(($priced/$quantity)*2.5,2); 
						           $costs=$amount*$price;		                                                          
								}
								$num=$costs;
                                $fig=round($num,0); // this gives the value without decimal
                                $num0=$fig % 50;   // this gives the reminder
                                $num1=50-$num0;   //this gives the diffrence
                                $costs=$fig+$num1;  //this add the difference to the amount
																		
								$sqlc ="SELECT * FROM tbl_laboratory WHERE Patientid='$patientid' && Status!='Closed' ";
                                      $retrievesc = mysqli_query($db,$sqlc);
									  $numc=mysqli_num_rows($retrievesc);
									  if($numc!=0){
                                                      	$labcost=500;
										                
									               }else{$labcost=0; }		              
				  	   			  $drugs=$quantity-$amount;
								  //$costs=$costs+$labcost+$total;
								  $enter="UPDATE tbl_drugs SET Drugsremain='$drugs' WHERE Name='$drugname' ";
                                  $db->query($enter);
                                  $querry="UPDATE tbl_treatment SET Status='',Progress='Notpaid' WHERE Patientid='$patientid' && Status='Pay' || Status='Notpaid'  ";
                                  $db->query($querry);
								  //$querry="UPDATE tbl_petients SET Status='Treated' WHERE id='$patientid'";
                                   //$db->query($querry);	
								              
	                                        // date_default_timezone_set('Africa/Cairo');      change this timezone to suit your location
                                               $time=date( 'h:i:s A', time () );
 
								   $queryz = "INSERT INTO tbl_transactions (Patientid,Drugname,Quantity,Unitprice,Totalcost,Consultation_fee,Lab_fee,Payment,Scheme_id,Date,Time,Days,Amount) ".
                                              "VALUES ('$patientid','$drugname','$amount','$price','$costs','$total','$labcost','$scheme','$schemenumber','$date','$time','$dayss','$amo')";
                                                             $db->query($queryz) or die('Errorr1, query failed to upload');		
										
				  	   $sql="SELECT * FROM tbl_petients WHERE id='$patientid' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)!=0)
                         {                                           						
							 while($found = mysqli_fetch_array($resultn))
	                               {
                                     $fname = $found['Firstname'];
									 $oname = $found['Sirname'];
					               } 			                             
                         }
                        $activity="Patient ".$fname.' '.$oname." sent to pharmacy";
                        
                        }
													 
				  }	            
         echo"true";
	} 
                    
if(isset($activity)){			  
								   $login=$_COOKIE['login'];
	                                $user=$_COOKIE['user'];
	   	                            
								   $query = "SELECT * FROM tbl_userlogs WHERE Login='$login' && Userid='$user' ";
                      $result =mysqli_query($db,$query) or die('Error, query failed');
                        if( mysqli_num_rows($result) != 0)                         
                         {
                         	while($found = mysqli_fetch_array($result))
                         	{
                         		   $useractions= $found['Activities'];
								   $count= $found['Count'];
							}
				           if($useractions==''){
				           	          
									  $queryz = "UPDATE tbl_userlogs Set Activities='$activity',Count='1'  WHERE Login='$login' && Userid='$user' ";                        
                                    $db->query($queryz) or die('Errorr, query failed to upload');	
					        
				           }else{
				           	                     $count=$count+1;
				           	             $arry=explode('\n',$useractions);
                                      		array_push($arry,$activity);                                                      
                                                       $addaction=implode('\n',$arry);
                                       	$queryz = "UPDATE tbl_userlogs Set Activities='$addaction',Count='$count'  WHERE Login='$login' && Userid='$user' ";                        
                                    $db->query($queryz) or die('Errorr, query failed to upload');	
					           
                                      	
						   }  }
                                    }
 ?> 