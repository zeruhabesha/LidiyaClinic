<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['class'])&&$_COOKIE['useremail']){
	
	$class=$_COOKIE['class'];
$useremail=$_COOKIE['useremail'];

$sqluser ="SELECT * FROM tbl_teachers WHERE Email='$useremail'";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
			  $institution = $found['School'];				 
			  	   $id= $found['id'];   
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
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>      

   
   <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
   <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js'></script>
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
   	  
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
	
<script type="text/javascript">
 $(document).on("click", ".open-Updatepicture", function () {
     var myTitle = $(this).data('id');
     $(".modal-body #bookId").val(myTitle);
     
}); 
 </script>
 
	<!-- requried-jsfiles-for owl -->
					<link href="admin/css/owl.carousel.css" rel="stylesheet">
					<script src="admin/js/owl.carousel.js"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
					<!-- //requried-jsfiles-for owl -->
</head> 
<script type="text/javascript"> 
 $(document).on("click",".open-Approved",function(){
 	var myApproved=$(this).data('id');
 	  
               $.ajax({
                url: "upload.php", //php file which recive the new value and save it to the database
                data: { "Approvedstudies": myApproved },  //send the new value
               dataType:'json',
                method: "POST",
                success : function(response){
                $("#login_buttonz").html(response.Value);
                 //$("#total").html(response.Value2); 
	                	    }          
                  });  	
 });
</script>
<script type="text/javascript">


 $(document).on("click", ".open-Others", function () { //user clicks on button
               			$(".open-Others").html("Yes we can");

          });
//Ajax load function

</script>

 
<?php if(isset($_SESSION['reports'])) {?>
<script type="text/javascript"> 

$(document).ready(function(){ 
                           var myValue = "Load";
                                        swal({
                                         title: "successfully",
                                         text: "Students Attendance saved",
                                         type: "success",
                                         showCancelButton: false,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                           location.reload();
                                                     } 
                                           
                                         });
                                         
                                                    });
       
                    </script>
      <?php  session_destroy(); }?>
      
  <script type="text/javascript">
 $(document).on("click", ".Open-Taxreceipt", function () {

        				$(".modal-body #Taxreceipt").html('<img src="ajax-loader.gif" /> &nbsp;LOADING PLEASE WAIT ...');
					setTimeout(' window.location.href = "tax_receipts.php"; ',3000);
		
}); 
 $(document).on("click", ".Open-Enumeration", function () {

        				$(".modal-body #Enumeration").html('<img src="ajax-loader.gif" /> &nbsp;REDIRECTING PLEASE WAIT ...');
					setTimeout(' window.location.href = "update_payer.php"; ',3000);
		
});  


 $(document).on("click", ".Open-groups", function () {

        				$(".modal-body #groupss").html('<img src="ajax-loader.gif" /> &nbsp;REDIRECTING PLEASE WAIT ...');
					setTimeout(' window.location.href = "groups_.php"; ',3000);
		
});   
 </script>
 
 
 

 
<body >
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
						<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				
				
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper"  >
		
			<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">CLASS ATTENDANCE REGISTER</h4>
                            <div class="alert alert-warning">
                             <i class="fa fa-info"></i>&nbsp;Check the box if the student is present and leave it blank if the studen is absent
                         </div>
					     
	<form method="post" action="register.php" enctype='multipart/form-data'> 
		<div class="input-group" style="margin-bottom:10px; margin-top:15px;width:20%;">
    <span class="input-group-addon">Select Date</span>
   <input type="date" placeholder="" name="attendancedate" class="form-control" value="" >
   </div>				     	
<table class="table table-bordered table-striped table-hover">
	<colgroup>
	
  </colgroup>
  <thead>
  <tr class="success">
  	<th>Number</th>
  	 <th>Student Name</th>
     <th>Present</th>          
  </tr>
  </thead>  
  <tbody>
<?php  	

$query = "SELECT * FROM tbl_students WHERE School='$institution' && Standard='$class' ";
                      $result =mysqli_query($db,$query) or die('Error, query failed');
                        if( mysqli_num_rows($result) != 0)                         
                         {                 $count=0; $turns=0;
                         	while($found = mysqli_fetch_array($result))
                         	{
                         		   $count=$count+1; 
                         		    $fnsme= $found['Firstname'];
                         		    $sname= $found['Sirname'];
									 $id= $found['id'];
                         		  echo" <tr>
                         		  <td>$count</td>
                                       <td>$fnsme $sname</td>";
									                     									
		                                   echo"<td><input type='checkbox' name='$id' value='$id' ></td>";
													
								           
												  												   
								      }				
								
								          echo"</tr>";
					        }
					      
					        ?>
      	
  </tbody>
</table>
<button type="submit" class="btn btn-success" name="appattendance" value="login_button">
			<span class="glyphicon glyphicon-floppy-disk" style="color: white"></span> &nbsp;Save
			</button> </form>
</div><br /><br />

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
	
	<!-- // the two links below are for date picker calendar -->
   <script type="text/javascript" src="js/zebra_datepicker.min.js"></script>        
        <script type="text/javascript" src="js/examples.js"></script>

			
	<!-- Bootstrap Core JavaScript -->
   <script src="admin/js/bootstrap.js"> </script>
	 <!-- //Bootstrap Core JavaScript -->
	 
	 	<script src="css/bootstrap-dropdownhover.js"></script>
	
  	
 </body>
</html>