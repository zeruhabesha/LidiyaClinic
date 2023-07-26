<?php
ob_start();
session_start();   
include("db_connect.php"); 
 
if(isset($_POST['login_button'])) {
	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);
	

	
		$usql = "SELECT * FROM tbl_users WHERE Email='$user_email' && Password='$user_password' ";
	$uresult = mysqli_query($db, $usql) or die("database error:". mysqli_error($db));
	if(mysqli_num_rows($uresult) <= 0){
		echo "Incorrect Email or Password";
		exit;
	}
	$urow = mysqli_fetch_assoc($uresult);	
	
		$userid=$urow['id'];


   
	
   if($urow['Password']==$user_password){				
		
	 setcookie("userid",$user_password,time()+(60*60*24*7));
	 setcookie("useremail",$user_email,time()+(60*60*24*7));
	              
           // date_default_timezone_set('Africa/Cairo');                  Change this timezone to suit your location
           $ldate=date( 'd-m-Y h:i:s A', time () );
 
		   //Get the ipconfig details using system commond
         // system('ipconfig /all');
 
          // Capture the output into a variable
           // $mycom=ob_get_contents();
           // Clean (erase) the output buffer
         //   ob_clean();
 
            //    $findme = "Physical";
             //Search the "Physical" | Find the position of Physical text
              // $pmac = strpos($mycom, $findme);
 
           // Get Physical Address
           $alphabet='1234567890';
		   $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $sname=implode($pass); //turn the array into a string
   $fa= substr($sname,0,1);
    $fb= substr($sname,1,1);
	$fc= substr($sname,2,1);
	$fd= substr($sname,3,1);
	$fe= substr($sname,4,1);
	$ff= substr($sname,5,1);
	
	$alphabet2='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		   $pass2 = array(); //remember to declare $pass as an array
    $alphaLength2 = strlen($alphabet2) - 1; //put the length -1 in cache
    for ($i2 = 0; $i2 < 7; $i2++) {
        $n2 = rand(0, $alphaLength2);
        $pass2[] = $alphabet2[$n2];
    }
    $sname2=implode($pass2); //turn the array into a string
   $fa2= substr($sname2,0,1);
    $fb2= substr($sname2,1,1);
	$fc2= substr($sname2,2,1);
	$fd2= substr($sname2,3,1);
	$fe2= substr($sname2,4,1);
	$ff2= substr($sname2,5,1);
          //$passid=$fn.$ln.$code;
            //$mac=substr($mycom,($pmac+36),17);
			
		$mac=$fa2.$fa.'-'.$fb2.$fb.'-'.$fc2.$fc.'-'.$fd2.$fd.'-'.$fe2.$fe.'-'.$ff2.$ff;  
	  	$enter="INSERT INTO tbl_userlogs (Login,Machineip,Userid,Count) 
                               	     VALUES('$ldate','$mac','$userid','0')";
                                  $db->query($enter);
			  $time=time();
			   
			$queryz = "UPDATE tbl_users Set Online='Online',Time='$time' WHERE Password='$user_password' ";                        
        $db->query($queryz) or die('Errorr, query failed to upload');	
	  
	  setcookie("login",$ldate,time()+(60*60*24*7));
	 setcookie("user",$userid,time()+(60*60*24*7));
	 
								 	
	 echo "ok";	 
		
	}
    
	   
	else {				
		echo "email or password does not exist."; // wrong details 
	       }		
}


 	
?>