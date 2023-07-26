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
			    $profile='';
   
  	    }
}else{
	 header('location:index.php');
      exit;

}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>MASS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
             
             <!-- //the next plugin link below are for date --> 
      <link rel="stylesheet" href="css/zebra_datepicker.min.css" type="text/css">
      

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">  
      <link rel="stylesheet" href="css/style1.css">


        

<!-- Bootstrap Core CSS -->
<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="admin/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='admin/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="admin/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 


<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
 <!-- //the links below are for date plugin -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
 <link href="css/animate.min.css" rel="stylesheet"/>   
      <link rel="stylesheet" href="css/bootstrap-dropdownhover.css">
<style>
@import "bourbon";

// Breakpoints
$bp-maggie: 15em; 
$bp-lisa: 30em;
$bp-bart: 48em;
$bp-marge: 62em;
$bp-homer: 75em;

// Styles
* {
 @include box-sizing(border-box);
 
 &:before,
 &:after {
   @include box-sizing(border-box);
 }
}

body {
  font-family: $helvetica;
  color: rgba(94,93,82,1);
}

a {
  color: rgba(51,122,168,1);
  
  &:hover,
  &:focus {
    color: rgba(75,138,178,1); 
  }
}

.container {
  margin: 5% 3%;
  
  @media (min-width: $bp-bart) {
    margin: 2%; 
  }
  
  @media (min-width: $bp-homer) {
    margin: 2em auto;
    max-width: $bp-homer;
  }
}

.responsive-table {
  width: 100%;
  margin-bottom: 1.5em;
  border-spacing: 0;
  
  @media (min-width: $bp-bart) {
    font-size: .9em; 
  }
  
  @media (min-width: $bp-marge) {
    font-size: 1em; 
  }
  
  thead {
    // Accessibly hide <thead> on narrow viewports
    position: absolute;
    clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
    padding: 0;
    border: 0;
    height: 1px; 
    width: 1px; 
    overflow: hidden;
    
    @media (min-width: $bp-bart) {
      // Unhide <thead> on wide viewports
      position: relative;
      clip: auto;
      height: auto;
      width: auto;
      overflow: auto;
    }
    
    th {
      background-color: rgba(29,150,178,1);
      border: 1px solid rgba(29,150,178,1);
      font-weight: normal;
      text-align: center;
      color: white;
      
      &:first-of-type {
        text-align: left; 
      }
    }
  }
  
  // Set these items to display: block for narrow viewports
  tbody,
  tr,
  th,
  td {
    display: block;
    padding: 0;
    text-align: left;
    white-space: normal;
  }
  
  tr {   
    @media (min-width: $bp-bart) {
      // Undo display: block 
      display: table-row; 
    }
  }
  
  th,
  td {
    padding: .5em;
    vertical-align: middle;
    
    @media (min-width: $bp-lisa) {
      padding: .75em .5em; 
    }
    
    @media (min-width: $bp-bart) {
      // Undo display: block 
      display: table-cell;
      padding: .5em;
    }
    
    @media (min-width: $bp-marge) {
      padding: .75em .5em; 
    }
    
    @media (min-width: $bp-homer) {
      padding: .75em; 
    }
  }
  
  caption {
    margin-bottom: 1em;
    font-size: 1em;
    font-weight: bold;
    text-align: center;
    
    @media (min-width: $bp-bart) {
      font-size: 1.5em;
    }
  }
  
  tfoot {
    font-size: .8em;
    font-style: italic;
    
    @media (min-width: $bp-marge) {
      font-size: .9em;
    }
  }
  
  tbody {
    @media (min-width: $bp-bart) {
      // Undo display: block 
      display: table-row-group; 
    }
    
    tr {
      margin-bottom: 1em;
      
      @media (min-width: $bp-bart) {
        // Undo display: block 
        display: table-row;
        border-width: 1px;
      }
      
      &:last-of-type {
        margin-bottom: 0; 
      }
      
      &:nth-of-type(even) {
        @media (min-width: $bp-bart) {
          background-color: rgba(94,93,82,.1);
        }
      }
    }
    
    th[scope="row"] {
      background-color: rgba(29,150,178,1);
      color: white;
      
      @media (min-width: $bp-lisa) {
        border-left: 1px solid  rgba(29,150,178,1);
        border-bottom: 1px solid  rgba(29,150,178,1);
      }
      
      @media (min-width: $bp-bart) {
        background-color: transparent;
        color: rgba(94,93,82,1);
        text-align: left;
      }
    }
    
    td {
      text-align: right;
      
      @media (min-width: $bp-bart) {
        border-left: 1px solid  rgba(29,150,178,1);
        border-bottom: 1px solid  rgba(29,150,178,1);
        text-align: center; 
      }
      
      &:last-of-type {
        @media (min-width: $bp-bart) {
          border-right: 1px solid  rgba(29,150,178,1);
        } 
      }
    }
    
    td[data-type=currency] {
      text-align: right; 
    }
    
    td[data-title]:before {
      content: attr(data-title);
      float: left;
      font-size: .8em;
      color: rgba(94,93,82,.75);
      
      @media (min-width: $bp-lisa) {
        font-size: .9em; 
      }
      
      @media (min-width: $bp-bart) {
        // Don’t show data-title labels 
        content: none; 
      }
    } 
  }
}
.grey {
  background-color: rgba(128,128,128,.25);
}
.red {
  background-color: rgba(255,0,0,.25);
}
.blue {
  background-color: rgba(0,0,255,.25);
}
</style>
       
   	  
		
			<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">TODAYS DIAGNOSIS REPORT   </h4>
						<?php 
						$day=date('d');						  
				       $year=date('y');
			            $month=date('m');       
			            if($month==1){ $mont='January'; $days=31;}
			        	elseif($month==2){ $mont='February'; $days=28;}
				        elseif($month==3){ $mont='March'; $days=31;}
				      elseif($month==4){  $mont='April'; $days=30;}
			             elseif($month==5){ $mont='May'; $days=31;}
				       elseif($month==6){ $mont='June'; $days=30;}				
				      elseif($month==7){ $mont='July'; $days=31;}
				       elseif($month==8){ $mont='August'; $days=31;}
				       elseif($month==9){$mont='September'; $days=30;}
				       elseif($month==10){$mont='October'; $days=31;}
				      elseif($month==11){$mont='November'; $days=30;}
				        if($month==12 ){ $mont='December'; $days=31;}		                                       
        
						$dateb=date('y-m-d');
						?>
					<a  href="#" style="font-size: 24px;margin-bottom:10px" class="btn btn-info"><i class='fa fa-calendar'></i>&nbsp;<?php echo$day.'-'.$mont.'-'.$year; ?></a>

					     			     
<form  method="post" action="zone.php" >
  <!-- progressbar -->
  
  <!-- fieldsets -->
  <fieldset>
  	<div id="printableArea">
    <table class="table table-bordered table-hover">
	
   
        <tbody>
            
            
            
         
              <tr class="success" style="font-weight: bold">
              	 <td>No</td>
                <td >Patient</td>
                <td >Diagnosis</td>  
                <td >Drug</td>                 
                <td >Type</td>                 
                 <td>Amount</td>
                <td >Times</td>
                <td >Days</td> 
                <td >Quantity</td>                                                          
                <td >Officer</td>
                 
                
                         </tr>
                        
              
               	<?php 
               	$date=date('y-m-d');
               	
            				           $sqluser ="SELECT * FROM tbl_transactions WHERE Date='$date' ";
                                     $retrieve = mysqli_query($db,$sqluser);
									 if( mysqli_num_rows($retrieve) != 0)                         
                                     {                         $count=0;
									             while($found = mysqli_fetch_array($retrieve))
	                                                {
                                                        $date = $found['Date']; $id=$found['Patientid'];	
														  $time=$found['Time']; $drug=$found['Drugname'];
														$quantity=$found['Quantity'];$dayss=$found['Days'];
														$amo=$found['Amount'];
					                                    if($dateb==$date)
					                                    {               $count=$count+1;
					                                 	      $sql ="SELECT * FROM tbl_petients WHERE id='$id' ";
                                                              $retr = mysqli_query($db,$sql);
                                                              while($found = mysqli_fetch_array($retr))
	                                                          {
                                                                      $firstname = $found['Firstname'];
		                                                               $sirname= $found['Sirname'];
																	   $title= $found['Mtitle'];
															           $tname=$title.' '.$firstname.' '.$sirname;
													          } 
					                                          $sqld ="SELECT * FROM tbl_treatment WHERE Patientid='$id' && Date='$date'";
                                                               $retrievesd = mysqli_query($db,$sqld);
									                            $numd=mysqli_num_rows($retrievesd);
									                           if($numd!=0){
                                                                                while($found = mysqli_fetch_array($retrievesd))
	                                                                           {                                 	                    
									                                               $officer=$found['Officer'];$tid=$found['Resultsid'];
									                                               $comment=$found['Prescribe_Comment'];	
														                           $timesper=$found['Timesperday'];$after='';$evening='';
																				   
																				   $sqlc ="SELECT * FROM tbl_laboratory WHERE Patientid='$id' && id='$tid' && Date='$date' ";
                                                                                     $retrievesc = mysqli_query($db,$sqlc);
									                                                 $numc=mysqli_num_rows($retrievesc);
									                                               if($numc!=0){
                                                                                                   while($found = mysqli_fetch_array($retrievesc))
	                                                                                              {
													                                                 $suffer=$found['Diseased'];
									                                                              }
											                                                   }
																			    }
															                }
															   $sqluser2 ="SELECT * FROM tbl_drugs WHERE Name='$drug' ";
                                                              $retrieved2 = mysqli_query($db,$sqluser2);
                                                              while($found = mysqli_fetch_array($retrieved2))
	                                                          {
                                                                 $type=$found['Medstype'];	$strenth=$found['Strength'];
																 		 													   		                                                          
													          }	  
									  
									  
														echo" <tr class='warning'>
									                          <td >$count</td> 
									                          <td >$tname</td>
									                          <td >$suffer</td> 
										                      <td >$drug</td>										                      
										                      <td >$type</td>
										                      <td >$amo</td> 
										                      <td >$timesper</td> 
										                      <td >$dayss</td>
				                                              <td >$quantity</td>                                                                                                                                                                                    
                                                              <td >$officer</td>                
                                                                </tr> ";
														
														}
            				                           
														   
							                     }
 									} 		
																			              
			
		
				?>
              
               
                
                
                        
                         
         </tbody>
         
</table>  
</div> 
  </fieldset>

</form>

<a class='btn btn-default' onclick="printDiv('printableArea')"><span class='glyphicon glyphicon-print'></span> &nbsp;Print</a>

</div>

<br /><br />

</div>

				        </div>

			