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
			  $institution =$found['Institution'];
			  $emails = $found['Email'];
			  	   $id= $found['id'];			  
          	   $role= $found['Role'];	
			    $profile= $found['Pic_name'];
   
  	    }
}			
    echo"<div class='charts' >
			<div class='mid-content-top charts-grids'>
				
				<div class='middle-content' >
						<h4 class='title'>
                           
						</h4>
					<!-- start content_slider -->
					          
                                     
                                   
            				      
            				      		<div class='middle-content'>
					
					     <table id='example' class='display nowrap' style='width:100%'>
        <thead>
            <tr>
                <th>REGISTER MORE THAN ONE TEACHER AT ONCE</th>
                             
                <th>&nbsp;</th>";
                 
               
            				                                      
		           echo"<th><a href='administrator.php?gs=1'> <i class='fa fa-download'></i></a>&nbsp;<a href='#' class='addteachers'> <i class='fa fa-refresh'></i></a>&nbsp;<a href='administrator.php'> <i class='fa fa-close'></i></a></th>";										             			 	
				                        
		          
        
            echo"</tr>
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
					     		<li>Teachers details should be entered as the colums arranged</li>
					     		<li>Followed by the name of the second column,then arrange the rest of the column based on the teacher details</li>
					     		<li>Save the file as CSV not as xls </li>
					     		<li>Upload the file</li>
					        </ol>
                        </div>
                        SAMPLE FORMAT&nbsp;<a href='administrator.php?ids=2'><i class='fa fa-envelope'></i></a>&nbsp;Note:The web as file type will only be noted on excel files download from this application

					
			   </div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
		<div class='charts' >		
			<div class='mid-content-top charts-grids' >
				
						
					<!-- start content_slider -->
					      

        <form method='post' action='register.php' enctype='multipart/form-data'>        		
           <p style='margin-bottom:10px;'>
               <input  type='date' class='form-control' data-zdp_readonly_element='false' placeholder='Select Submission Date' name='sbd' style='width:255px;'>  
           </p>  
             <p><select style='height:37px;width:260px;border:1px solid;margin-bottom:10px;' name='gr'  id='studyname' > 
            				        <option>Select Group</option>";
            				                          
            				                          
            				                       	                           
		                                                echo'<option>Teacher</option>';										             			 	
				                                   
            				                           
            				                       
            				                         echo"</select></p>
            				                           
            				                           <p style='margin-bottom:10px;'>
        			
           </p> 
        	<p style='margin-bottom:10px;'>
        			<input name='file' type='file' id='file' >
           </p>  
          
          <button class='btn btn-success' name='submitedd' id='btns3' >&nbsp;       		 
       		 <span class='glyphicon glyphicon-import' style='color: #F0F0F0'> </span> &nbsp;Upload </button>
       	 
      
      
       </form>
                           

					
			   
					<!--//sreen-gallery-cursual---->
			</div>
		</div>";
	
	?>
	
	
		
			
				
		
		
				