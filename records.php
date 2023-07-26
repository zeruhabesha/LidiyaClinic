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
<title>CLINIC || SYSTEM</title>
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
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
         }
     </script>

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

#element1 {display:inline-block;margin-right:10px;  } 
#element2 {display:inline-block;} 


</style>
       
   	  
		
			<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">BALANCE BY SCHEMES</h4>
						
<div class='input-group' style='margin-bottom:10px;' >

<div class='input-group' style='margin-bottom:10px;' >
          <span class='input-group-addon' style="height:-30%">Filter Scheme</span>
   <select  name='medstype2'  id='schemefilter2' class="schemefilter2" style='height:30px; width: 100%' >
   	                               <option>Medi Health</option>   	                               
            				       <option>MASM</option>
            				       <option>Liberty Health Care</option>
            				      <option>Blue Health Care</option>            				        
            				     <option>Pacific Prime</option>        				                                        
            				        <option>ALL</option>                     
				                      
				                 </select>

  </div>
</div>					     			     
<form  method="post" action="zone.php" >
  <!-- progressbar -->
  
  <!-- fieldsets -->
  <fieldset>
  	 <div id="printableArea">

    <table class="table table-bordered table-hover">
	
   
        <tbody>
            
            
            
         
              <tr class="warning" style="font-weight: bold">
              	 <td>No</td>
                <td >Patient</td>
                <td >Age</td>                
                <td >Gender</td>
                <td >Scheme</td>
                <td >IDno</td>
                <td >Status</td> 
                <td >Bill</td>             
                
              </tr>
                        
              
               	 <?php   
               	                  $schecost=0;
               	 $sqlmember ="SELECT * FROM tbl_petients  ORDER BY id DESC ";
			       $retrieve = mysqli_query($db,$sqlmember);				                   
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];                      
                       $id=$found['id']; $dob=$found['DOB'];
			                   $gender=$found['Gender'];
			              $names= $title.' '.$firstname." ".$sirname;
					  
					 $year=date('y');
			                 $month=date('m');       //todays month
			                 $todayyear='20'.$year;   //this give me todays year
			              
			                 $bornmnth= substr($dob,5,2); //this gives me the born month			   
		                     $bornyear = substr($dob,0,4); //this gives me the born year			  
			               if($month>=$bornmnth)
			                 {			  	
			  	                $age=$todayyear-$bornyear;
			                 }
			             else{
			  	 				 $aged=$todayyear-$bornyear;
						   				  $age=$aged-1;
			                  }
			          				   $cost='';$drug='';$total=1500;  $count=0;
								   $sqld ="SELECT * FROM tbl_treatment WHERE Patientid='$id' && Progress='Notpaid' ";
                                      $retrievesd = mysqli_query($db,$sqld);
									   $numd=mysqli_num_rows($retrievesd);
									  if($numd!=0){
									  	                  $count=$count+1;     
                                                      while($found = mysqli_fetch_array($retrievesd))
	                                                 {
                                 	                    
									                      $drugname=$found['Drugid'];$quantinty=$found['Quantity'];
									                       $units=$found['Timesperday'];$comment=$found['Prescribe_Comment'];	
													          $officer=$found['Officer'];
														  $sqluser ="SELECT * FROM tbl_drugs WHERE Name='$drugname' ";
                                                              $retrieved = mysqli_query($db,$sqluser);
                                                              while($found = mysqli_fetch_array($retrieved))
	                                                          {
																   $morning=$found['Strength'];
																   $after=$found['Medstype'];
																   $price= $found['RetailPrice'];
															  }
															         $costtotal=0;
                                                             $sqldx ="SELECT * FROM tbl_transactions WHERE Patientid='$id' && Payment!='CASH'  ";
                                                                $retrievesdx = mysqli_query($db,$sqldx);
		                                                        $numdx=mysqli_num_rows($retrievesdx);
		                                                       if($numdx!=0){
		                                                       	             
                                                                                 while($foundz = mysqli_fetch_array($retrievesdx))
	                                                                            {
                                 	                                               $schemeid= $foundz['Scheme_id'];
																				   $payment= $foundz['Payment'];
																				   $cost= $foundz['Totalcost'];
																				   $costtotal=$costtotal+$cost;
																			     }
													                       }else{
													                         	   $costs=$quantinty*$price;
													                            }
													                     }         
                          echo"<tr>  
				             <td>$count</td>                                         
                             <td>$title $firstname $sirname</td>        	
                             <td>$age</td>
                             <td>$gender</td>
                              <td>$payment</td>
			                 <td>$schemeid</td>
			                 <td>
			                 Not paid
			                 </td>             
			                 <td>
                                 MK$costtotal			                	 
			                 </td>
			                	                 		 
                             </tr>
                             ";									             
       $schecost=$schecost+$costtotal;                    
       
}		        		 
					 } 
		echo"<tr><td colspan='6'></td><td><h3>Total Due</h3></td><td ><h3>MK$schecost</h3></td></tr>";
		           	?>
                         
         </tbody>
         
</table>   
  </fieldset>
   </div>

<a class='btn btn-default' onclick="printDiv('printableArea')"><span class='glyphicon glyphicon-print'></span> &nbsp;Print</a>

</form>


</div>

<br /><br />

</div>

				        </div>
					
			