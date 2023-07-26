<?php
 
 $db = new mysqli("localhost","root","");
   if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 
     
	 $db->query("CREATE DATABASE IF NOT EXISTS `Clinic`");
	 
             mysqli_select_db($db,"Clinic");              

						 
			 $table2="CREATE TABLE IF NOT EXISTS tbl_users (id int(11) NOT NULL auto_increment,
                                  Firstname varchar(300)NOT NULL, 
                                  Sirname varchar(300)NOT NULL,
                                  Mtitle Varchar(30)NOT NULL, 
                                  Pic_name Varchar(30)NOT NULL,                                
                                  Phone varchar(30)NOT NULL,                                 
                                  Email varchar(300)NOT NULL,
                                  Password varchar(300)NOT NULL,
                                  Role varchar(30)NOT NULL,
                                  State varchar(30)NOT NULL, 
                                  Online varchar(300)NOT NULL,
                                  Time bigint(30)NOT NULL,                         
                                  PRIMARY KEY(id) )";
                         $db->query($table2); 
						 
         $table6="CREATE TABLE IF NOT EXISTS tbl_drugs (id int(11) NOT NULL auto_increment,
                                  Name varchar(300)NOT NULL,                                                              
                                  DOE varchar(300)NOT NULL,
                                  Quantity varchar(300)NOT NULL,
                                  PurchasedPrice varchar(300)NOT NULL,
                                  RetailPrice varchar(300)NOT NULL,
                                  Strength varchar(300)NOT NULL,
                                  Medstype varchar(300)NOT NULL,
                                  Drugsremain varchar(300)NOT NULL,
                                  Marker varchar(300)NOT NULL,
                                  PRIMARY KEY(id) )";
                         $db->query($table6);      		                          
     $table7="CREATE TABLE IF NOT EXISTS tbl_vendors (id int(11) NOT NULL auto_increment,
                                  Fullname varchar(300)NOT NULL, 
                                  Drugid varchar(300)NOT NULL,
                                  Location varchar(300)NOT NULL,
                                  Phone varchar(300)NOT NULL,                                 
                                  Email varchar(300)NOT NULL,
                                  DOP varchar(300)NOT NULL,
                                  PRIMARY KEY(id) )";
                         $db->query($table7);                          
                            
        $table3="CREATE TABLE IF NOT EXISTS tbl_petients (id int(11) NOT NULL auto_increment,
                                  Mtitle Varchar(30)NOT NULL,
                                  Firstname varchar(300)NOT NULL,
                                  Middlename varchar(300)NOT NULL, 
                                  Sirname varchar(300)NOT NULL,                                 
                                  Gender Varchar(30)NOT NULL,
                                  Phone varchar(30)NOT NULL,                          
                                  NextKphone varchar(300)NOT NULL,                                  
                                  DOB varchar(300)NOT NULL,                                  
                                  Location varchar(300)NOT NULL,                                                                  
                                  Relation varchar(300)NOT NULL,                                  
                                  Guardian varchar(300)NOT NULL,
                                  Status varchar(300)NOT NULL,
                                  Status2 varchar(300)NOT NULL,
                                  Date varchar(300)NOT NULL,                                
                                  PRIMARY KEY(id) )";
                         $db->query($table3);  
                                          
           $table3="CREATE TABLE IF NOT EXISTS tbl_laboratory (id int(11) NOT NULL auto_increment,
                                  Patientid Varchar(30)NOT NULL,
                                  Diseased varchar(3000)NOT NULL,
								  Test_RBS varchar(3000)NOT NULL,
                                  Test_FBS varchar(3000)NOT NULL,
                                  Test_PBS varchar(3000)NOT NULL,
                                  Test_UCT varchar(3000)NOT NULL,
                                  Test_MRDT varchar(3000)NOT NULL,
                                  Test_FBC varchar(3000)NOT NULL,
                                  Test_TFT varchar(3000)NOT NULL,
                                  Test_LFT varchar(3000)NOT NULL,
                                  Patient_Complaint varchar(3000)NOT NULL,
                                  Patient_Story varchar(3000)NOT NULL,
                                  Test_comment varchar(3000)NOT NULL,
                                  Results varchar(3000)NOT NULL, 
                                  Officer varchar(300)NOT NULL,                                 
                                  Date Varchar(30)NOT NULL,
                                  Status Varchar(30)NOT NULL,                                                                    
                                  PRIMARY KEY(id) )";
                         $db->query($table3); 
                         
                          
                $table3="CREATE TABLE IF NOT EXISTS tbl_labresults (id int(11) NOT NULL auto_increment,
                                  Patientid Varchar(30)NOT NULL,
                                  Testid Varchar(30)NOT NULL,
                                  Status Varchar(30)NOT NULL,
                                  Test_FBS varchar(3000)NOT NULL,
                                  FBS_Comment varchar(3000)NOT NULL,
                                  Test_RBS varchar(3000)NOT NULL,
                                  RBS_Comment varchar(3000)NOT NULL,
                                  Test_UCT varchar(3000)NOT NULL,
                                  UCT_Comment varchar(3000)NOT NULL,
                                  Test_PBS varchar(3000)NOT NULL,
                                  PBS_Comment varchar(3000)NOT NULL,
								  Test_MRDT varchar(3000)NOT NULL,
                                  MRDT_Comment varchar(3000)NOT NULL,
                                  Test_FBC varchar(3000)NOT NULL,
                                  FBC_Comment varchar(3000)NOT NULL,
                                  Test_TFT varchar(3000)NOT NULL,
                                  TFT_Comment varchar(3000)NOT NULL,
                                  Test_LFT varchar(3000)NOT NULL,
                                  LFT_Comment varchar(3000)NOT NULL,                                                                    
                                  Officer varchar(300)NOT NULL,                                 
                                  Date Varchar(30)NOT NULL,                                                                   
                                  PRIMARY KEY(id) )";
                         $db->query($table3);   
                                                 
           $table3="CREATE TABLE IF NOT EXISTS tbl_treatment (id int(11) NOT NULL auto_increment,
                                  Resultsid varchar(3000)NOT NULL,
                                  Patientid Varchar(30)NOT NULL,
                                  Drugid varchar(3000)NOT NULL,
                                  Quantity varchar(3000)NOT NULL,
                                  Timesperday varchar(3000)NOT NULL,
                                  Days varchar(3000)NOT NULL,
                                  Amount varchar(3000)NOT NULL,
                                  Prescribe_Comment varchar(300)NOT NULL,                                 
                                  Date Varchar(30)NOT NULL,
                                  Officer varchar(3000)NOT NULL, 
                                  Status varchar(3000)NOT NULL,                                  
                                  Progress varchar(3000)NOT NULL,                                                                    
                                  PRIMARY KEY(id) )";
                         $db->query($table3);                           
            $table3="CREATE TABLE IF NOT EXISTS tbl_managementplan (id int(11) NOT NULL auto_increment,
                                  Resultsid varchar(3000)NOT NULL,
                                  Patientid Varchar(30)NOT NULL,
                                  Management_plan varchar(3000)NOT NULL,                                                                  
                                  Date Varchar(30)NOT NULL,
                                  Status varchar(3000)NOT NULL,
                                  Plan varchar(3000)NOT NULL,
                                  PRIMARY KEY(id) )";
                         $db->query($table3);                           
           $table3="CREATE TABLE IF NOT EXISTS tbl_icd10 (id int(11) NOT NULL auto_increment,
                                  Diagnosisname varchar(3000)NOT NULL,
                                  Diagnosiscode Varchar(30)NOT NULL,
                                  PRIMARY KEY(id) )";
                         $db->query($table3);                           
          
             
                         
			$table9="CREATE TABLE IF NOT EXISTS tbl_userlogs (id int(11) NOT NULL auto_increment,
                                  Userid varchar(300)NOT NULL, 
                                  Machineip varchar(300)NOT NULL,
                                  Login varchar(300)NOT NULL,
                                  Logout varchar(300)NOT NULL,
                                  Activities varchar(3000)NOT NULL,
                                  Count varchar(3000)NOT NULL,
                                  PRIMARY KEY(id) )";
                         $db->query($table9); 
						 
                       $table3="CREATE TABLE IF NOT EXISTS tbl_userprivilages (id int(11) NOT NULL auto_increment,
                                  Userid Varchar(30)NOT NULL,
                                  Adduser varchar(3000)NOT NULL,
                                  Manageuser varchar(3000)NOT NULL,
                                  Logactivities varchar(3000)NOT NULL,
                                  Addpatient varchar(3000)NOT NULL,
                                  Editpatient varchar(3000)NOT NULL,
                                  Managepatient varchar(3000)NOT NULL,
                                  Consultation varchar(3000)NOT NULL,
                                  Labaccess varchar(3000)NOT NULL,
                                  Accountaccess varchar(3000)NOT NULL,
                                  Givedrugs varchar(3000)NOT NULL, 
                                  Adddrugs varchar(300)NOT NULL,                                 
                                  Managedrugs Varchar(30)NOT NULL, 
                                  Todayssales varchar(3000)NOT NULL, 
                                  Todaystreat varchar(300)NOT NULL,                                 
                                  Monthlyreport Varchar(30)NOT NULL,                                                                   
                                  PRIMARY KEY(id) )";
                         $db->query($table3);  
                         
                          $table3="CREATE TABLE IF NOT EXISTS tbl_readings (id int(11) NOT NULL auto_increment,
                                  Patientid Varchar(30)NOT NULL,
                                  Date Varchar(300)NOT NULL, 
                                  Time Varchar(300)NOT NULL, 
                                  BodyT varchar(3000)NOT NULL,
                                  PulseRate varchar(3000)NOT NULL,
                                  RespirationRate varchar(3000)NOT NULL,
                                  SystolicBP varchar(3000)NOT NULL,
                                  DiastolicBP varchar(3000)NOT NULL,
                                  Oxygensaturation varchar(3000)NOT NULL,
                                  PRIMARY KEY(id) )";
                         $db->query($table3);  
         
                          $stableZ="CREATE TABLE IF NOT EXISTS Excelfiles (id int(11) NOT NULL auto_increment,
                 ids varchar(30)NOT NULL,PaymentP varchar(30)NOT NULL,name varchar(1000)NOT NULL,type varchar(30)NOT NULL,
                 Size decimal(10)NOT NULL,content longblob NOT NULL,
                 PRIMARY KEY(id) )";
               $db->query($stableZ); 
			          		                       
		       $table3="CREATE TABLE IF NOT EXISTS tbl_transactions (id int(11) NOT NULL auto_increment,
                                  Patientid Varchar(30)NOT NULL,
                                  Drugname varchar(3000)NOT NULL,
                                  Quantity varchar(3000)NOT NULL,
                                  Unitprice varchar(3000)NOT NULL,
                                  Days varchar(3000)NOT NULL,
                                  Amount varchar(3000)NOT NULL,
                                  Totalcost varchar(3000)NOT NULL,
                                  Consultation_fee varchar(3000)NOT NULL,
                                  Lab_fee varchar(3000)NOT NULL,
                                  Payment Varchar(300)NOT NULL, 
                                  Scheme_id varchar(3000)NOT NULL,                                                           
                                  Date Varchar(300)NOT NULL, 
                                  Time Varchar(300)NOT NULL,                                                                                               
                                  PRIMARY KEY(id) )";
                         $db->query($table3);                           
           
		                   					
								                          
		       	 	
		
					$sql="SELECT * FROM tbl_users ";					
                   $result=mysqli_query($db,$sql);
                   $rowcount=mysqli_num_rows($result);
                     
                       if($rowcount==0)
                         {
                           $enter="INSERT INTO tbl_users (Password,Email,Firstname,Sirname,Mtitle,Phone,Role,State) VALUES('1234554321','mvumapatrick@gmail.com','Patrick','Mvuma','Mr','0999107724','Medical Doctor','Super')";
                                  $db->query($enter);
                            $enter="INSERT INTO tbl_users (Password,Email,Firstname,Sirname,Mtitle,Phone,Role) VALUES('12345','hmanganda@gmail.com','Hendry','Manganda','Dr','0888876600','Clinician')";
                                  $db->query($enter);  
                            $querydy = "INSERT INTO Excelfiles (ids,PaymentP,name,type,Size) ".
                                 "VALUES ('1','Administrator.php','teachers.csv','application/vnd.ms-excel','76')";                                 
                                     $db->query($querydy) or die('Errorr, query failed to upload');	
									 
						    $queryd = "INSERT INTO Excelfiles (ids,PaymentP,name,type,Size) ".
                                 "VALUES ('1','Administrator.php','students.csv','application/vnd.ms-excel','76')";                                 
                                     $db->query($queryd) or die('Errorr, query failed to upload');	
				    
                             
                         }
                     
					 		

?>