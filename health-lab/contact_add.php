<?php


//include("config.php");
include("../db_connect.php");

	if(isset($_POST['submit'])){
		
		
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$message = $_POST['message'];
			

	
		 $sqln = "INSERT INTO contact (name,email,phone,message)
			               VALUES ('$name','$email','$phone','$message')";
		                     $db->query($sqln);
		                         
							
                              
	                               
	}        
	

?>

