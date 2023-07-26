<?php 
include_once("db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<title>
MASS
	
</title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>

<script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
	
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
    <!-- <link rel="stylesheet" href="style.css"> -->  
  
</head>
<body class="" style="background-color:#008080">

	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>
           <div class="container">
	<h2></h2>		
	
	<form class="form-login" method="post" id="login-form">
		<h2 class="form-login-heading">Verify User</h2><hr />
		<div id="error">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Email address"  name="user_email" id="user_email" />
			<span id="check-e"></span>
		</div>
		<div class="input-group" style="margin-bottom:10px;" >
			<span class="input-group-addon">Select Class</span>
                      <select style='width:270px;height:35px;background-color:black' name="password" id="password"  >
        	     		                              
            				                           <option value="1">Standard 1</option>
            				                           <option value="2">Standard 2</option>
            				                           <option value="3">Standard 3</option>
            				                           <option value="4">Standard 4</option>
            				                           <option value="5">Standard 5</option>
            				                           <option value="6">Standard 6</option>
            				                           <option value="7">Standard 7</option>
            				                           <option value="8">Standard 8</option>
            				                          
            				                                				          				
            				</select>
		</div>
		<hr />
		<div class="form-group">
			<button type="submit" class="btn btn-default" name="login_button" id="login_button">
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Verify
			</button> 
		</div> 
	</form>	
	              				                                   				                                         				                          				        		
</div>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body>
</html>