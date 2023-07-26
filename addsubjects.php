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
			  $bp=$found['BloodPressure'];
			
	      
              if($count==1){
			  	             $date1=$date;$bt1=$bt;$rr1=$rr;$bp1=$bp;$pr1=$pr;
				             
			               }
			  if($count==2){
			  	             $date2=$date;$bt2=$bt;$rr2=$rr;$bp2=$bp;$pr2=$pr;
			               }
			  if($count==3){
			  	             $date3=$date;$bt3=$bt;$rr3=$rr;$bp3=$bp;$pr3=$pr;
			               }
			   if($count==4){
			  	             $date4=$date;$bt4=$bt;$rr4=$rr;$bp4=$bp;$pr4=$pr;
			               }
			    if($count==5){
			  	             $date5=$date;$bt5=$bt;$rr5=$rr;$bp5=$bp;$pr5=$pr;
			               }
               if($count==6){
			  	             $date6=$date;$bt6=$bt;$rr6=$rr;$bp6=$bp;$pr6=$pr;
			               }
			   if($count==7){
			  	             $date7=$date;$bt7=$bt;$rr7=$rr;$bp7=$bp;$pr7=$pr;
			               }
			  if($count==8){
			  	             $date8=$date;$bt8=$bt;$rr8=$rr;$bp8=$bp;$pr8=$pr;
			               }
			  if($count==9){
			  	             $date9=$date;$bt9=$bt;$rr9=$rr;$bp9=$bp;$pr9=$pr;
			               }
			   if($count==10){
			  	             $date10=$date;$bt10=$bt;$rr10=$rr;$bp10=$bp;$pr10=$pr;
			               }
			    if($count==11){
			  	             $date11=$date;$bt11=$bt;$rr11=$rr;$bp11=$bp;$pr11=$pr;
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
					name: "Body Temperature",
					markerType: "square",
					color: "#363636",
					dataPoints: [
					{  <?php if(isset($bt1)){echo"x: new Date(2019, 4, 3), y:$bt1";} ?> },
					{  <?php if(isset($bt2)){echo"x: new Date(2019, 4, 5), y:$bt2";} ?> },
					{  <?php if(isset($bt3)){echo"x: new Date(2019, 4, 7), y:$bt3";} ?> },
					{  <?php if(isset($bt4)){echo"x: new Date(2019, 4, 9), y:$bt4";} ?> },
					{  <?php if(isset($bt5)){echo"x: new Date(2019, 4, 11), y:$bt5";} ?> },
					{ <?php if(isset($bt6)){echo"x: new Date(2019, 4, 13), y:$bt6";} ?>  },
					{  <?php if(isset($bt7)){echo"x: new Date(2019, 4, 15), y:$bt7";} ?>  },
					{  <?php if(isset($bt8)){echo"x: new Date(2019, 4, 17), y:$bt8";} ?>  },
					{  <?php if(isset($bt9)){echo"x: new Date(2019, 4, 19), y:$bt9";} ?>  },
					{  <?php if(isset($bt10)){echo"x: new Date(2019, 4, 21), y:$bt10";} ?>  },
					{  <?php if(isset($bt11)){echo"x: new Date(2019, 4, 23), y:$bt11";} ?>  }
					]
				},
					{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Blood Pressure",
					markerType: "square",
					color: "#4169E1",
					dataPoints: [
					{  <?php if(isset($bp1)){echo"x: new Date(2019, 4, 3), y:$bp1";} ?>},
					{  <?php if(isset($bp2)){echo"x: new Date(2019, 4, 5), y:$bp2";} ?>},
					{  <?php if(isset($bp3)){echo"x: new Date(2019, 4, 7), y:$bp3";} ?> },
					{  <?php if(isset($bp4)){echo"x: new Date(2019, 4, 9), y:$bp4";} ?> },
					{  <?php if(isset($bp5)){echo"x: new Date(2019, 4, 11), y:$bp5";} ?> },
					{   <?php if(isset($bp6)){echo"x: new Date(2019, 4, 13), y:$bp6";} ?>},
					{  <?php if(isset($bp7)){echo"x: new Date(2019, 4, 15), y:$bp7";} ?>},
					{   <?php if(isset($bp8)){echo"x: new Date(2019, 4, 17), y:$bp8";} ?>  },
					{  <?php if(isset($bp9)){echo"x: new Date(2019, 4, 19), y:$bp9";} ?>},
					{  <?php if(isset($bp10)){echo"x: new Date(2019, 4, 21), y:$bp10";} ?> },
					{  <?php if(isset($bp11)){echo"x: new Date(2019, 4, 23), y:$bp11";} ?> }
					
					
				]
				},
					{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Pulse Rate",
					markerType: "square",
					color: "#87CEFA",
					dataPoints: [
					{  <?php if(isset($pr1)){echo"x: new Date(2019, 4, 3), y:$pr1";} ?>},
					{ <?php if(isset($pr2)){echo"x: new Date(2019, 4, 5), y:$pr2";} ?> },
					{  <?php if(isset($pr3)){echo"x: new Date(2019, 4, 7), y:$pr3";} ?> },
					{  <?php if(isset($pr4)){echo"x: new Date(2019, 4, 9), y:$pr4";} ?> },
					{  <?php if(isset($pr5)){echo"x: new Date(2019, 4, 11), y:$pr5";} ?>},
					{  <?php if(isset($pr6)){echo"x: new Date(2019, 4, 13), y:$pr6";} ?> },
					{  <?php if(isset($pr7)){echo"x: new Date(2019, 4, 15), y:$pr7";} ?> },
					{ <?php if(isset($pr8)){echo"x: new Date(2019, 4, 17), y:$pr8";} ?>},
					{  <?php if(isset($pr9)){echo"x: new Date(2019, 4, 19), y:$pr9";} ?> },
					{  <?php if(isset($pr10)){echo"x: new Date(2019, 4, 21), y:$pr10";} ?> },
					{  <?php if(isset($pr11)){echo"x: new Date(2019, 4, 23), y:$pr11";} ?> }
					]
				},
				{
					type: "line",
					showInLegend: true,
					name: "Respiration Rate",
					color: "#FF9800",
					lineThickness: 2,

					dataPoints: [
					{ <?php if(isset($rr1)){echo"x: new Date(2019, 4, 3), y:$rr1";} ?>},
					{  <?php if(isset($rr2)){echo"x: new Date(2019, 4, 5), y:$rr2";} ?> },
					{  <?php if(isset($rr3)){echo"x: new Date(2019, 4, 7), y:$rr3";} ?> },
					{  <?php if(isset($rr4)){echo"x: new Date(2019, 4, 9), y:$rr4";} ?> },
					{  <?php if(isset($rr5)){echo"x: new Date(2019, 4, 11), y:$rr5";} ?> },
					{  <?php if(isset($rr6)){echo"x: new Date(2019, 4, 13), y:$rr6";} ?> },
					{  <?php if(isset($rr7)){echo"x: new Date(2019, 4, 15), y:$rr7";} ?> },
					{  <?php if(isset($rr8)){echo"x: new Date(2019, 4, 17), y:$rr8";} ?> },
					{  <?php if(isset($rr9)){echo"x: new Date(2019, 4, 19), y:$rr9";} ?> },
					{  <?php if(isset($rr10)){echo"x: new Date(2019, 4, 21), y:$rr10";} ?> },
					{  <?php if(isset($rr11)){echo"x: new Date(2019, 4, 23), y:$rr11";} ?> }
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
                                            {echo"<strong>".$firstname." ".$sirname." </strong>";} ?>
                                            <img src='admin/images/dot.png' height='15px' width='15px' alt=''>
				                         </p>
										<span>Manager</span>
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
					<div class='col-md-4 charts-grids widget' style='height: 400px' >
						<div class='card-header'>
							<h3>RECORDING TIMEFRAME</h3>
						</div>
						<div class='row-one widgettable'>
			
					<table class="table table-bordered table-hover" style='width:100%'>
        <thead>
            <tr class='warning'>
                <th>No</th>
                <th>BP</th>
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
			              $bp=$found['BloodPressure'];
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
	<div class="footer">
	   <p>  <a href="#" target="">Design and Developed by mvumapatrick@gmail.com</a></p>		
	</div>
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