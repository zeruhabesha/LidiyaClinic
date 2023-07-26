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
						<h4 class="title">CLASS ATTENDANCE REGISTER</h4>
						<?php 
						$year=date('y');
			            $month=date('m');       
			            if($month==1){ $mont='January'; }
			        	elseif($month==2){ $mont='February';}
				        elseif($month==3){ $mont='March'; }
				      elseif($month==4){  $mont='April'; }
			             elseif($month==5){ $mont='May';}
				       elseif($month==6){ $mont='June'; }				
				      elseif($month==7){ $mont='July'; }
				       elseif($month==8){ $mont='August'; }
				       elseif($month==9){$mont='September';}
				       elseif($month==10){$mont='October';}
				      elseif($month==11){$mont='November';}
				        if($month==12 ){ $mont='December';}		                                       
        
						
						?>
					<a  href="#" style="font-size: 24px;margin-bottom:10px" class="btn btn-info"><i class='fa fa-calendar'></i>&nbsp;<?php echo$mont; ?></a>

			
                            <div class="alert alert-warning">
                             <i class="fa fa-info"></i>&nbsp;Check the box if the student is present and leave it blank if the studen is absent
                         </div>
                         		     
	<form method="post" action="register.php" enctype='multipart/form-data'> 				     	
<table class="table table-bordered table-striped table-hover">
	<colgroup>
	<?php
	$query_date =date('y-m-d');
// Last day of the month.
$lastdayofmonth=date('t', strtotime($query_date));
	

			for ($x = 0; $x <=$lastdayofmonth; $x++) 
			{
				$month = date( 'm' );
                $year = date( 'y' );
                $date =$year.'-'.$month.'-'.$x;
	
	            $unixTimestamp = strtotime($date); 
                  //Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);	
if($dayOfWeek=='Saturday'|| $dayOfWeek=='Sunday'){$cala='red';}
else{$cala='grey';}
				
		                                 echo"<col class='$cala' />";
								   }
    ?>
  </colgroup>
  <thead>
  <tr>
      <th>Student</th>
      <?php
for ($x = 1; $x <=$lastdayofmonth; $x++) {
		
	$month = date( 'm' );
   $year = date( 'y' );
   $date =$year.'-'.$month.'-'.$x;
	
	$unixTimestamp = strtotime($date);
 
//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);	
if($dayOfWeek=='Monday'){$abb='Mo';}
if($dayOfWeek=='Thursday'){$abb='Th';}
if($dayOfWeek=='Tuesday'){$abb='Tu';}
if($dayOfWeek=='Wednesday'){$abb='We';}
if($dayOfWeek=='Friday'){$abb='Fr';}
if($dayOfWeek=='Saturday'){$abb='Sa';}
if($dayOfWeek=='Sunday'){$abb='Su';}

    //echo "On: $x  it was on $dayOfWeek  day abbriviatio $abb <b>";
    echo"<th>$abb</br>$x</th>";
}

?>
      
      
       </thead>    
  </tr>
  <tbody>
<?php  	

if(isset($_POST['standard'])){$std=$_POST['standard'];}else{$std=$_POST['standardz'];}
$query = "SELECT * FROM tbl_students WHERE School='$institution' && Standard='$std' ";
                      $result =mysqli_query($db,$query) or die('Error, query failed');
                        if( mysqli_num_rows($result) != 0)                         
                         {                 $count=0; $turns=0;
                         	while($found = mysqli_fetch_array($result))
                         	{
                         		   $count=$count+1; 
                         		    $fnsme= $found['Firstname'];
									 $id= $found['id'];
                         		  echo" <tr>
                                       <td>$fnsme</td>";
									                     $days=$lastdayofmonth*$count;
									                   $startvalue=($turns*$lastdayofmonth)+1;
									                  $x = $startvalue; 								   
							                       while ($x <=$days) {
							                       	
													 
							       	                    if($x>$lastdayofmonth){$xx=$x-($turns*$lastdayofmonth);}else{$xx=$x;}
									                   $month = date( 'm' );
                                                        $year = date( 'y' );
                                                       $date =$year.'-'.$month.'-'.$xx;	
													    
														 	$qu = "SELECT * FROM tbl_attendance WHERE Studentid='$id' && Attendance='Yes' && Date='$date' && Studentclass='$std' ";
                                                      $resul =mysqli_query($db,$qu) or die('Error, query failed');
                                                      if( mysqli_num_rows($resul) != 0)                         
                                                          {$checked='Checked';}else{$checked='';}
																							
		                                               echo"<td><input type='checkbox' name='$x' value='$date' $checked></td>";
													   $x=$x+1;
								           }
												   $turns=$turns+1;												   
								      }				
								
								          echo"</tr>";
					        }
					      
					        ?>
		<td><input type='hidden' name='days' value='<?php echo$lastdayofmonth; ?>' >
      	
  </tbody>
</table>
<button type="submit" class="btn btn-success" name="submitattendance" value="login_button">
			<span class="glyphicon glyphicon-floppy-disk" style="color: white"></span> &nbsp;Save
			</button> </form>
</div><br /><br />

</div>

				        </div>
					
	 		