<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['userid'])&&$_COOKIE['useremail']){
	
	$userid=$_COOKIE['userid'];
$useremail=$_COOKIE['useremail'];

$sqluser ="SELECT * FROM tbl_guardians WHERE Password='$userid' && Email='$useremail'";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $firstname = $found['Fullname'];
		      $sirname='Mvuma';
			  $institution ='Chigoneka';	
			  $emails = $found['Email'];
			  	   $idz= $found['id'];			  
          	   $role='Parent';	
			    $profile="";
				$username=$firstname.' '.$sirname;
   
  	    }
}else{
	 header('location:index.php');
      exit;
}
$id=$_POST['studentid'];

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='1' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdone=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdone=$stdone+$scored;	
													   $count=$count+1;							  
												       } 								  
                                                    $st1_1= round($stdone/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='1' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdtwo=0;$count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdtwo=$stdtwo+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st1_2= round($stdtwo/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='1' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdthree=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))
													 {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdthree=$stdthree+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st1_3= round($stdthree/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='2' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdone=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdone=$stdone+$scored;	
													   $count=$count+1;							  
												       } 								  
                                                    $st2_1= round($stdone/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='2' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdtwo=0;$count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdtwo=$stdtwo+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st2_2= round($stdtwo/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='2' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdthree=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))
													 {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdthree=$stdthree+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st2_3= round($stdthree/$count);
												}                                                              


$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='3' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdone=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdone=$stdone+$scored;	
													   $count=$count+1;							  
												       } 								  
                                                    $st3_1= round($stdone/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='3' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdtwo=0;$count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdtwo=$stdtwo+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st3_2= round($stdtwo/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='3' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdthree=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))
													 {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdthree=$stdthree+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st3_3= round($stdthree/$count);
												}                                                              
$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='4' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdone=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdone=$stdone+$scored;	
													   $count=$count+1;							  
												       } 								  
                                                    $st4_1= round($stdone/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='4' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdtwo=0;$count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdtwo=$stdtwo+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st4_2= round($stdtwo/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='4' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdthree=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))
													 {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdthree=$stdthree+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st4_3= round($stdthree/$count);
												}                                                              
$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='5' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdone=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdone=$stdone+$scored;	
													   $count=$count+1;							  
												       } 								  
                                                    $st5_1= round($stdone/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='5' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdtwo=0;$count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdtwo=$stdtwo+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st5_2= round($stdtwo/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='5' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdthree=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))
													 {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdthree=$stdthree+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st5_3= round($stdthree/$count);
												}                                                              
$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='6' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdone=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdone=$stdone+$scored;	
													   $count=$count+1;							  
												       } 								  
                                                    $st6_1= round($stdone/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='6' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdtwo=0;$count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdtwo=$stdtwo+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st6_2= round($stdtwo/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='6' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdthree=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))
													 {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdthree=$stdthree+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st6_3= round($stdthree/$count);
												}                                                              
$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='7' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdone=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdone=$stdone+$scored;	
													   $count=$count+1;							  
												       } 								  
                                                    $st7_1= round($stdone/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='7' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdtwo=0;$count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdtwo=$stdtwo+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st7_2= round($stdtwo/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='7' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdthree=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))
													 {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdthree=$stdthree+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st7_3= round($stdthree/$count);
												}                                                              
$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='8' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdone=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdone=$stdone+$scored;	
													   $count=$count+1;							  
												       } 								  
                                                    $st8_1= round($stdone/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='8' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdtwo=0;$count=0;
                                                     while($found = mysqli_fetch_array($result))	                                                {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdtwo=$stdtwo+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st8_2= round($stdtwo/$count);
												}                                                              

$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='8' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {        $stdthree=0; $count=0;
                                                     while($found = mysqli_fetch_array($result))
													 {   
	                            	                   $scored = $found['Grade'];	                            	                  
													   $stdthree=$stdthree+$scored;	
													   $count=$count+1;								  
													} 								  
                                                    $st8_3= round($stdthree/$count);
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


 <!-- //the links below are for date plugin -->
 <link href="css/animate.min.css" rel="stylesheet"/>   

	

	<script type="text/javascript">
window.onload = function () {

var charts = new CanvasJS.Chart("chartContainer",
		{
			theme: "theme3",
			             exportEnabled: true,
                        animationEnabled: true,
			title:{
				text: "Standard(Class) Vs Average Percent",
				fontSize: 30
			},
			toolTip: {
				shared: true
			},			
			
			axisY: {
				title: "Percentage Score"
			},			
		data: [ 
			{
				type: "column",	
				name: "1st Term",
				legendText: "1st Term",
				color: '#363636',
				showInLegend: true,
				dataPoints:[
				{label: "Std 1", y: <?php if(isset($st1_1)){echo$st1_1;}else{echo$st1_1=0;} ?>},
				{label: "Std 2", y: <?php if(isset($st2_1)){echo$st2_1;}else{echo$st2_1=0;} ?>},
				{label: "Std 3", y: <?php if(isset($st3_1)){echo$st3_1;}else{echo$st3_1=0;} ?>},
				{label: "Std 4", y: <?php if(isset($st4_1)){echo$st4_1;}else{echo$st4_1=0;} ?>},
				{label: "Std 5", y: <?php if(isset($st5_1)){echo$st5_1;}else{echo$st5_1=0;} ?>},
				{label: "Std 6", y: <?php if(isset($st6_1)){echo$st6_1;}else{echo$st6_1=0;} ?>},
				{label: "Std 7", y: <?php if(isset($st7_1)){echo$st7_1;}else{echo$st7_1=0;} ?>},
				{label: "Std 8", y: <?php if(isset($st8_1)){echo$st8_1;}else{echo$st8_1=0;} ?>}			
		
				

				]
			},
			{
				type: "column",	
				name: "2nd Term",
				legendText: "2nd Term",
				color: '#87CEFA',
				showInLegend: true,
				dataPoints:[
				{label: "Std 1", y: <?php if(isset($st1_2)){echo$st1_2;}else{echo$st1_2=0;} ?>},
				{label: "Std 2", y: <?php if(isset($st2_2)){echo$st2_2;}else{echo$st2_2=0;} ?>},
				{label: "Std 3", y: <?php if(isset($st3_2)){echo$st3_2;}else{echo$st3_2=0;} ?>},
				{label: "Std 4", y: <?php if(isset($st4_2)){echo$st4_2;}else{echo$st4_2=0;} ?>},
				{label: "Std 5", y: <?php if(isset($st5_2)){echo$st5_2;}else{echo$st5_2=0;} ?>},
				{label: "Std 6", y: <?php if(isset($st6_2)){echo$st6_2;}else{echo$st6_2=0;} ?>},
				{label: "Std 7", y: <?php if(isset($st7_2)){echo$st7_2;}else{echo$st7_2=0;} ?>},
				{label: "Std 8", y: <?php if(isset($st8_2)){echo$st8_2;}else{echo$st8_2=0;} ?>}			
		
				
				]
			},{
				type: "column",	
				name: "3rd Term",
				legendText: "3rd Term",
				color: '#FF9800',
				showInLegend: true,
				dataPoints:[
				{label: "Std 1", y: <?php if(isset($st1_3)){echo$st1_3;}else{echo$st1_3=0;} ?>},
				{label: "Std 2", y: <?php if(isset($st2_3)){echo$st2_3;}else{echo$st2_3=0;} ?>},
				{label: "Std 3", y: <?php if(isset($st3_3)){echo$st3_3;}else{echo$st3_3=0;} ?>},
				{label: "Std 4", y: <?php if(isset($st4_3)){echo$st4_3;}else{echo$st4_3=0;} ?>},
				{label: "Std 5", y: <?php if(isset($st5_3)){echo$st5_3;}else{echo$st5_3=0;} ?>},
				{label: "Std 6", y: <?php if(isset($st6_3)){echo$st6_3;}else{echo$st6_3=0;} ?>},
				{label: "Std 7", y: <?php if(isset($st7_3)){echo$st7_3;}else{echo$st7_3=0;} ?>},
				{label: "Std 8", y: <?php if(isset($st8_3)){echo$st8_3;}else{echo$st8_3=0;} ?>}			
		
				]
			}
			
			],
          legend:{
            cursor:"pointer",
            itemclick: function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else {
                e.dataSeries.visible = true;
              }
            	charts.render();
            }
          },
        });

charts.render();


}

</script>

<script src="script/canvasjs.min.js"></script>
       

 
	</head> 

 
<body class="cbp-spmenu-push">
	<div class="main-content">
	
		<!-- header-starts -->
		
		<!-- //header-ends -->
		
		
			<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
					
				<h4 class="title">
											
					<?php  
						      $count=0;
				     $sqlmembe ="SELECT * FROM tbl_students WHERE id='$id' ";
			       $retriev = mysqli_query($db,$sqlmembe);				              
                     while($found = mysqli_fetch_array($retriev))
	                 {            $count=$count+1;
                       $fname=$found['Firstname'];
                       $lname=$found['Sirname'];
                       $username=$fname.' '.$lname;
                     }   
							   
		                 echo"EDUCATION PASSPORT OF ".$username;		
		           ?>
		        </h4>
          			     
<form  method="post" action="zone.php" >
  <!-- progressbar -->
  

  <fieldset>
<?php
    
 $x =1;						   
				while ($x <=8) {
					?>              
       <table  class="table">
       	<tr>
       		<?php
$query1 = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='$x'  && Term='1' ";
                                                $result =mysqli_query($db,$query1) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {
                                                	while($found = mysqli_fetch_array($result))
	                                                {
	                                                   $Years = $found['Year'];
	                            	                   $Schools = $found['School'];												
												    }
?>
       		<td>
       <table class="table table-bordered table-hover">   
        <tbody>       
                         <tr class="warning" style="font-weight: bold">
                              <td colspan="12">Academic Year: <?php echo$Years; ?></td>               
                         </tr>
                         <tr class="warning" style="font-weight: bold">
                              <td colspan="12">School: <?php echo$Schools; ?></td>                
                         </tr>
                         <tr class="warning" style="font-weight: bold">
                             <td colspan="12">Standard <?php echo$x; ?></td>             
                         </tr>	
        	  
       <tr class="info" style="font-weight: bold">
                <td colspan="4">Term 1</td>               
                         </tr>
                        
              <tr>
				<tr >
			    <td >Subject</td> 
	            <td >Score</td>
				<td >Grade</td>
                <td >Comments</td>
				</tr>
				<?php 
$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='$x' && Term='1'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {
                                                	while($found = mysqli_fetch_array($result))
	                                                {   $subject = $found['Subject'];
	                            	                   $names = $found['Grade'];	
	                            	                   $remaks = $found['Remarks'];	
													   if($names<=49){$mark='F';}
														 elseif	($names>=50 && $names<=59){$mark='Pass';}
														 elseif	($names>=60 && $names<=69){$mark='D';}
														 elseif	($names>=70 && $names<=79){$mark='C';}
                                                         elseif	($names>=80 && $names<=89){$mark='B';}
														 elseif	($names>=90 && $names<=100){$mark='A';}								  
												  									          
										              echo"<tr><td>$subject</td>
										              <td>$names</td>
										              <td>$mark</td>
										              <td>$remaks</td></tr>";										  
													} 								  
                                                   
												}   ?>                                                               
				
	     </tbody> 
	     </table> 
	         </td>
	         <?php 
}

$query12 = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='$x'  && Term='2' ";
                                                $result =mysqli_query($db,$query12) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {
                                                	while($found = mysqli_fetch_array($result))
	                                                {
	                                                   $Years = $found['Year'];
	                            	                   $Schools = $found['School'];												
												    }
	         
	         
	         ?>
	         <td>
	     <table class="table table-bordered table-hover">   
        <tbody> 
        	<tr class="warning" style="font-weight: bold">
                              <td colspan="12">Academic Year: <?php echo$Years; ?></td>               
                         </tr>
                         <tr class="warning" style="font-weight: bold">
                              <td colspan="12">School: <?php echo$Schools; ?></td>                
                         </tr>
                         <tr class="warning" style="font-weight: bold">
                             <td colspan="12">Standard <?php echo$x; ?></td>             
                         </tr>	
        	          	                 
            <tr class="info" style="font-weight: bold">
                <td colspan="4">Term 2</td>               
                         </tr>      
              
				<tr >
			    <td >Subject</td> 
	            <td >Score</td>
				<td >Grade</td>
                <td >Comments</td>
				</tr> 
				<?php 
$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='$x' && Term='2'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {
                                                	while($found = mysqli_fetch_array($result))
	                                                {   $subject = $found['Subject'];
	                            	                   $names = $found['Grade'];	
	                            	                   $remaks = $found['Remarks'];	
													   if($names<=49){$mark='F';}
														 elseif	($names>=50 && $names<=59){$mark='Pass';}
														 elseif	($names>=60 && $names<=69){$mark='D';}
														 elseif	($names>=70 && $names<=79){$mark='C';}
                                                         elseif	($names>=80 && $names<=89){$mark='B';}
														 elseif	($names>=90 && $names<=100){$mark='A';}								  
												  									          
										              echo"<tr><td>$subject</td>
										              <td>$names</td>
										              <td>$mark</td>
										              <td>$remaks</td></tr>";										  
													} 								  
                                                   
												}   ?>                                                               

	     </tbody> 
	     </table>    				          	     
				</td>
			         <?php 
}

$query123 = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='$x'  && Term='3' ";
                                                $result =mysqli_query($db,$query123) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {
                                                	while($found = mysqli_fetch_array($result))
	                                                {
	                                                   $Years = $found['Year'];
	                            	                   $Schools = $found['School'];												
												    }
	         
	         
	         ?>		
				
				<td>
	     <table class="table table-bordered table-hover">   
        <tbody> 
        	<tr class="warning" style="font-weight: bold">
                              <td colspan="12">Academic Year: <?php echo$Years; ?></td>               
                         </tr>
                         <tr class="warning" style="font-weight: bold">
                              <td colspan="12">School: <?php echo$Schools; ?></td>                
                         </tr>
                         <tr class="warning" style="font-weight: bold">
                             <td colspan="12">Standard <?php echo$x; ?></td>             
                         </tr>	
        	        	                 
            <tr class="info" style="font-weight: bold">
                <td colspan="4">Term 3</td>               
                         </tr>      
              
				<tr >
			    <td >Subject</td> 
	            <td >Score</td>
				<td >Grade</td>
                <td >Comments</td>
				</tr>
				<?php 
$query = "SELECT * FROM tbl_assessment WHERE Studentid='$id' && Class='$x' && Term='3'  ";
                                                $result =mysqli_query($db,$query) or die('Error, query failed');
                                                if( mysqli_num_rows($result) != 0)                         
                                                {
                                                	while($found = mysqli_fetch_array($result))
	                                                {   $subject = $found['Subject'];
	                            	                   $names = $found['Grade'];	
	                            	                   $remaks = $found['Remarks'];	
													   if($names<=49){$mark='F';}
														 elseif	($names>=50 && $names<=59){$mark='Pass';}
														 elseif	($names>=60 && $names<=69){$mark='D';}
														 elseif	($names>=70 && $names<=79){$mark='C';}
                                                         elseif	($names>=80 && $names<=89){$mark='B';}
														 elseif	($names>=90 && $names<=100){$mark='A';}								  
												  									          
										              echo"<tr><td>$subject</td>
										              <td>$names</td>
										              <td>$mark</td>
										              <td>$remaks</td></tr>";										  
													} 								  
                                                   
												}   ?>                                                               
 
	     </tbody> 
	     </table>    				          	     
				</td>
				
	<?php 
}  
	 ?>
				</tr>
	</table>
         </tbody>
         
</table>
<?php
   $x=$x+1;
								           }
                ?>
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>   

  </fieldset>
</form>


</div>

<br /><br />

</div>

				        </div>
					
			
		</div>
		
				</div>
		</div>
	<!--footer-->
	
	</div>
		
 </body>
</html>