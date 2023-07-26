$('document').ready(function() { 
	/* handling form validation */
	$("#login-form").validate({
		rules: {
			password: {
				required: true,
			},
			user_email: {
				required: true,
				email: true
			},
		},
		messages: {
			password:{
			  required: "<span style='color:#66ff99;'>please enter your password!!</span>"
			 },
			user_email: "<span style='color:#66ff99;'>please enter your email address!!</span>",
		},
		submitHandler: submitForm	
	});	   
	/* Handling login functionality */
	function submitForm() {		
		var data = $("#login-form").serialize();				
		 $.ajax({				
			type : 'POST',
			url  : 'login.php',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
		success : function(response){						
				if(response=="ok"){									
					$("#login_button").html('<img src="../ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "administrator.php"; ',3000);
				} 
				else if(response=="teacher"){									
					$("#login_button").html('<img src="../ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "appregister.php"; ',3000);
				}
				else if(response=="parent"){									
					$("#login_button").html('<img src="../ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "parent.php"; ',3000);
				}else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});
				}
			}
		});
		return false;
	}   
});