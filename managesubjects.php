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
			  	   $id= $found['id'];			  
          	   $role= $found['Position'];	
			    $profile="";
   
  	    }
}else{
	 header('location:index.php');
      exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" href="data-table/jquery.dataTables.min.css"/>
 <link rel="stylesheet" href="data-table/buttons.dataTables.min.css"/>      

   
   <script src='data-table/jquery-1.12.4.js'></script>
   <script src='data-table/jquery.dataTables.min.js'></script>
   <script src='data-table/dataTables.buttons.min.js'></script>
   <script src='data-table/buttons.flash.min.js'></script>
   <script src='data-table/jszip.min.js'></script>
   <script src='data-table/pdfmake.min.js'></script>
   <script src='data-table/vfs_fonts.js'></script>
   <script src='data-table/buttons.html5.min.js'></script>
   <script src='data-table/buttons.print.min.js'></script>
      
 <script>
      
      $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
        } );
      
      </script> 

			
				
				<div class="charts">
					<div class="col-md-4 charts-grids widget" style="width:27%" >
						<div class="card-header">
							<h3>Allocate subject to class</h3>
						</div>
						<div class="row-one widgettable">
			
					
						 <!-- multistep form -->
<form action="register.php" method="post"  >
  <!-- progressbar -->
  
  <!-- fieldsets -->
           <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Select Class</span>
<select style='height:37px;width:100%;border:1px solid;' name="standard"  id='studyname' > 
           				       
<option value="Std_1" >Standard 1</option>
<option value="Std_2" >Standard 2</option>
<option value="Std_3">Standard 3</option>
<option value="Std_4">Standard 4</option>
<option value="Std_5">Standard 5</option>
<option value="Std_6">Standard 6</option>
<option value="Std_7">Standard 7</option>
<option value="Std_8">Standard 8</option>									             			 	
				                             
            				                           
            				                           </select>  
            				                           </div>

            <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Select </span>
           				       
            				                     <input type="checkbox" name="all" value="all">&nbsp;<b>Select All</b><br>
         
            				                           <?php
            				                           $ramend ="SELECT * FROM tbl_subjects WHERE School='$institution' ";
                                                          $amendf = mysqli_query($db,$ramend);
            				                           
            				                           while($founda = mysqli_fetch_array($amendf))
	                                               {
                                                      $sname = $founda['Subjectname'];	                      
                                                     
                                                              $id = $founda['id'];	                           
		                                                     echo"<input type='checkbox' name='$id' value='$sname'>&nbsp;$sname<br>";
									             			 	
				                                    }
            				                           
            				                        ?>
            				                            </div>
  
   

     <button  class='btn  btn-success'  value="Enumeration" name="Taxpayer">Submit</button> 
   
  
  
</form>
  </div>
		
				<div class="clearfix"> </div>
		</div>
								
					
					
					<div class="col-md-4 charts-grids widget states-mdl" style="width:70%">
						
						<div class="middle-content">
						<h4 class="title">Records showing subjects taught in a particular class</h4>
					     <div class="alert alert-info">
                             <i style='color:green' class="fa fa-check"></i>&nbsp;Symbol means the subject is taught in the calss
                            <br><i style='color:red' class="fa fa-close"></i>&nbsp;Symbol means the subject is not taught in the calss 
 
                         </div>
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                            
                 <th>Subject</th>
                <th>Std 1</th>
                 <th>Std 2</th>
                  <th>Std 3</th>
                <th>Std 4</th>  
                <th>Std 5</th>
                 <th>Std 6</th>
                  <th>Std 7</th>
                <th>Std 8</th>              
            </tr>
        </thead>
        <tbody>
        	
        	<?php   $sqlmembe ="SELECT * FROM tbl_subjects WHERE School='$institution' ORDER BY id DESC";
			       $retriev = mysqli_query($db,$sqlmembe);
				               
                     while($found = mysqli_fetch_array($retriev))
	                 {
                      $std3=$found['Std_3']; 
                       $std4=$found['Std_4'];$std1=$found['Std_1'];$std2=$found['Std_2'];
					   $std5=$found['Std_5'];$std6=$found['Std_6'];$std7=$found['Std_7'];$std8=$found['Std_8'];
                       $cname=$found['Subjectname'];
					   						if($std1=='Yes'){$show1="<i style='color:green' class='fa fa-check'>";}else{$show1="<a  style='color:red'><i class='fa fa-close'></i></a>";}
					   						if($std2=='Yes'){$show2="<i style='color:green' class='fa fa-check'>";}else{$show2="<a  style='color:red'><i class='fa fa-close'></i></a>";}
					   
			           if($std3=='Yes'){$show3="<i style='color:green' class='fa fa-check'>";}else{$show3="<a  style='color:red'><i class='fa fa-close'></i></a>";}
					   if($std4=='Yes'){$show4="<i style='color:green' class='fa fa-check'>";}else{$show4="<a  style='color:red'><i class='fa fa-close'></i></a>";}
						if($std5=='Yes'){$show5="<i style='color:green' class='fa fa-check'>";}else{$show5="<a  style='color:red'><i class='fa fa-close'></i></a>";}
					   if($std6=='Yes'){$show6="<i style='color:green' class='fa fa-check'>";}else{$show6="<a  style='color:red'><i class='fa fa-close'></i></a>";}
						if($std7=='Yes'){$show7="<i style='color:green' class='fa fa-check'>";}else{$show7="<a  style='color:red'><i class='fa fa-close'></i></a>";}
						if($std8=='Yes'){$show8="<i style='color:green' class='fa fa-check'>";}else{$show8="<a  style='color:red'><i class='fa fa-close'></i></a>";}
						  
			                 echo"
                             <tr> 
			                 <td><a  data-toggle='modal' data-id='$cname'  href='#Code' class='open-Code' >$cname</a></td>
                                  <td>$show1</td>
                          <td>$show2</td>			                 
                          <td>$show3</td>
			                 <td>$show4</td>
			               <td>$show5</td>		                
			                 <td>$show6</td>
			                 <td>$show7</td>
			                <td>$show8</td>
			                </tr>
			                     "; 
					           
					 } 
		
		           	?>      

        </tbody>
        
    </table>
</div>
				        </div>
					
					</div>
			
					