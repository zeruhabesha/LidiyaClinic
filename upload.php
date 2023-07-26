<?php
session_start();
include("db_connect.php");
if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}


if(isset($_COOKIE['userid'])){$userid=$_COOKIE['userid'];}


   
if(isset($_FILES['file2']['name'])&&$_POST['Change'])	{
			 	
	              $id=$_POST['id'];
		         
			     $receiptName = $_FILES['file2']['name'];
                 $receipttmpName = $_FILES['file2']['tmp_name'];
                 $receiptSize = $_FILES['file2']['size'];
                 $receiptType = $_FILES['file2']['type'];
				   $pages=$_POST['page'];
				   
				 if($id=='')
				 {
				       $userid=$_COOKIE['userid'];
                       $useremail=$_COOKIE['useremail'];

                          $sqluser ="SELECT * FROM tbl_teachers WHERE Password='$userid' && Email='$useremail'";

                          $retrieved = mysqli_query($db,$sqluser);
                          while($found = mysqli_fetch_array($retrieved))
	                     {
                             $id= $found['id'];   
  	                     }
				 }
			
 	 $qued="SELECT * FROM profile_Picture WHERE Studentid='$id' && Category='Teacher'";
                     $resul=mysqli_query($db,$qued);
                    $checks=mysqli_num_rows($resul);
                     if($checks!=0)
                     {
                     	if( move_uploaded_file ($receipttmpName, 'multimedia/pictures/'.$receiptName)){//image is a folder in which you will save documents
                            $queryz = "UPDATE profile_picture SET name='$receiptName',Size='$receiptSize',type='$receiptType',content='$receiptName',Category='Teacher' WHERE Studentid='$id' && Category='Teacher' ";
                                  $db->query($queryz) or die('Errorr, query failed to upload');	
									    //$_SESSION['update']="yes";
										header("Location:administrator.php");
						}
						
                     }
                     else{
							  
                             if(move_uploaded_file ($receipttmpName, 'multimedia/pictures/'.$receiptName)){//image is a folder in which you will save documents
                                 $queryz = "INSERT INTO profile_picture (name,Size,type,content,Category,Studentid) ".
                                 "VALUES ('$receiptName','$receiptSize',' $receiptType', '$receiptName','Teacher','$id')";                                 
                                     $db->query($queryz) or die('Erro, query failed to upload');	
									    	header("Location:administrator.php");
					
						             }
					   }
			 }

if(isset($_POST['addmember']))
     {
     	 $pagex = mysqli_real_escape_string($db,$_POST['page']);
     	 if($_POST['memail']!=''&&$_POST['mfname']!=''&&$_POST['msname']!=''&&$_POST['mphone']!=''&&$_POST['minstitution']!=''&&$_POST['mpassword']!='')
           {              
            
   		$mfname = mysqli_real_escape_string($db,$_POST['mfname']);
		$msname = mysqli_real_escape_string($db,$_POST['msname']);		
	  $memail=mysqli_real_escape_string($db,$_POST['memail']);
	    $mphone =mysqli_real_escape_string($db,$_POST['mphone']);
	     $minstititution = mysqli_real_escape_string($db,$_POST['minstitution']);
		   $mpassword = mysqli_real_escape_string($db,$_POST['mpassword']);
		      		
		   
		 
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
							   
							   $check="SELECT * FROM tbl_users WHERE Firstname='$mfname' && Sirname='$msname'";
						       $checks=mysqli_query($db,$check);
						  $found=mysqli_num_rows($checks);
							  if($found==0)
							  {
							  	$query = "INSERT INTO tbl_users (Firstname,Sirname,Mtitle,Email,Password,Phone,Role,Online) ".
                            "VALUES ('$mfname','$msname', '$mtitle','$memail','$mpassword','$mphone','$minstititution','Offline')";
                                 $db->query($query) or die('Error1, query failed');	
								 
								  $sqluser ="SELECT * FROM tbl_users WHERE Password='$mpassword' && Sirname='$msname'  ";
                                   $retrieved = mysqli_query($db,$sqluser);
                                 while($found = mysqli_fetch_array($retrieved))
	                              {
                                 	 $userid=$found['id']; 			              
				  	              }
								 $enter="INSERT INTO tbl_userprivilages (Userid) 
                               	     VALUES('$userid')";
                                  $db->query($enter);
								 
							     $memberadd="tyy";					  
			                     $_SESSION['memberadded']=$memberadd;
                                    header("Location:$pagex");  //member added successfully
				 
			  
			  
							  }else{
							  	$_SESSION['memberexist']="member already exist";
                                 header("Location:$pagex");  
				 
							  }
				}else{
					$_SESSION['emptytextboxes']="Not all text boxes were completed";
                                 header("Location:$pagex");  
				 
				    }
               
          }

               
 					 
?>