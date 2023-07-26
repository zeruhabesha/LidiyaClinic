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
			  $emails = $found['Email'];
			  	   $id= $found['id'];			  
          	   $role= $found['Role'];	
			    $profile= $found['Pic_name'];
   
  	    }
}			
   ?>
   <div class='charts' >
			<div class='mid-content-top charts-grids'>
				
				<div class='middle-content' >
						<h4 class='title'>
                           
						</h4>
					<!-- start content_slider -->
					          
                                     
                                   
            				      
            				      		<div class='middle-content'>
					
					     <table id='example' class='display nowrap' style='width:100%'>
        <thead>
            <tr>
                <th>REGISTER MORE THAN ONE DRUG AT ONCE</th>
                             
                <th>&nbsp;</th>
                 
               
            				                                      
		          <th><a href='studentscvs.php?gs=1'> <i class='fa fa-download'></i></a>&nbsp;<a href='#' class='addstudents'> <i class='fa fa-refresh'></i></a>&nbsp;<a href='administrator.php'> <i class='fa fa-close'></i></a></th>									             			 	
				                        
		          
        
            </tr>
        </thead>
        <tbody>      	

        </tbody>
        
    </table>

				                       
                                  
                              </div>					
			   </div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
		<div class='charts' >
			<div class='mid-content-top charts-grids'>
				
				<div class='alert alert-success'>
                             <i class='fa fa-info-circle'></i>&nbsp;Ensure that the file upload is in CSV Format Otherwise it will not save
                              </div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
		<div class='charts' >		
			<div class='mid-content-top charts-grids' style='background-color:#00ACED'>
				<div class='middle-content' >
						<h4 class='title'>
                            <i class='fa fa-info-circle'></i>&nbsp;Steps to save the file!

						</h4>
					<!-- start content_slider -->
					     <div class='container'>
					     	<ol>
					     		<li>Drug generic name should be entered as the colums arranged</li>
					     		<li>Followed by the name of the second column,then arrange the rest of the column based on the teacher details</li>
					     		<li>Save the file as CSV not as xls </li>
					     		<li>Upload the file</li>
					        </ol>
                        </div>
                        SAMPLE FORMAT&nbsp;<a href='studentscvs.php?gs=1'><i class='fa fa-envelope'></i></a>&nbsp;Note:The web as file type will only be noted on excel files download from this application

					
			   </div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
		<div class='charts' >		
			<div class='mid-content-top charts-grids' >
				
						
					<!-- start content_slider -->
					      

        <form method='post' action='register.php' enctype='multipart/form-data'>        		
           
        	<p style='margin-bottom:10px;'>
        			<input name='file' type='file' id='file' >
           </p>  
          
          <button class='btn btn-success' name='submitedd2' id='btns3' >&nbsp;       		 
       		 <span class='glyphicon glyphicon-import' style='color: #F0F0F0'> </span> &nbsp;Upload </button>
       	 
      
      
       </form>
                           

					
			   
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
	<?php
	if(isset($_GET['gs'])) 
          {	           
			  $id=$_GET['gs'];
              $query = "SELECT name,type,Size,content FROM Excelfiles WHERE id='$id' ";         
         $result = mysqli_query($db,$query) or die('Error, query failed');		 
     list($name, $type, $content) = mysqli_fetch_array($result);
	       $path = 'script/'.$name;
		   $size = filesize($path);
	     header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header("Content-length:". $size);
         header("Content-type:". $type);
         header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
		 header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
     ob_clean();
       flush();
	       readfile('script/'.$name);	
                mysqli_close();
                exit;      
	}
	?>
	
	
		
			
				
		
		
				