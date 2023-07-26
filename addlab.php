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
			  //$institution = $found['Institution'];	
			  $emails = $found['Email'];
			  	   $id= $found['id'];			  
          	  $role= $found['Role'];	
			  $profile= $found['Pic_name'];
   
  	    }
}else{
	 header('location:index.php');
      exit;
}

			
			
			echo"<div class='charts'>		
			<div class='mid-content-top charts-grids'>
				<div class='middle-content'>
						<h4 class='title'>Labratory REGISTRATION FORM</h4>
					<!-- start content_slider -->
				         <div class='alert alert-info'>
                             <i class='fa fa-info'></i>&nbsp;Use the form below to enter Labratory details
                         </div>
		<form action='register.php' method='post' >
				<div class='charts'>
					<div class='col-md-4 charts-grids widget'>
						<div class='card-header' style='font-weight: bold;font-family: 'Palatino Linotype', serif'>
							<h3>Category Details</h3>
						</div>
						
						<div id='container' style='width: 100%; '>
							
							<div class='input-group' style='margin-bottom:10px;margin-top: 10px;'>
    <span class='input-group-addon'>Generic Name</span>
   <input type='text' name='cname' placeholder='Catagory Name' value='' class='form-control' required>
       </div>
	   <div class='modal-footer'>

      	<input type='submit' class='btn btn-success'  id='btns1' value='Submit' name='catagory'> &nbsp;
      		      	<input type='reset' class='btn btn-success'  id='btns' value='Clear' name=''> 

      	    </div>
       	</div></div>
			</form>				
					
							<form action='register.php' method='post' >

					<div class='col-md-4 charts-grids widget states-mdl'>
						<div class='card-header' style='font-weight: bold;font-family: 'Palatino Linotype', serif'>
							<h3>Sub Category Details</h3>
						</div>
						
<div class='input-group' style='margin-bottom:10px;margin-top: 10px'>
    <span class='input-group-addon'>Sub Category Name</span>
     <input type='text' name='sname' placeholder='Name' class='form-control' value='' required>
     </div>
     <div class='input-group' style='margin-bottom:10px'>
     ";
	 $sql='SELECT * FROM labcat';
     $resultn=mysqli_query($db,$sql);                    
     $rowcount=mysqli_num_rows($resultn);
	 ?><?php echo"
      <span class='input-group-addon'>Catagory</span>
	  <select class='form-control' id='category' name='cid'  onChange='getSubcat(this.value);'  required>
                      <option value='' selected>- Select Category-</option>";
					  ?><?php   
                     foreach($resultn as $row){
                         
                          echo "
                            <option value='".$row['id']."'>".$row['name']."</option>";
                        }

                      
							
                      ?>
					  
                   <?php echo" </select>
  </div> <div class='input-group' style='margin-bottom:10px;'>
        <span class='input-group-addon'>Price</span>
   <input type='text' name='price' placeholder='Price' class='form-control' value='' >
  </div> <div class='input-group' style='margin-bottom:10px;'>
        <span class='input-group-addon'>Normal Range</span>
   <input type='text' name='range' placeholder='Normal Range' class='form-control' value='' >
  </div>

<div class='modal-footer'>

      	<input type='submit' class='btn btn-success'  id='btns1' value='Submit' name='subcatagory'> &nbsp;
      		      	<input type='reset' class='btn btn-success'  id='btns' value='Clear' name=''> 

      	    </div>
  
  
</form>

                           
				        </div>
		
				</div>

					
		</div>";
		?>
		





















       

			    
           </br >
												
	            </br >
             	