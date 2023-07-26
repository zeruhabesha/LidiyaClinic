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
$id = $_GET['id'];
	
//$sqluser ="SELECT * FROM tbl_readings WHERE Patientid='$id' ORDER BY Time ASC " ;
        $count=0;
$sqluser ="SELECT * FROM tbl_readings WHERE Patientid='$id' ORDER BY id ASC " ;
$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {      $count=$count+1;
              $date = $found['Date'];
			  $pr = $found['PulseRate'];
		      $bt= $found['BodyT'];
			  $rr=$found['RespirationRate'];
			  $bp=$found['SystolicBP'];
			  $sybp=$found['DiastolicBP'];
			  $oxy=$found['Oxygensaturation'];
			
	      
              if($count==1){
			  	             $date1=$date;$bt1=$bt;$rr1=$rr;$bp1=$bp;$pr1=$pr;$sybp1=$sybp;$oxy1=$oxy;
				             $day1 = substr($date1,7,2); //this gives me the born year	
				             $mnth1= substr($date1,5,2); //this gives me the born month			   
		                     $year1 = substr($date1,0,4); //this gives me the born year			  
			               }
			  if($count==2){
			  	             $date2=$date;$bt2=$bt;$rr2=$rr;$bp2=$bp;$pr2=$pr;$sybp2=$sybp;$oxy2=$oxy;
				  		     $day2 = substr($date2,7,2); //this gives me the born year					  
				             $mnth2= substr($date2,5,2); //this gives me the born month			   
		                     $year2 = substr($date2,0,4); //this gives me the born year			  
			               
			               }
			  if($count==3){
			  	             $date3=$date;$bt3=$bt;$rr3=$rr;$bp3=$bp;$pr3=$pr;$sybp3=$sybp;$oxy3=$oxy;
				             $day3 = substr($date3,7,2); //this gives me the born year	
				             $mnth3= substr($date3,5,2); //this gives me the born month			   
		                     $year3 = substr($date3,0,4); //this gives me the born year			  
			               
			               }
			   if($count==4){
			  	             $date4=$date;$bt4=$bt;$rr4=$rr;$bp4=$bp;$pr4=$pr;$sybp4=$sybp;$oxy4=$oxy;
				             $day4 = substr($date4,7,2); //this gives me the born year							 
				             $mnth4= substr($date4,5,2); //this gives me the born month			   
		                     $year4 = substr($date4,0,4); //this gives me the born year			  
			               
			               }
			    if($count==5){
			  	             $date5=$date;$bt5=$bt;$rr5=$rr;$bp5=$bp;$pr5=$pr;$sybp5=$sybp;$oxy5=$oxy;
					         $day5 = substr($date5,7,2); //this gives me the born year							   
					        $mnth5= substr($date5,5,2); //this gives me the born month			   
		                     $year5 = substr($date5,0,4); //this gives me the born year			  
			               
			               }
               if($count==6){
			  	             $date6=$date;$bt6=$bt;$rr6=$rr;$bp6=$bp;$pr6=$pr;$sybp6=$sybp;$oxy6=$oxy;
				             $day6 = substr($date6,7,2); //this gives me the born year								 
				             $mnth6= substr($date6,5,2); //this gives me the born month			   
		                     $year6 = substr($date6,0,4); //this gives me the born year			  
			               
			               }
			   if($count==7){
			  	             $date7=$date;$bt7=$bt;$rr7=$rr;$bp7=$bp;$pr7=$pr;$sybp7=$sybp;$oxy7=$oxy;
				   		     $day7 = substr($date7,7,2); //this gives me the born year	
				            $mnth7= substr($date7,5,2); //this gives me the born month			   
		                     $year7 = substr($date7,0,4); //this gives me the born year			  
			               
			               }
			  if($count==8){
			  	             $date8=$date;$bt8=$bt;$rr8=$rr;$bp8=$bp;$pr8=$pr;$sybp8=$sybp;$oxy8=$oxy;
				             $day8 = substr($date8,7,2); //this gives me the born year						 
				            $mnth8= substr($date8,5,2); //this gives me the born month			   
		                     $year8 = substr($date8,0,4); //this gives me the born year			  
			               
			               }
			  if($count==9){
			  	             $date9=$date;$bt9=$bt;$rr9=$rr;$bp9=$bp;$pr9=$pr;$sybp9=$sybp;$oxy9=$oxy;
				  				$day9= substr($date9,7,2); //this gives me the born year					  
				              $mnth9= substr($date9,5,2); //this gives me the born month			   
		                     $year9 = substr($date9,0,4); //this gives me the born year			  
			               
			               }
			   if($count==10){
			  	             $date10=$date;$bt10=$bt;$rr10=$rr;$bp10=$bp;$pr10=$pr;$sybp10=$sybp;$oxy10=$oxy;
				              $day10 = substr($date10,7,2); //this gives me the born year							
				             $mnth10= substr($date10,5,2); //this gives me the born month			   
		                     $year10 = substr($date10,0,4); //this gives me the born year			  
			               
			               }
			    if($count==11){
			  	             $date11=$date;$bt11=$bt;$rr11=$rr;$bp11=$bp;$pr11=$pr;$sybp11=$sybp;$oxy11=$oxy;
					         $day11 = substr($date11,7,2); //this gives me the born year							 
					          $mnth11= substr($date11,5,2); //this gives me the born month			   
		                     $year11 = substr($date11,0,4); //this gives me the born year			  
			               
			               }
               
		 }

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Clinic</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
             
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
 <!-- //the links below are for pop up side bar menu plugin -->
    <link href="css/animate.min.css" rel="stylesheet"/>   
      <link rel="stylesheet" href="css/bootstrap-dropdownhover.css">


	   <script src="jquery.js"></script>    
	
<script type="text/javascript">
 $(document).on("click", ".open-Updatepicture", function () {
     var myTitle = $(this).data('id');
     $(".modal-body #bookId").val(myTitle);
     
}); 
 </script>
 <script type="text/javascript">
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Vital Signs Recordings",
					fontSize: 30
				},
				animationEnabled: true,
				axisX: {
					gridColor: "Silver",
					tickColor: "silver",
					valueFormatString: "DD/MMM"
				},
				toolTip: {
					shared: true
				},
				theme: "theme2",
				axisY: {
					gridColor: "Silver",
					tickColor: "silver"
				},
				legend: {
					verticalAlign: "center",
					horizontalAlign: "right"
				},
				data: [
				{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Oxygen Saturation",
					markerType: "square",
					color: "#228B22",
					toolTipContent: "<a style='color:#228B22'>{name}</a>:<strong>{y} %</strong>",
					dataPoints: [
					{ x: new Date(2019, 3, 3), y: <?php if(isset($oxy1)){echo$oxy1;}else{echo$oxy1=0;} ?> },
					{ x: new Date(2019, 3, 5), y: <?php if(isset($oxy2)){echo$oxy2;}else{echo$oxy2=0;} ?> },
					{ x: new Date(2019, 3, 7), y: <?php if(isset($oxy3)){echo$oxy3;}else{echo$oxy3=0;} ?> },
					{ x: new Date(2019, 3, 9), y: <?php if(isset($oxy4)){echo$oxy4;}else{echo$oxy4=0;} ?> },
					{ x: new Date(2019, 3, 11), y: <?php if(isset($oxy5)){echo$oxy5;}else{echo$oxy5=0;} ?> },
					{ x: new Date(2019, 3, 13), y: <?php if(isset($oxy6)){echo$oxy6;}else{echo$oxy6=0;} ?>  },
					{ x: new Date(2019, 3, 15), y: <?php if(isset($oxy7)){echo$oxy7;}else{echo$oxy7=0;} ?>  },
					{ x: new Date(2019, 3, 17), y: <?php if(isset($oxy8)){echo$oxy8;}else{echo$oxy8=0;} ?>  },
					{ x: new Date(2019, 3, 19), y: <?php if(isset($oxy9)){echo$oxy9;}else{echo$oxy9=0;} ?>  },
					{ x: new Date(2019, 3, 21), y: <?php if(isset($oxy10)){echo$oxy10;}else{echo$oxy10=0;} ?>  },
					{ x: new Date(2019, 3, 23), y: <?php if(isset($oxy11)){echo$oxy11;}else{echo$oxy11=0;} ?>  }
					]
				},
				{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Body Temperature",
					markerType: "square",
					color: "#363636",
					toolTipContent: "<a style='color:#363636'>{name}</a>:<strong>{y} oC</strong>",
					dataPoints: [
					{ x: new Date(2019, 3, 3), y: <?php if(isset($bt1)){echo$bt1;}else{echo$bt1=0;} ?> },
					{ x: new Date(2019, 3, 5), y: <?php if(isset($bt2)){echo$bt2;}else{echo$bt2=0;} ?> },
					{ x: new Date(2019, 3, 7), y: <?php if(isset($bt3)){echo$bt3;}else{echo$bt3=0;} ?> },
					{ x: new Date(2019, 3, 9), y: <?php if(isset($bt4)){echo$bt4;}else{echo$bt4=0;} ?> },
					{ x: new Date(2019, 3, 11), y: <?php if(isset($bt5)){echo$bt5;}else{echo$bt5=0;} ?> },
					{ x: new Date(2019, 3, 13), y: <?php if(isset($bt6)){echo$bt6;}else{echo$bt6=0;} ?>  },
					{ x: new Date(2019, 3, 15), y: <?php if(isset($bt7)){echo$bt7;}else{echo$bt7=0;} ?>  },
					{ x: new Date(2019, 3, 17), y: <?php if(isset($bt8)){echo$bt8;}else{echo$bt8=0;} ?>  },
					{ x: new Date(2019, 3, 19), y: <?php if(isset($bt9)){echo$bt9;}else{echo$bt9=0;} ?>  },
					{ x: new Date(2019, 3, 21), y: <?php if(isset($bt10)){echo$bt10;}else{echo$bt10=0;} ?>  },
					{ x: new Date(2019, 3, 23), y: <?php if(isset($bt11)){echo$bt11;}else{echo$bt11=0;} ?>  }
					]
				},
					{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Systolic BP",				
					markerType: "square",
					color: "#FF0000",
					toolTipContent: "<a style='color:#FF0000'>{name}</a>:<strong>{y} mmHg</strong>",

					dataPoints: [
					{ x: new Date(2019, 3, 3), y: <?php if(isset($bp1)){echo$bp1;}else{echo$bp1=0;} ?>},
					{ x: new Date(2019, 3, 5), y: <?php if(isset($bp2)){echo$bp2;}else{echo$bp2=0;} ?>},
					{ x: new Date(2019, 3, 7), y: <?php if(isset($bp3)){echo$bp3;}else{echo$bp3=0;} ?> },
					{ x: new Date(2019, 3, 9), y: <?php if(isset($bp4)){echo$bp4;}else{echo$bp4=0;} ?> },
					{ x: new Date(2019, 3, 11), y: <?php if(isset($bp5)){echo$bp5;}else{echo$bp5=0;} ?> },
					{ x: new Date(2019, 3, 13), y:  <?php if(isset($bp6)){echo$bp6;}else{echo$bp6=0;} ?>},
					{ x: new Date(2019, 3, 15), y: <?php if(isset($bp7)){echo$bp7;}else{echo$bp7=0;} ?>},
					{ x: new Date(2019, 3, 17), y:  <?php if(isset($bp8)){echo$bp8;}else{echo$bp8=0;} ?>  },
					{ x: new Date(2019, 3, 19), y: <?php if(isset($bp9)){echo$bp9;}else{echo$bp9=0;} ?>},
					{ x: new Date(2019, 3, 21), y: <?php if(isset($bp10)){echo$bp10;}else{echo$bp10=0;} ?> },
					{ x: new Date(2019, 3, 23), y: <?php if(isset($bp11)){echo$bp11;}else{echo$bp11=0;} ?> }
					
					
				]
				},{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Diastolic BP",
					markerType: "square",
					color: "#FF0000",
					toolTipContent: "<a style='color:#FF0000'>{name}</a>:<strong>{y} mmHg</strong>",

					dataPoints: [
					{ x: new Date(2019, 3, 3), y: <?php if(isset($sybp1)){echo$sybp1;}else{echo$sybp1=0;} ?>},
					{ x: new Date(2019, 3, 5), y: <?php if(isset($sybp2)){echo$sybp2;}else{echo$sybp2=0;} ?>},
					{ x: new Date(2019, 3, 7), y: <?php if(isset($sybp3)){echo$sybp3;}else{echo$sybp3=0;} ?> },
					{ x: new Date(2019, 3, 9), y: <?php if(isset($sybp4)){echo$sybp4;}else{echo$sybp4=0;} ?> },
					{ x: new Date(2019, 3, 11), y: <?php if(isset($sybp5)){echo$sybp5;}else{echo$sybp5=0;} ?> },
					{ x: new Date(2019, 3, 13), y:  <?php if(isset($sybp6)){echo$sybp6;}else{echo$sybp6=0;} ?>},
					{ x: new Date(2019, 3, 15), y: <?php if(isset($sybp7)){echo$sybp7;}else{echo$sybp7=0;} ?>},
					{ x: new Date(2019, 3, 17), y:  <?php if(isset($sybp8)){echo$sybp8;}else{echo$sybp8=0;} ?>  },
					{ x: new Date(2019, 3, 19), y: <?php if(isset($sybp9)){echo$sybp9;}else{echo$sybp9=0;} ?>},
					{ x: new Date(2019, 3, 21), y: <?php if(isset($sybp10)){echo$sybp10;}else{echo$sybp10=0;} ?> },
					{ x: new Date(2019, 3, 23), y: <?php if(isset($sybp11)){echo$sybp11;}else{echo$sybp11=0;} ?> }
					
					
				]
				},
					{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Pulse Rate",
					markerType: "square",
					color: "#87CEFA",
					toolTipContent: "<a style='color:#87CEFA'>{name}</a>:<strong>{y} bpm</strong>",

					dataPoints: [
					{ x: new Date(2019, 3, 3), y: <?php if(isset($pr1)){echo$pr1;}else{echo$pr1=0;} ?>},
					{ x: new Date(2019, 3, 5), y: <?php if(isset($pr2)){echo$pr2;}else{echo$pr2=0;} ?> },
					{ x: new Date(2019, 3, 7), y: <?php if(isset($pr3)){echo$pr3;}else{echo$pr3=0;} ?> },
					{ x: new Date(2019, 3, 9), y: <?php if(isset($pr4)){echo$pr4;}else{echo$pr4=0;} ?> },
					{ x: new Date(2019, 3, 11), y: <?php if(isset($pr5)){echo$pr5;}else{echo$pr5=0;} ?> },
					{ x: new Date(2019, 3, 13), y: <?php if(isset($pr6)){echo$pr6;}else{echo$pr6=0;} ?> },
					{ x: new Date(2019, 3, 15), y: <?php if(isset($pr7)){echo$pr7;}else{echo$pr7=0;} ?> },
					{ x: new Date(2019, 3, 17), y: <?php if(isset($pr8)){echo$pr8;}else{echo$pr8=0;} ?> },
					{ x: new Date(2019, 3, 19), y: <?php if(isset($pr9)){echo$pr9;}else{echo$pr9=0;} ?> },
					{ x: new Date(2019, 3, 21), y: <?php if(isset($pr10)){echo$pr10;}else{echo$pr10=0;} ?> },
					{ x: new Date(2019, 3, 23), y: <?php if(isset($pr11)){echo$pr11;}else{echo$pr11=0;} ?> }
				]
				},
				{
					type: "line",
					showInLegend: true,
					name: "Respiratory Rate",
					color: "#FF9800",
					lineThickness: 2,
					toolTipContent: "<a style='color:#FF9800'>{name}</a>:<strong>{y} breaths/minute</strong>",
					dataPoints: [
					{ x: new Date(2019, 3, 3), y: <?php if(isset($rr1)){echo$rr1;}else{echo$rr1=0;} ?>},
					{ x: new Date(2019, 3, 5), y: <?php if(isset($rr2)){echo$rr2;}else{echo$rr2=0;} ?> },
					{ x: new Date(2019, 3, 7), y: <?php if(isset($rr3)){echo$rr3;}else{echo$rr3=0;} ?> },
					{ x: new Date(2019, 3, 9), y: <?php if(isset($rr4)){echo$rr4;}else{echo$rr4=0;} ?> },
					{ x: new Date(2019, 3, 11), y: <?php if(isset($rr5)){echo$rr5;}else{echo$rr5=0;} ?> },
					{ x: new Date(2019, 3, 13), y: <?php if(isset($rr6)){echo$rr6;}else{echo$rr6=0;} ?> },
					{ x: new Date(2019, 3, 15), y: <?php if(isset($rr7)){echo$rr7;}else{echo$rr7=0;} ?> },
					{ x: new Date(2019, 3, 17), y: <?php if(isset($rr8)){echo$rr8;}else{echo$rr8=0;} ?> },
					{ x: new Date(2019, 3, 19), y: <?php if(isset($rr9)){echo$rr9;}else{echo$rr9=0;} ?> },
					{ x: new Date(2019, 3, 21), y: <?php if(isset($rr10)){echo$rr10;}else{echo$rr10=0;} ?> },
					{ x: new Date(2019, 3, 23), y: <?php if(isset($rr11)){echo$rr11;}else{echo$rr11=0;} ?> }
					]
				}
				],
				legend: {
					cursor: "pointer",
					itemclick: function (e) {
						if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
							e.dataSeries.visible = false;
						}
						else {
							e.dataSeries.visible = true;
						}
						chart.render();
					}
				}
			});

			chart.render();
		}
		
		
		
		Swal.fire({
  title: 'Do you have a bike?',
  input: 'checkbox',
  inputPlaceholder: 'I have a bike'
}).then(function(result) {
  if (result.value) {
    Swal.fire({type: 'success', text: 'You have a bike!'});

  } else if (result.value === 0) {
    Swal.fire({type: 'error', text: "You don't have a bike :("});

  } else {
    console.log(`modal was dismissed by ${result.dismiss}`)
  }
})
	</script>
	<script src="script/canvasjs.min.js"></script>
</head> 



<div id="Updatepicture" class="modal fade" role="dialog">
  <div class="modal-dialog" style="float:right;width:20%">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">        	        	
        	</h4>
      </div>
      <div class="modal-body" >
        <center><p></p>
        	<form method="post" action="upload.php" enctype='multipart/form-data'>        		
            
        	<p style="margin-bottom:10px;">
        			Select picture<input name='file2' type='file' id='file2' >
           </p>  
           <p>
        	<input name='id' type='hidden' value='' id='bookId'>
        	<input name='category' type='hidden' value='User'>

           </p>     	      		
	                
        </center>
      </div>
      <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Change" id="btns1" name="Change"> &nbsp;
                  
      </div>
      </div>
       </form>
  </div>
  </div>

<body >
	
	<div class="main-content">
	
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section">
			<div class="header-left">
				<!--toggle button start-->
				<a href="administrator.php?pat=3"><button id="showLeftPush" ><i class="fa fa-home"></i></button></a>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
						<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				<div class="search-box" >
					
				</div><!--//end-search-box-->
				
				<div class="profile_details" >		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img">
								       <img src='admin/images/profile.png' height='50px' width='50px' alt=''>
										 </span> 
									<div class="user-name" >
										<p style="color:#1D809F;"><?php if(isset($sirname))
                                            {echo"<strong>".$firstname." ".$sirname."! </strong>";} ?>
				                         </p>
										<span><?php if(isset($sirname)){echo$role;} ?> &nbsp;<img src='admin/images/dot.png' height='15px' width='15px' alt=''>
										</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								 <li>
                                  <a data-toggle='modal' data-id='<?php echo$id; ?>' href='#Updatepicture' class='open-Updatepicture'><i class="fa fa-user"></i>Change profile picture</a>
                                 </li>
								<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper"  >
			<div class="main-page" >
	
			<!--<div class="charts">
											
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">Patient Progress</h4>
					<!-- start content_slider 
				         <div id="chartContainer" style="height: 400px; width: 100%;">
	                         </div>
                           
				        </div>
				        
		
				</div>
				

					<!--//sreen-gallery-cursual
			</div>---->
			<div class='charts'>
					<div class='col-md-4 charts-grids widget' style='height:100%' >
						<div class='card-header'>
							<h3>RECORDING TIMEFRAME</h3>
						</div>
						<div class='row-one widgettable'>
			
					<table class="table table-bordered table-hover" style='width:100%'>
        <thead>
            <tr class='warning'>
                <th>No</th>
                <th>SBP</th>
                <th>RR</th>
                <th>PR</th>
                <th>BT</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	   $sqlmembe =" SELECT * FROM tbl_readings WHERE Patientid='$id'  ";
			       $retriev = mysqli_query($db,$sqlmembe);
				                $count=0;
                     while($found = mysqli_fetch_array($retriev))
	                 {     $count=$count+1;
                          $time=$found['Time'];
					     $date = $found['Date'];
			              $pr = $found['PulseRate'];
		                  $bt= $found['BodyT'];
			              $rr=$found['RespirationRate'];
			              $bp=$found['SystolicBP'];
			                 echo"
                             <tr> 
                             <td> $count</td>
			                 <td>$bp</td>
			                 <td>$rr</td>	
			                 <td>$pr</td>
			                 <td>$bt</td>
			                 <td>$date</td>
			                 <td>$time</td>
			                 
			                 </tr>
			                     "; 
					           
					 } 
		
		           	  ?>    

        </tbody>
        
    </table>
						 				         
				
		                </div>
								
					</div>
					
					<div class='col-md-4 charts-grids widget states-mdl'>
						
						<div class='middle-content'>
						<h4 class='title'>Patient Progress</h4>
					
					     <div id="chartContainer" style="height: 400px; width: 100%;">
</div>

			

				        </div>
					
					</div>
			
					
				</div>
		 </div>
		</div>
	<!--footer-->
	
    <!--//footer-->
	</div>
		
		
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src='admin/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
		<!-- //for index page weekly sales java script -->
		
<!-- // the two links below are for date picker calendar -->
   <script type="text/javascript" src="js/zebra_datepicker.min.js"></script>        
        <script type="text/javascript" src="js/examples.js"></script>
<!-- //the link below used for form slidng on click -->

	
	 <!-- Bootstrap Core JavaScript -->
    <script src="admin/js/bootstrap.js"> </script>
	  <!-- //Bootstrap Core JavaScript -->
	 
</body>
</html>