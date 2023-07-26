<?php

	session_start();
include("db_connect.php"); 

         //date_default_timezone_set('Africa/Cairo');
           $ldate=date( 'd-m-Y h:i:s A', time () );
   
		 	
		
	if(isset($_COOKIE['userid']))
	   {                $login=$_COOKIE['login'];
	                   $user=$_COOKIE['user'];
	   	            $passwords=$_COOKIE['userid'];
					$user_email=$_COOKIE['useremail'];
					
					$queryz = "UPDATE tbl_userlogs Set Logout='$ldate'  WHERE Login='$login' && Userid='$user' ";                        
                   $db->query($queryz) or die('Errorr, query failed to upload');	
	
	      $queryz = "UPDATE tbl_users Set Online='Offline'  WHERE Password='$passwords' ";                        
        $db->query($queryz) or die('Errorr, query failed to upload');	
		
	   	    setcookie("userid",$passwords,time()-(60*60*24*7));
			setcookie("useremail",$user_email,time()-(60*60*24*7));
			setcookie("login",$ldate,time()-(60*60*24*7));
	         setcookie("user",$userid,time()-(60*60*24*7));				
			
		
					
		    header("Location: index.php");
	   }
	
	elseif(isset($_COOKIE['adminid']))
	   {
	   	             $passwords=$_COOKIE['adminid'];
					$user_email=$_COOKIE['adminemail'];	   	    
		    setcookie("adminid",$passwords,time()-(60*60*24*7));
			setcookie("adminemail",$user_email,time()-(60*60*24*7));						
		    header("Location: index.php");
	    }
	   elseif(isset($_COOKIE['class']))
	   {
	   	             $passwords=$_POST['userlogout'];
					$user_email=$_COOKIE['useremail'];
					 $login=$_COOKIE['login'];
	                   $user=$_COOKIE['user'];
				 
				 $queryz = "UPDATE tbl_userlogs Set Logout='$ldate'  WHERE Login='$login' && Userid='$user' ";                        
        $db->query($queryz) or die('Errorr, query failed to upload');	
				
			 				   	    
		    setcookie("class",$passwords,time()-(60*60*24*7));
			setcookie("useremail",$user_email,time()-(60*60*24*7));	
			setcookie("login",$ldate,time()-(60*60*24*7));	
			 setcookie("user",$userid,time()-(60*60*24*7));					
		 
		
			
			
	    }
	else{ header("Location: index.php");}
	
	session_destroy();
		
?>