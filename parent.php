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


<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">



<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>


 
</head>
<script type="text/javascript">
 $(document).on("click", ".open-Updatepicture", function () {
     var myTitle = $(this).data('id');
     $(".modal-body #bookId").val(myTitle);
     
}); 
 </script>
 <script type="text/javascript">
 $(document).on("click", ".open-Passwords", function () {
     var myTitle = $(this).data('ik');
       var myT = $(this).data('id');
     $(".modal-title #oldteachername").val(myTitle);
     $(".modal-body #oldpassword").val(myT);
     
}); 
 </script>
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
var track_page = 1; //track user click as page number, righ now page number 1
load_contents(track_page); //load content

$("#load_more_button").click(function (e) { //user clicks on button
	track_page++; //page number increment everytime user clicks load button
	load_contents(track_page); //load content
});

//Ajax load function
/*function load_contents(track_page){
	//$('.animation_image').show(); //show loading image
	
	$.post( 'parent2.php', {'page': track_page}, function(data){	
		 	
		$("#results").append(data); //append data into #results element		
				//hide loading image
		$('.animation_image').hide(); //hide loading image once data is received
	});  
	
	    
}*/

</script>
<script type="text/javascript">


 
          $(document).on("click", ".openstudents", function () { //user clicks on button
               			  var track_page = $(this).data('id');                       
                        
                          $.post( 'patrick.php', {'studentid': track_page}, function(data){			
		                                  $("#results").html(data); //append data into #results element		
				                 });
          });
          
       

</script>
<script type="text/javascript">
$(function() {



   $(document).on("click", ".btnSave", function () { 
  	
  	var myReply = document.getElementById("txt").value;
    var value =document.getElementById("vid").value;
        $.ajax ({
                 type :'POST',
                  url: "register.php",
                 data: {postid:value,replied:myReply},
               success: function(result) {               
                                            $("#errors1").html(result);
                                          }
               });
      $("#txt").val("");
      
                 });
                 
                 
                 $(document).on("click", ".open-btnGroup", function () {
                                  var userid = $(this).data('id');
                                  var mygroup = $(this).data('gn');
                               //var mygroup = document.getElementById("gname").value;
                                    $.ajax ({
                                              type :'POST',
                                                url: "register.php",
                                               data: {username:userid,gnamed:mygroup},
                           success: function(result) {               
                                                        $("#groupshow").html(result);
                                                       }
                                             });
           
                                       });
                                       
    $(document).on("click", ".open-group", function () {    
    var mygroupname = $(this).data('id');
     var groupcreator = $(this).data('ii');
     		 $.ajax({
 		 	    type :'POST',
                  url: "register.php",
                 data: {groups:mygroupname,groupcre:groupcreator},
               success: function(result) {               
                                            $("#groupshow").html(result);
                                          }
                  });  
                                  }); 
                                  
      $(document).on("click", ".open-btnPost", function () {
                                  var userid = $(this).data('id');
                                   var groupn = $(this).data('ib');
                                   var groupc = $(this).data('gc');
                               var mygroup = document.getElementById("txtpost").value;
                                    $.ajax ({
                                              type :'POST',
                                                url: "register.php",
                                               data: {username:userid,txtpost:mygroup,gname:groupn,groupcre:groupc},
                           success: function(result) {               
                                                        $("#groupshow").html(result);
                                                       }
                                             });
           
                                       });  
      $(document).on("click", ".open-exit", function () {
       var optionValue='group';
 		 $.ajax({
 		 	    type :'POST',
                  url: "register.php",
                 data: {loadgroup:optionValue},
               success: function(result) {               
                                            $("#groupshow").html(result);
                                          }
                });    
});                               
                  
  });
  
        
        
</script>
<script type="text/javascript"> 
            $(document).on("click", ".open-Deletegroup", function () {
                                  var myValue = $(this).data('id');
                                 // window.alert(myValue);
                                        swal({
                                         title: "Are you sure?",
                                         text: "You want to delete this conversation",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, remove!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                  	var vals=myValue;
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "register.php",
                                                      data: { Valuedelgroup: vals},
                                                      success: function(result) {
                                                      if(result==8002){
                                                                    swal({title: "Deleted!", text: "Conversation thread has been deleted.", type: "success"},
                                                          function(){ 
                                                                          var optionValue='group';
 		                                                                 $.ajax({
 		 	                                                                      type :'POST',
                                                                                    url: "register.php",
                                                                                   data: {loadgroup:optionValue},
                                                                                success: function(result) {               
                                                                                                            $("#groupshow").html(result);
                                                                                                          }
                                                                                }); 
                                                                    });                               	                        
                                                                 }

                                                       }
                                                  }); } else {
	                                                           swal("Cancelled", "Your conversation thread is safe :)", "error");
                                                          }
                                         });
                                       
                                       });
                </script>


<script type="text/javascript">
 $(document).on("click", ".open-Code", function () {
     var myTitle = $(this).data('ik');
       var myT = $(this).data('id');
     $(".modal-title #cname").val(myTitle);
      $(".modal-body #ccode").val(myT);
     $(".modal-body #cname").val(myTitle);
     
}); 
 </script>
 
<?php if(isset($_SESSION['memberadded'])){?>
 <script type="text/javascript"> 
 	        
            $(document).ready(function(){ 
                                    swal({
                                         title: "User added successfully",
                                         text: "Do you want to add another one?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                           $('#Useradd').modal('show');
                                                     }                                          
                                          });
                                         
                                      });
                </script>       
              

           <?php 
	   session_destroy();		
		    }?>
		    <?php if(isset($_SESSION['memberexist'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "There is arleady a tutor with those details in the system", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
            <?php if(isset($_SESSION['emptytextboxes'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "You did not fill all the textboxes on the form", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
           <?php if(isset($_SESSION['subject'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){ 
                                    swal({
                                         title: "User removed successfully",
                                         text: "Do you want to remove another one?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="administrator.php?id=2";
                                                     } 
                                           else {
                                                        window.location ="administrator.php";
                                                 }
                                         });
                                         
                                                    });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
           <?php if(isset($_SESSION['cat'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "This category arleady in the system", "error");     				              
                               });
                </script>
           <?php 
       	   session_destroy();}  
           ?>
           <?php if(isset($_SESSION['addteacher'])){?>
                <script type="text/javascript"> 
            $(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "fetch_teacher.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Teacher has been entered.", type: "success"});

                   $("#results").html(result);
				}
			});

		})
                    </script>                               
           <?php 
       	   session_destroy();}  
           ?>
           
           <?php if(isset($_SESSION['studentreg'])){?>
                <script type="text/javascript"> 
            $(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "fetch_student.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Student has been registered.", type: "success"});

                   $("#results").html(result);
				}
			});

		})
                    </script>                               
           <?php 
       	   session_destroy();}  
           ?>
       <?php if(isset($_SESSION['teacherrelocate'])){ $sub=$_SESSION['teacherrelocate'];?>
                <script type="text/javascript"> 
            $(document).ready(function() {
			var optionValue ='<?php echo$sub; ?>';
			$.ajax({
				type : 'POST',
				url : "teacherallocation.php",
				data : {
					standard : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Teacher has been given a subject to teach.", type: "success"});

                   $("#results").html(result);
				}
			});

		})
                    </script>                               
           <?php 
       	   session_destroy();}  
           ?>          
      <?php if(isset($_SESSION['regk'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "addsubjects.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Subject has been entered.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>
<?php if(isset($_SESSION['regksz'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
					    swal({title: "Successfull!", text: "School information saved.", type: "success"});	
					    	});

                    </script>
      <?php  session_destroy(); }?>
       
      <?php if(isset($_SESSION['Import'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "teachersentry.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Teachers has been entered.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>
      
      <?php if(isset($_SESSION['Importstu'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "studentscvs.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Srudents have been entered.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>
   <?php if(isset($_SESSION['lessonplan'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "lessonplan.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Lesson plan has been entered.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>
   
   <?php if(isset($_SESSION['updatestudent'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "manage_students.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Student plan has been updated.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>
   
   <?php if(isset($_SESSION['subjectclass'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "managesubjects.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Subject has allocated to selected class.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?>
   
     <?php if(isset($_SESSION['pass'])) {?>
<script type="text/javascript">
		$(document).ready(function() {
			var optionValue = 'group';
			$.ajax({
				type : 'POST',
				url : "manage_teachers.php",
				data : {
					loadgroup : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Teacher password successfully reseted.", type: "success"});

                   $("#results").html(result);
				}
			});

		});

                    </script>
      <?php  session_destroy(); }?> 
   
   
      <script type="text/javascript"> 
            $(document).on("click", ".open-Deleted", function () {
                                  var myValue = $(this).data('id');
                                 // var myValue2 = $(this).data('ik');

                                        swal({
                                         title: "Are you sure?",
                                         text: "You will not be able to recover this subject!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, delete it!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {
                                      	
                                      	
                                         
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "register.php",
                                                      data: {subdeleted : myValue },
                                                      success: function(result) {
                                                      	
                                                      	
                                                      if(result==11){
                                                               var optionValue = 'group';
                                                        
			$.ajax({
				type : 'POST',
				url : "addsubjects.php",
				data : {
				 loadgroup : optionValue
			 },
			 success : function(result) {					
				
		     swal({title: "Successfull!", text: "Subject has been deleted.", type: "success"});
 
                    $("#results").html(result);
				}
			 });
                              	                        
                                                                 }

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "Your subject is safe :)", "error");
                                             }
                                         });
                                       
                                       });
                </script>
<script type="text/javascript"> 
            $(document).on("click", ".open-Deleteteacher", function () {
                                  var myValue = $(this).data('id');
                                 // var myValue2 = $(this).data('ik');

                                        swal({
                                         title: "Are you sure?",
                                         text: "You will not be able to recover this teacher!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, delete it!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {
                                      	
                                      	
                                         
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "register.php",
                                                      data: {Valuedel: myValue },
                                                      success: function(result) {
                                                      	
                                                      	
                                                      if(result==500){
                                                               var optionValue = 'group';
                                                        
			$.ajax({
				type : 'POST',
				url : "manage_teachers.php",
				data : {
				 loadgroup : optionValue
			 },
			 success : function(result) {					
				
		     swal({title: "Successfull!", text: "Teacher has been deleted.", type: "success"});
 
                    $("#results").html(result);
				}
			 });
                              	                        
                                                                 }

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "Your Teacher is safe :)", "error");
                                             }
                                         });
                                       
                                       });
                </script>

<script type="text/javascript"> 
            $(document).on("click", ".open-stdtransfer", function () {
                                  var myValue = $(this).data('id');
                                 // var myValue2 = $(this).data('ik');

                                        swal({
                                         title: "Accept",
                                         text: "Are you sure you want to accept this student!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, Save!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {
                                      	
                                      	
                                         
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "register.php",
                                                      data: {Valuaccept: myValue },
                                                      success: function(result) {
                                                      	
                                                      	
                                                      if(result==522){
                                                               var optionValue = 'group';
                                                        
			$.ajax({
				type : 'POST',
				url : "transfers.php",
				data : {
				 loadgroup : optionValue
			 },
			 success : function(result) {					
				
		     swal({title: "Successfull!", text: "Student has been saved to your school.", type: "success"});
 
                    $("#results").html(result);
				}
			 });
                              	                        
                                                                 }

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "Student not added :)", "error");
                                             }
                                         });
                                       
                                       });
                </script>

<script type="text/javascript"> 
            $(document).on("click", ".open-Deletex", function () {
                                  var myValue = $(this).data('id');
                                 // var myValue2 = $(this).data('ik');

                                        swal({
                                         title: "Are you sure?",
                                         text: "You will not be able to recover this teacher allocation!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, delete it!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {
                                      	
                                      	
                                         
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "register.php",
                                                      data: {tdeleted : myValue },
                                                      success: function( result ) {
                                                      if(result!=""){
                                                                var optionValue = result;
			$.ajax({
				type : 'POST',
				url : "teacherallocation.php",
				data : {
					standard : optionValue
				},
				success : function(result) {					
					
		    swal({title: "Successfull!", text: "Teacher allocation has been deleted.", type: "success"});

                   $("#results").html(result);
				}
			});
                              	                        
                                                                 }

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "Your subject is safe :)", "error");
                                             }
                                         });
                                       
                                       });
                </script>


<?php if(isset($_SESSION['regX'])) {?>
<script type="text/javascript"> 

$(document).ready(function(){  
 		                           swal({title: "Successful!", text: "School Information Updated!!.", type: "success"});

                               });
       
                    </script>
      <?php  session_destroy(); }?>
      


<script type="text/javascript">


          
          
          $(document).on("click", ".open-yes", function () { //user clicks on button
             			             			
             			 $(".disabilityinstruction").html("What kind of disability?").prop("disabled", true);

             			$(".disabilityexp").html("<textarea name='disabilityexp' style=' height:60px;width:100%' ></textarea>").prop("disabled", true);
                        
          });
          $(document).on("click", ".open-no", function () { //user clicks on button
             			             			
             			 $(".disabilityinstruction").html("").prop("disabled", true);

             			$(".disabilityexp").html("").prop("disabled", true);
                        
          });
          $(document).on("click", ".open-yes1", function () { //user clicks on button
             			             			
             			 $(".medicalinstruction").html("What medical conditions?").prop("disabled", true);

             			$(".medicalexplanation").html("<textarea name='medicalcond' style=' height:60px;width:100%' ></textarea>").prop("disabled", true);
                        
          });
          $(document).on("click", ".open-no1", function () { //user clicks on button
             			             			
             			 $(".medicalinstruction").html("").prop("disabled", true);

             			$(".medicalexplanation").html("").prop("disabled", true);
                        
          });
          
          
           $(document).on("click", ".open-Code1", function () {
         var myTitle = $(this).data('ik'); //payer name
         var myT = $(this).data('id'); //id
         var myTIN = $(this).data('it'); //tin
         var AmountT = $(this).data('im'); //address
        var myPN = $(this).data('pn'); //group 
         var mymails = $(this).data('em'); //email
         var myphone = $(this).data('ep'); //phone
         var mytemporary = $(this).data('et'); //temporarytin
         var mynature = $(this).data('in'); //nature ob
        var myaddress = $(this).data('ad'); //address
       var mycontact = $(this).data('ic'); //conatct person
       var myrdate = $(this).data('ir'); //rdate
       var mycdate = $(this).data('cd'); //cdate
       var mytop = $(this).data('tp'); //top
       var myoffice = $(this).data('ff'); //office
        var mygroup = $(this).data('ig'); //group
        var myTrans = $(this).data('tf'); //group
          var mydp = $(this).data('dp'); //group
           var mybc = $(this).data('bc'); //group
     var myguardianwork = $(this).data('pm'); //group
     var myBankn = $(this).data('bn'); //group
          var myBankbranch = $(this).data('br'); //group
           var myBankColl = $(this).data('bl'); //group
      $(".modal-body #gwork").val(myguardianwork);      
      $(".modal-body #bankcbn").val(myBankn);
     $(".modal-body #bankbranch").val(myBankbranch);
      $(".modal-body #collfee").val(myBankColl);          
     $(".modal-title #bankcbn").html(myBankn);
     $(".modal-title #cnamej").val(myTitle);
      $(".modal-body #sclass").val(myTitle);
      $(".modal-body #ccodes").val(myT);
     $(".modal-body #mytin").val(myTIN);
     $(".modal-body #myaddress").val(AmountT);     
     $(".modal-body #mymails").val(mymails);
     $(".modal-body #myphone").val(myphone);
      $(".modal-body #ttin").val(mytemporary);
     $(".modal-body #mynature").val(mynature);
     $(".modal-body #mycontact").val(mycontact);
      $(".modal-body #myrdate").val(myrdate);
     $(".modal-body #mycdate").val(mycdate);
      $(".modal-body #mytop").val(mytop);
     $(".modal-body #myoffice").val(myoffice);
     $(".modal-body #amntwords").val(mygroup);
    $(".modal-body #address").val(myaddress);
     $(".modal-body #pn").val(myPN);
      $(".modal-body #fee").val(myTrans);
     $(".modal-body #dp").val(mydp);
      $(".modal-body #bc").val(mybc);
}); 


$(document).on("click", ".open-studentinfo", function () {
         var myTitle = $(this).data('ik'); //payer name
         var myT = $(this).data('id'); //id
         var myTIN = $(this).data('it'); //tin
         var AmountT = $(this).data('im'); //address
        var myPN = $(this).data('pn'); //group 
         var mymails = $(this).data('em'); //email
         var myphone = $(this).data('ep'); //phone
         var mytemporary = $(this).data('et'); //temporarytin
         var mynature = $(this).data('in'); //nature ob
        var myaddress = $(this).data('ad'); //address
       var mycontact = $(this).data('ic'); //conatct person
       var myrdate = $(this).data('ir'); //rdate
       var mycdate = $(this).data('cd'); //cdate
       var mytop = $(this).data('tp'); //top
       var myoffice = $(this).data('ff'); //office
        var mygroup = $(this).data('ig'); //group
        var myTrans = $(this).data('tf'); //group
          var mydp = $(this).data('dp'); //group
           var mybc = $(this).data('bc'); //group
     var myparent = $(this).data('pp'); //group
     var myBankn = $(this).data('bn'); //group
          var myBankbranch = $(this).data('br'); //group
           var myBankColl = $(this).data('bl'); //group
              var myguardianwork = $(this).data('pm');
              var stprofile = $(this).data('pc');
            if( stprofile!=1){
            	        $("#stdprofile").html('<img src="multimedia/pictures/'+stprofile+'"/> ');

            }else{
            	  $("#stdprofile").html('<img src="images/profile.jpg"/> ');

            }
               
    // $("#stdprofile").html(stprofile);                                                                 //window.alert(myguardianwork);
     $("#gwork1").html(myguardianwork);        
     $("#relation1").html(myparent);  
      $("#bankcbn1").html(myBankn);
     $("#bankbranch1").html(myBankbranch);
      $("#collfee1").html(myBankColl);          
     $(".modal-title #bankcbn").html(myBankn);
     $(".modal-title #cnamej").html(myTitle);
      $("#sclass1").html(myTitle);
      $("#ccodes1").html(myT);
     $("#mytin1").html(myTIN);
     $("#myaddress1").html(AmountT);     
     $("#mymails1").html(mymails);
     $("#myphone1").html(myphone);
      $("#ttin1").html(mytemporary);
     $("#mynature1").html(mynature);
     $("#mycontact1").html(mycontact);
      $("#myrdate1").html(myrdate);
     $("#mycdate1").html(mycdate);
      $("#mytop1").html(mytop);
     $("#myoffice1").html(myoffice);
     $("#amntwords1").html(mygroup);
    $("#address1").html(myaddress);
     $("#pn1").html(myPN);
      $("#fee1").html(myTrans);
     $("#dp1").html(mydp);
      $("#bc1").html(mybc);
}); 

$(document).on("click", ".open-studenthisto", function () {
              var mystudentname = $(this).data('mm');
              var stdprofile = $(this).data('ll');
              var stdactivies = $(this).data('up');
            if( stdprofile!=1){
            	        $("#stdsprofile").html('<img src="multimedia/pictures/'+stdprofile+'"/> ');

            }else{
            	  $("#stdsprofile").html('<img src="images/profile.jpg"/> ');

            }
       $("#studentnames").html(mystudentname);        
       $("#stdactivities").html(stdactivies);    
}); 


</script> 
 <script type="text/javascript">


          
          $(document).on("click", ".open-south", function () { //user clicks on button
             			             			

             			$(".soplist").html("<p style='margin-bottom:10px;'><span style='font-size: 18px; font-weight: bold;'>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;District:<label style='color: red;font-size:20px;'>*</label><select style='width:270px;' name='districts'  id='mwdistricts' > <option>Balaka</option><option>Blantyre</option><option>Chinkhwawa</option><option>Chiradzulu</option> <option>Machinga</option><option>Mangochi</option><option>Mulanje</option><option>Mwanza</option><option>Neno</option><option>Nsanje</option><option>Thyolo</option><option>Phalombe</option><option>Zomba</option></select></span></p>").prop("disabled", true);


          });
          
           $(document).on("click", ".open-central", function () { //user clicks on button
             			             			

             			$(".soplist").html("<p style='margin-bottom:10px;'><span style='font-size: 18px; font-weight: bold;'>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;District:<label style='color: red;font-size:20px;'>*</label><select style='width:270px;' name='districts'  id='mwdistricts' ><option>Dedza</option><option>Dowa</option><option>Kasungu</option><option>Lilongwe</option><option>Mchinji</option><option>Nkhotakota</option><ption>Ntchewu</option><option>Ntchisi</option><option>Salima</option></select></span></p>").prop("disabled", true);


          });
           $(document).on("click", ".open-north", function () { //user clicks on button
             			             			

             			$(".soplist").html("<p style='margin-bottom:10px;'><span style='font-size: 18px; font-weight: bold;'>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;District:<label style='color: red;font-size:20px;'>*</label><select style='width:270px;' name='districts'  id='mwdistricts' > <option>Chitipa</option><option>Karonga</option><option>Likoma</option><option>Mzimba</option><option>Mzuzu</option><option>Nkhatabay</option><option>Rumphi</option> </select></span></p>").prop("disabled", true);


          });
          $(document).on("click", ".open-yes", function () { //user clicks on button
             			             			
             			 $(".historyinstruction").html("100 words maxmum").prop("disabled", true);

             			$(".schoolbackground").html("<textarea name='schoolhistory' style='width:500px; height:150px;' ></textarea>").prop("disabled", true);
                        
          });
          $(document).on("click", ".open-no", function () { //user clicks on button
             			             			
             			 $(".historyinstruction").html("").prop("disabled", true);

             			$(".schoolbackground").html("").prop("disabled", true);
                        
          });
          
</script>
<script type="text/javascript">
	
	 
	
$(function() {	


  $('#btnEdit').click(function() {
  	
  	var subjectn = document.getElementById("subjectn").value;
    var subcode =document.getElementById("ccode").value;
     
        $.ajax ({
                 type :'POST',
                  url: "register.php",
                 data: {ccodes:subcode,cname:subjectn},
               success: function(result) {
               	                                        
                                           if(result=='updated'){ 
                                           	                        $('#Code').modal('hide');
                                                   swal({title: "Successfull!", text: "Subject has been edited.", type: "success"},
                                                          function(){ 
                                                                          var optionValue='group';
 		                                                                 $.ajax({
 		 	                                                                      type :'POST',
                                                                                    url: "addsubjects.php",
                                                                                   data: {loadgroup:optionValue},
                                                                                success: function(result) {               
                                                                                                            $("#results").html(result);
                                                                                                           
                                                                                                          }
                                                                                }); 
                                                                    }); 
                                           	
                                           	}
                                            

                                          }
               });
      
                 });
                  
  });
           
</script>
<script type="text/javascript">
	
	 
	
$(function() {	


  $('#btnTeacherlocation').click(function() {
  	
  	var subjectname = document.getElementById("losubj").value; //subject name
    var teacherid =document.getElementById("teacherid").value;  //teacherid
        var std =document.getElementById("allocateclass").value;  //classid

     
        $.ajax ({
                 type :'POST',
                  url: "register.php",
                 data: {teacher:teacherid,subject:subjectname,classs:std},
               success: function(result) {
               	                                        
                                           if(result=='allocated'){ 
                                           	                       
                                                   swal({title: "Successfull!", text: "Teacher has been allocated.", type: "success"},
                                                          function(){ 
                                                                          var optionValue='group';
 		                                                                 $.ajax({
 		 	                                                                      type :'POST',
                                                                                    url: "teacherallocation.php",
                                                                                   data: {loadgroup:optionValue},
                                                                                success: function(result) {               
                                                                                                            $("#results").html(result);
                                                                                                           
                                                                                                          }
                                                                                }); 
                                                                    }); 
                                           	
                                           	}
                                            

                                          }
               });
      
                 });
                  
  });
  
 
</script>
<div id="Passwords" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                    Reset Password of <input style="border: none;background:#222d32" type="text" id="oldteachername" value="" readonly="readonly" />
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
        	<form method="post" action="register.php" enctype='multipart/form-data'>        		
            <p style="margin-bottom:10px;">&nbsp;Old Password:<input name='oldpassword' type='text' id='oldpassword' readonly="readonly">
            	</p>
        	<p style="margin-bottom:10px;">New Password:<input name='newpassword' type='text' id='newpass'></p> 
        	                                                        	      		
           
        </center>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Reset" id="amendreceipt" name="resetpass"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>
 <div id="Taxreceipted" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SCHOOL REPORTS PRINT RANGE
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	     <form action="printrange.php" method="post">
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">From</span>
    <input id="text" type="number" class="form-control" name="startpoint" >
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">To</span>
   <input type="number" class="form-control" name="endpoint" >
  </div>
  <div class="input-group">
    <span class="input-group-addon">Students records starts @</span>
    <input  type="text" class="form-control" name="receiptrange"   id='classid1' readonly="readonly">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Students records ends @</span>
    <input  type="text" class="form-control" name="receiptrange"  value="" id='classid2' readonly="readonly">
  </div>
<input type='hidden' name='class' value='' id='classterms'>
<input type='hidden' name='term' value='' id='termclass'>
<input type='hidden' name='students' value='' id='studentsno'>
      </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-success" value="Print" id="btns1" name="Change"> &nbsp;
      </div>
      </form> 
      </div>       
  </div>
  </div> 

<script type="text/javascript">
 $(document).on("click", ".open-Passwords", function () {
     
       var myT = $(this).data('id');
     var myTitle = $(this).data('ie');
       var myp = $(this).data('if');
       var mym = $(this).data('ig');
       var myn = $(this).data('ih');
       var myk = $(this).data('ij');
       var mykm = $(this).data('ik');
      var myAc = $(this).data('ia'); 
       
       $("#oldname").html(myTitle);
       $("#oldname").html(myTitle);
       $("#oldpass").html(mykm);
       $("#ss").html(myp);     
       $("#bb").html(mym);
       $("#cc").html(myn);
       $("#dd").html(myk);
       $("#staffid").html(myT); 
       $("#act").html(myAc);
}); 
 </script>
 
 <script type="text/javascript">
 $(document).on("click", ".open-schools", function () {
     
       var myid = $(this).data('id');
         
     $(".modal-body #mystudentid").val(myid);
      
}); 
 </script>
 <script type="text/javascript">
 $(document).on("click", ".open-trateacher", function () {
     
       var myid = $(this).data('id');
         
     $(".modal-body #myteachersid").val(myid);
      
}); 
 </script>
 <div class="modal" id="displaystudent">
			<span class="close-modal">
							<button type="submit" class="btn btn-success" id="PrintButton" onclick="PrintPage()"><span class='glyphicon glyphicon-print' style="color: white"></span> </button>&nbsp;
							<button type="submit" class="btn btn-danger"  data-dismiss="modal"><span class='glyphicon glyphicon-remove' style="color: white"></span> </button>

			</span>
			<div class="inner_section">
				<div id="record_container" class="record_container">
					<table>
						<tr><td><img src="images/logo.png"></td>
							<td align="center">					
								<h3 class="title">MINISTRY OF EDUCATION SCIENCE & TECHNOLOGY</h3></br>
								<h3>USER LOG ACTIVITIES REPORT</h3>
                           </td>
							
								
						
						</tr>
						  <div class="modal-body"> 
					</table>	
						<?php if(isset($institution)){ 
      				echo "<img style='float:right;margin-top:-14%' src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=$institution&choe=UTF-8'>";}?>
      			
			

				 	<table class="table" >
                       
                        <tr class="table_row table_part">
                            <td class="table_column">
                                LOG INFORMATION
                            </td>
                        </tr>
                        
                        
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                                Username
                            </td>
                            <td class="table_column table_head s-column">
                                User role
                            </td>
                            <td class="table_column table_head s-column">
                                IP Address
                            </td>
                            <td class="table_column s-column">
                              <span id="staffid"></span>
                            </td>
                            <td class="table_column s-column">
                               <span id="oldpass"></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="ss"></span>
                            </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                                Login
                            </td>
                            <td class="table_column table_head s-column">
                                Logout
                            </td>
                            <td class="table_column table_head s-column">
                                Number of Activities
                            </td>
                            <td class="table_column s-column">
                                <span id="bb"></span>
                            </td>
                            <td class="table_column s-column">
                                 <span id="cc"></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="oldname"></span>
                            </td>
                        </tr>
                        
                        <tr class="table_row clearfix">
                            <td class="table_column table_head l-column">
                               Activity List
                            </td>
                            <td class="table_column l-column">
                              <span id="act"></span>
                            </td>
                        </tr>
                        <tr class="table_row table_part">
                            <td class="table_column">
                                Authorization
                            </td>
                        </tr>
                        <tr class="table_row kin_row clearfix">
                            <td class="table_column table_head m-column">
                                Full Name
                            </td>
                            <td class="table_column table_head m-column">
                                System role
                            </td>
                            <td class="table_column m-column">
                                Peter
                            </td>
                            <td class="table_column  m-column">
                               Youtube
                            </td>
                        </tr>
                        <tr class="table_row kin_row clearfix">
                            <td class="table_column table_head m-column">
                                School
                            </td>
                            <td class="table_column table_head m-column">
                               Printed Date
                            </td>
                            <td class="table_column m-column">
                                 <span id="dd"></span>
                            </td>
                            <td class="table_column  m-column">
                               <?php echo$date=date('d-m-y'); ?>
                            </td>
                        </tr>
                        <tr class="table_row kin_row clearfix">
                            <td class="table_column table_head l-column">
                                 Signature
                            </td>
                            <td class="table_column l-column">
                           
                            </td>
                        </tr>
                        </div>
                        </table>

					
				</div>
			</div>
		</div>

<div id="Code1" class="modal fade" role="dialog" style="background:#222d32">
  <div class="modal-dialog" >
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
             Click on the box to edit details of <span style="border: none;background:#222d32"  id="bankcbn" /> 
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
   <form method="post" action="register.php" enctype='multipart/form-data'>        		
                          <div class="input-group" style="margin-bottom:10px;">
    <span class="input-group-addon">First Name</span>
    <input type="text" name="fname" placeholder="Firts Name" class="form-control" value="" id="bankcbn">
      <span class="input-group-addon"> Last Name</span>
   
   <input type="text" name="lname" placeholder="Last Name" class="form-control" value=""  id="bankbranch">
  </div>
  <div class="input-group" style="margin-bottom:10px;">
  	<span class="input-group-addon">Other Name</span>
     <input type="text" name="oname" placeholder="Other Name" class="form-control" id="mytin" value="" >   

    <span class="input-group-addon">Date of Birth</span>
   <input type="text" name="dob" placeholder="Date Of Birth" class="form-control" value="" id="bc" >
  </div>
  <div class="input-group" style="margin-bottom:10px;">
    <span class="input-group-addon">Gender</span>
   <input type="text" name="gender" placeholder="Bank Coll" class="form-control" value="" id="collfee" >
   <span class="input-group-addon">Biological Parents</span>
     
     <input type="text" name="bparent" placeholder="Enter Amount in words" class="form-control" value="" id="amntwords">
 </div>
                            	<div class="input-group" style="margin-bottom:10px;">
    <span class="input-group-addon">Other medical conditions</span>
   <input type="text" name="omedical" placeholder="Payment Reference Number" class="form-control" value="" id="address" >
      <span class="input-group-addon">Is the child a special need person/disabled?</span>
    <input type="text" name="sdis" placeholder="Deposit Slip" class="form-control" value="" id="dp" >
  </div>
       <div class="input-group" style="margin-bottom:10px;">
         <span class="input-group-addon">Disabilty </span>
   <textarea name="disapexp" placeholder="If yes above explain the disability" value="" id="fee" class="form-control" ></textarea>  
  
         <span class="input-group-addon">Medical Conditions</span>
   <textarea name="pconditional" placeholder="If yes above explain the medical condition" value="" id="pn" class="form-control" ></textarea>  
   </div>
   <div class="input-group" style="margin-bottom:10px;">
   	<span class="input-group-addon">Residential area</span>
  <input type="text" name="residential" placeholder="Residential area" class="form-control" value="" id="mymails" >

   	<span class="input-group-addon">Standard</span>
   <input type="text" name="pstandard" placeholder="Class"  value="" class="form-control"   id="sclass"  >

             
  </div>
                           		
                            		<div class="input-group" style="margin-bottom:10px;">

    <span class="input-group-addon">Guardian Name</span>
   <input type="text" name="guardname" placeholder="Enter Guardian Name" id="myaddress" value="" class="form-control">
      <span class="input-group-addon">Guardin Phone</span>
   <input type="number" name="gphone" placeholder="Enter Guardian Phone" class="form-control" value=""  id="myphone">

        </div>
  <div class="input-group" style="margin-bottom:10px;">
    <span class="input-group-addon">Does the parent work?</span>
   <input type="text" name="pwork" placeholder="Guardian work condition" class="form-control" value="" id="gwork" >
      <span class="input-group-addon">Is the parent a special need person/disabled?</span>
    <input type="text" name="paredisabled" placeholder="Disabled of parent" class="form-control" value="" id="ttin" >
  </div>
  
   <div class="input-group" style="margin-bottom:10px;">
        			Select picture<input name='file2' type='file' id='file2' >
           </div> 
  <input type="hidden" name="studentid" id="ccodes">
          </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Update" id="amendreceipt" name="updatestudent"> &nbsp;
        <button type="button" class='btn btn-success' data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>

<div class="modal" id="displaystudentinfo">
			<span class="close-modal">
							<button type="submit" class="btn btn-success" id="PrintButton" onclick="PrintPage()"><span class='glyphicon glyphicon-print' style="color: white"></span> </button>&nbsp;
							<button type="submit" class="btn btn-danger"  data-dismiss="modal"><span class='glyphicon glyphicon-remove' style="color: white"></span> </button>

			</span>
			<div class="inner_section">
				<div id="record_container" class="record_container">
					<table>
						<tr><td><img src="images/logo.png"></td>
							<td align="center">					
								<h3 class="title">MINISTRY OF EDUCATION SCIENCE & TECHNOLOGY</h3></br>
								<h3>STUDENT INFORMATION REPORT</h3>
                           </td>
							
								
						
						</tr>
					</table>	
						<?php if(isset($institution)){
							$institutions=$institution.'-student'; 
      				echo "<img style='float:right;margin-top:-14%' src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=$institutions&choe=UTF-8'>";}?>
      			
			

				 	<table class="table" >
                       
                        <tr class="table_row table_part">
                            <td class="table_column">
                                PERSONAL DATA
                            </td>
                        </tr>
                        <tr class="table_row">
                            <td class="table_column table_head m-column">
                                FULL NAME
                            </td>
                            <td class="table_column m-column">
                                <span id="bankcbn1"></span>  <span id='mytin1'></span>  <span id="bankbranch1"></span>
                            </td>
                            <br>
                            <td class="table_column p-column">
                              <span id='stdprofile'></span>&nbsp;
                           </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                                Date Of Birth
                            </td>
                            <td class="table_column table_head s-column">
                                Gender
                            </td>
                            <td >
                               &nbsp;
                            </td>
                            <td class="table_column s-column">
                              <span id='bc1'></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="collfee1"></span>
                            </td>
                            
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                               Disabled
                            </td>
                            <td class="table_column table_head s-column">
                               Other medical conditions
                            </td>
                            <td class="table_column table_head s-column">
                               Citizenship
                            </td>
                            <td class="table_column s-column">
                              <span id='dp1'></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="address1"></span>
                            </td>
                            <td class="table_column s-column">
                                Malawian
                            </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                                Disability Explanation
                            </td>
                            <td class="table_column table_head s-column">
                               Other Conditions Explanation
                            </td>
                            <td class="table_column table_head s-column">
                                Current Class 
                            </td>
                            <td class="table_column s-column">
                              <span id="fee1"></span>
                            </td>
                            <td class="table_column s-column">
                              <span id="pn1"></span>
                            </td>
                            <td class="table_column s-column">
                              Standard <span id='sclass1'></span>
                            </td>
                        </tr>
                        
                        <tr class="table_row clearfix">
                            <td class="table_column table_head l-column">
                               Biological Parents availability
                            </td>
                            <td class="table_column l-column">
                                <span id='amntwords1'></span>
                            </td>
                        </tr>
                        <tr class="table_row table_part">
                            <td class="table_column">
                                Next of Kin
                            </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                                Full Name
                            </td>
                            <td class="table_column table_head s-column">
                               Relationship to student
                            </td>
                            <td class="table_column table_head s-column">
                                Disabled
                            </td>
                            <td class="table_column s-column">
                              <span id="myaddress1"></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="relation1"></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="ttin1"></span>
                            </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column">
                                Does the Guardian work
                            </td>
                            <td class="table_column table_head s-column">
                               Residential Area
                            </td>
                            <td class="table_column table_head s-column">
                                Phone Number
                            </td>
                            <td class="table_column s-column">
                              <span id="gwork1"></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="mymails1"></span>
                            </td>
                            <td class="table_column s-column">
                                <span id="myphone1"></span>
                            </td>
                        </tr>
                        
                        
                        
                        </table>

					
				</div>
			</div>
		</div>
<div class="modal" id="displaystudenthisto">
			<span class="close-modal">
							<button type="submit" class="btn btn-success" id="PrintButton" onclick="PrintPage()"><span class='glyphicon glyphicon-print' style="color: white"></span> </button>&nbsp;
							<button type="submit" class="btn btn-danger"  data-dismiss="modal"><span class='glyphicon glyphicon-remove' style="color: white"></span> </button>

			</span>
			<div class="inner_section">
				<div id="record_container" class="record_container">
					<table>
						<tr><td><img src="images/logo.png"></td>
							<td align="center">					
								<h3 class="title">MINISTRY OF EDUCATION SCIENCE & TECHNOLOGY</h3></br>
								<h3>STUDENT TRANSFER RECORDS</h3>
                           </td>
							
								
						
						</tr>
					</table>	
						<?php if(isset($institution)){
							$institutions=$institution.'-student'; 
      				echo "<img style='float:right;margin-top:-14%' src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=$institutions&choe=UTF-8'>";}?>
      			
			

				 	<table class="table" >
                       
                        <tr class="table_row table_part">
                            <td class="table_column">
                                PERSONAL DATA
                            </td>
                        </tr>
                        <tr class="table_row">
                            <td class="table_column table_head m-column">
                                FULL NAME
                            </td>
                            <td class="table_column m-column">
                                <span id="bankcbn1"></span>  <span id='mytin1'></span>  <span id="studentnames"></span>
                            </td>
                            <br>
                            <td class="table_column p-column">
                              <span id='stdsprofile'></span>&nbsp;
                           </td>
                        </tr>
                        
                        
                        <tr class="table_row clearfix">
                            <td class="table_column table_head l-column">
                               Information
                            </td>
                            <td class="table_column l-column">
                                <span id='stdactivities'></span>
                            </td>
                        </tr>
                                        
                        </table>

					
				</div>
			</div>
		</div>

<div id="Code" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                   Edit School subject <input style="border: none;background:#222d32" type="text" id="cnamej" value="" readonly="readonly" />
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
            
        	<p style="margin-bottom:10px;">Subject Name:<input  type='text' id='subjectn'></p> 
        	<p style="margin-bottom:10px;"><input  type='hidden' id='ccode' >
            	</p>           
        </center>
        
      </div>
      <div class="modal-footer">
        <p><button class="btn btn-success" name="login_buttons"  id="btnEdit" > &nbsp;       		 
       		 <span class="glyphicon glyphicon-book"> </span> &nbsp;Update</button> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button></p>
      </div>
      </div>
     
  </div>
  </div>
<div id="Initialised" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SELECT CLASS
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      
      		<div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Class</span>
<select style='width:270px;height:35px' name='gradestandards'  id='gradestandards'  >
        	     		                              
            				                           <option value="std_1">Standard 1</option>
            				                           <option value="std_2">Standard 2</option>
            				                           <option value="std_3">Standard 3</option>
            				                           <option value="std_4">Standard 4</option>
            				                           <option value="std_5">Standard 5</option>
            				                           <option value="std_6">Standard 6</option>
            				                           <option value="std_7">Standard 7</option>
            				                           <option value="std_8">Standard 8</option>
            				                          
            				                                				          				
            				</select> </div>
        		   
            				
                                   	      		
       
      </div>
      <div class="modal-footer">
        <input type="submit" class="gradeset btn btn-success" value="Submit" id="gradesetup" name="classentry" data-dismiss="modal"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
      
  </div>
  </div>
<div id="Initialised2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SELECT CLASS
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      
      		<div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Class</span>
<select style='width:270px;height:35px' name='standards'  id='standards'  >
        	     		                              
            				                           <option value="1">Standard 1</option>
            				                           <option value="2">Standard 2</option>
            				                           <option value="3">Standard 3</option>
            				                           <option value="4">Standard 4</option>
            				                           <option value="5">Standard 5</option>
            				                           <option value="6">Standard 6</option>
            				                           <option value="7">Standard 7</option>
            				                           <option value="8">Standard 8</option>
            				                          
            				                                				          				
            				</select> </div>
        		   
            				
                                   	      		
       
      </div>
      <div class="modal-footer">
      	<button type="button" class="open-allocation btn btn-success" data-dismiss="modal">REDIRECT</button>
        <!--<input type="submit" class="btn btn-success" value="Sumit" id="addmember" name="classentry">--> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
  </div>
  </div>
  <div id="Promotestudents" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SELECT CLASS OF STUDENTS
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      
      		<div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Class</span>
<select style='width:270px;height:35px' name='standardsm'  id='standardsm'  >
        	     		                              
            				                           <option value="1">Standard 1</option>
            				                           <option value="2">Standard 2</option>
            				                           <option value="3">Standard 3</option>
            				                           <option value="4">Standard 4</option>
            				                           <option value="5">Standard 5</option>
            				                           <option value="6">Standard 6</option>
            				                           <option value="7">Standard 7</option>
            				                           <option value="8">Standard 8</option>
            				                          
            				                                				          				
            				</select> </div>
        		   
            				
                                   	      		
       
      </div>
      <div class="modal-footer">
      	<button type="button" class="open-promote btn btn-success" data-dismiss="modal">REDIRECT</button>
        <!--<input type="submit" class="btn btn-success" value="Sumit" id="addmember" name="classentry">--> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
  </div>
  </div>
  <div id="displayschools" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SELECT SCHOOL TO TRANSFER THE STUDENT
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      
      		<div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select School</span>
<select style='width:270px;height:35px' name='schoolsname'  id='schoolsname'  >
<?php        	     		                              
     $sqluser ="SELECT * FROM tbl_schools WHERE School_Name !='$institution'";

     $retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $school = $found['School_Name'];
			   echo"<option>$school</option>";  
  	    }
?>      				                          
            				                                				          				
            				</select> </div>
        		   
            				
              <input type="hidden" name="mystudentid" value="" id='mystudentid'/>                     	      		
       
      </div>
      <div class="modal-footer">
      	<button type="button" class="open-transfer btn btn-success" data-dismiss="modal">TRANSFER</button>
        <!--<input type="submit" class="btn btn-success" value="Sumit" id="addmember" name="classentry">--> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
  </div>
  </div>
  <div id="displayschoolsteacher" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SELECT SCHOOL TO TRANSFER THE TEACHER
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      
      		<div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select School</span>
<select style='width:270px;height:35px' name='schoolsnames'  id='schoolsnames'  >
<?php        	     		                              
     $sqluser ="SELECT * FROM tbl_schools WHERE School_Name !='$institution'";

     $retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $school = $found['School_Name'];
			   echo"<option>$school</option>";  
  	    }
?>      				                          
            				                                				          				
            				</select> </div>
        		   
            				
       <input type="hidden" name="myteachersid" value="" id='myteachersid'/>
      </div>
      <div class="modal-footer">
      	<button type="button" class="open-transferteacher btn btn-success" data-dismiss="modal">TRANSFER</button>
        <!--<input type="submit" class="btn btn-success" value="Sumit" id="addmember" name="classentry">--> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
  </div>
  </div>
<div id="Initialise" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SELECT CLASS
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      
      		<div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Class</span>
                <select style='width:270px;height:35px' name='standard'  id='classstandard'  >
        	     		                              
            				                           <option value="std_1">Standard 1</option>
            				                           <option value="std_2">Standard 2</option>
            				                           <option value="std_3">Standard 3</option>
            				                           <option value="std_4">Standard 4</option>
            				                           <option value="std_5">Standard 5</option>
            				                           <option value="std_6">Standard 6</option>
            				                           <option value="std_7">Standard 7</option>
            				                           <option value="std_8">Standard 8</option>
            				                          
            				                                				          				
            				</select> </div>
        <div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Term</span>
                <select style='width:270px;height:35px' name='term'  id='classterm'  >
        	     		                              
            				                           <option value='1'>1st Term</option>
            				                           <option value='2'>2nd Term</option>
            				                           <option value='3'>3rd Term</option>
            				                                      				                                				          				
            				</select> </div>
        		   
            				
                                   	      		
       
      </div>
      <div class="modal-footer">
      	<button type="button" class="addassessment btn btn-success" data-dismiss="modal">REDIRECT</button>
        &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       
  </div>
  </div>
  <div id="Students" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SELECT CLASS
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      
      		<div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Class</span>
                <select style='width:270px;height:35px' name='standard'  id='perfomancestandard'  >
        	     		                              
            				                           <option value="1">Standard 1</option>
            				                           <option value="2">Standard 2</option>
            				                           <option value="3">Standard 3</option>
            				                           <option value="4">Standard 4</option>
            				                           <option value="5">Standard 5</option>
            				                           <option value="6">Standard 6</option>
            				                           <option value="7">Standard 7</option>
            				                           <option value="8">Standard 8</option>
            				                          
            				                                				          				
            				</select> </div>
        <div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Term</span>
                <select style='width:270px;height:35px' name='term'  id='perfomaceterm'  >
        	     		                              
            				                           <option value='1'>1st Term</option>
            				                           <option value='2'>2nd Term</option>
            				                           <option value='3'>3rd Term</option>
            				                                      				                                				          				
            				</select> </div>
        		   
           
                                   	      		
       
      </div>
      <div class="modal-footer">
              	<button type="button" class="addperfomance btn btn-success" data-dismiss="modal">REDIRECT</button>
 &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
  </div>
  </div>
  <div id="Attendance" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SELECT CLASS
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      
      		<div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Class</span>
                <select style='width:270px;height:35px' name='standard'  id='classstandards'  >
        	     		                              
            				                           <option value="1">Standard 1</option>
            				                           <option value="2">Standard 2</option>
            				                           <option value="3">Standard 3</option>
            				                           <option value="4">Standard 4</option>
            				                           <option value="5">Standard 5</option>
            				                           <option value="6">Standard 6</option>
            				                           <option value="7">Standard 7</option>
            				                           <option value="8">Standard 8</option>
            				                          
            				                                				          				
            				</select> </div>
        <div class="input-group" style="margin-bottom:10px;" >
       <span class="input-group-addon">Select Term</span>
                <select style='width:270px;height:35px' name='term'  id='classterms'  >
        	     		                              
            				                           <option value='1'>1st Term</option>
            				                           <option value='2'>2nd Term</option>
            				                           <option value='3'>3rd Term</option>
            				                                      				                                				          				
            				</select> </div>
        		   
            				
                                   	      		
       
      </div>
      <div class="modal-footer">
        <input type="submit" class="addattendance btn btn-success" value="Submit" data-dismiss="modal"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
      
  </div>
  </div>

  <div id="Taxreceipts" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body" >       	
      	<center>        		
        		                                                           	      		
           <a id='Taxreceipt' href="#" style="width:90%;font-size: 24px;" class="Open-Taxreceipt btn btn-success">CLICK TO PROCEED TO TAX RECEIPTS</a>
         </center>
      </div>
      <div class="modal-footer">
      </div>
      </div>       
  </div>
  </div> 
    
    <div id="Taxreceiptss" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body" >       	
      	<center>          		                                                           	      		
           <a id='Taxreceiptx' href="#" style="width:90%;font-size: 24px;" class="Open-TaxreceiptX btn btn-success">PROCEED TO UPDATE TAX RECEIPTS</a>
         </center>
      </div>
      <div class="modal-footer">
      </div>
      </div>       
  </div>
  </div> 
    
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
 
 <div id="Useradd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	ADD USER TO THE SYSTEM
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	<center> 
        		<form method="post" action="upload.php" enctype='multipart/form-data' style="width: 98%;">        		

            	
      	        <p style="margin-bottom:10px;">  
        	      <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="pro">&nbsp;Pro&nbsp;&nbsp; &nbsp; &nbsp;</span>
        	    <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="dr">&nbsp;Dr &nbsp; &nbsp;&nbsp;&nbsp;</span>
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mr">&nbsp;Mr &nbsp; &nbsp; &nbsp;&nbsp;</span>        		
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mrs">&nbsp;Mrs &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="miss">&nbsp;Miss</span>
        		</p>
        		                                                           	      		
                 <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Firstname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mfname"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Sirname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="msname"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Username:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="minstitution"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Email addr:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="email" name="memail"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Password:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="password" name="mphone"></span></p>
        	     <p ><span style="font-size: 18px; font-weight: bold;">Repeat Password:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="password" name="mpassword"></span></p>
        		          	 <input type="hidden" name="page" value="administrator.php"/>                                                        	      		
                                                         	      		
         </center>
      </div>
      <div class="modal-footer">
       <input type="submit" class="btn btn-success" value="Submit" id="addmember" name="addmember"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div> 
  
  <div id="Initialisation" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	ADD SCHOOL INFORMATION
        	</center></h4>
      </div>
      	<form method="post" action="register.php" enctype='multipart/form-data'>        		

      <div class="modal-body" >       	
      	<center> 
      		<p style="text-align: -webkit-auto;margin-bottom:10px;"><span style="color: rgb(60, 58, 64); font-family: 'Palatino Linotype', serif; line-height: 19px; font-size: 18px;">
         		&nbsp;<span lang="EN-GB" style="line-height: 107%;">School Type?
        </span></span>        		 
         	   <label class="art-checkbox">         		  	
                      <input type="checkbox" name="government" >
                      <span style="font-size: 18px;">Government</span> &nbsp; &nbsp;
                      </label>
                 <label class="art-checkbox">
                 	<input type="checkbox" name="private">
                 <span style="font-size: 18px;">Private</span> &nbsp; &nbsp; </label>
         	   
         	   </span></p>      	   
         	   
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Phone:<input style="width:270px;" type="text" name="schoolphone"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:<input style="width:270px;" type="text" name="schoolemail"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;"># of Classrooms:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="schoolname"></span></p>
 
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Region:<label style="color: red;font-size:20px;">*</label>
        	     	<select style='width:270px;' name='region'  id='region' >
        	     		                              <option >Select Region</option>
            				                           <option class="open-south">Southern Region</option>
            				                           <option class="open-central">Central Region</option>
            				                           <option class="open-north">Northern Region</option>
            				                                				          				
            				</select></span></p>
            				
		
   
         		<span class="soplist"></span>
         		<p style="text-align: -webkit-auto;"><span style="color: rgb(60, 58, 64); font-family: 'Palatino Linotype', serif; line-height: 19px; font-size: 18px;">
         		&nbsp;<span lang="EN-GB" style="line-height: 107%;">Do you want to add school background?
        </span></span>
       
         	       		 
         		 
         	   <label class="art-checkbox">         		  	
                      <input type="checkbox" name="SOPSyes" class="open-yes">
                      <span style="font-size: 18px;">Yes</span> &nbsp; &nbsp;
                      </label>
                 <label class="art-checkbox">
                 	<input type="checkbox" name="SOPSno" class="open-no">
                 <span style="font-size: 18px;">No</span> &nbsp; &nbsp; </label>
         	   
         	   </span></p>      	   
         	   
         	   <p style="text-align: -webkit-auto;">
         			
         			<span style="font-size: 18px;">
         				<span style="color: rgb(60, 58, 64);">
         			&nbsp; &nbsp; &nbsp; &nbsp; 
         			
         			<span lang="EN-GB" style="line-height: 19px; font-family: 'Palatino Linotype', serif;">&nbsp;&nbsp;
                    <span class="historyinstruction"></span>
                     </span>
                     </span></span></p>
         
         
         <p style="text-align: -webkit-auto;">
         	
         	
         	
         	<span style="color: rgb(60, 58, 64); font-family: 'Palatino Linotype', serif; font-size: 18px; line-height: 16px;">
         		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
         		<span class="schoolbackground"></span>
             </span>
             </p>
            
        	        Attach school logo:<input name='filed' type='file' id='filed' >
                         <input type="hidden" name="page" value="administrator.php"/>                                                        	      		
                          	      	<input type="hidden" name="pageid" value=""/> 	
                                   	      		
         </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Finish" id="addmember" name="orginitial"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>
  
  <div id="Uploadheaders" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	Upload file
        	</center></h4>
      </div>
      	<form method="post" action="register.php" enctype='multipart/form-data'>        		

      <div class="modal-body" >       	
      	<center> 
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Category:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="category"></span></p>
        	        Attach The file:<input name='filed' type='file' id='filed' >
                         <input type="hidden" name="page" value="administrator.php"/>                                                        	      		
                         <input type="hidden" name="pageid" value="<?php echo$id; ?>"/> 	
                                   	      		
         </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Finish" id="addmember" name="UpdateFiles"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>
  
 <?php    

$sqluse ="SELECT * FROM tbl_schools WHERE School_Name='$institution' ";
$retrieve = mysqli_query($db,$sqluse);
    while($foundk = mysqli_fetch_array($retrieve))
	     {
              $name = $foundk['School_Name'];
		      $history= $foundk['School_History'];
              $phone= $foundk['School_Phone'];
              $class= $foundk['Classrooms'];
			  $mail= $foundk['School_Email'];
			  $idz= $foundk['id'];
		 }	 
?> 
<div id="Initialisation2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	EDIT SCHOOL INFORMATION
        	</center></h4>
      </div>
      	<form method="post" action="register.php" enctype='multipart/form-data'>        		

      <div class="modal-body" >       	
      	<center> 
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">School Name:<label style="color: red;font-size:20px;">*</label>
        			<input style="width:270px;" type="text" name="orgname" value="<?php if(isset($name)){echo$name;} ?>"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Phone:<label style="color: red;font-size:20px;">*</label>
        	    	<input style="width:270px;" type="text" name="orgphone" value="<?php if(isset($phone)){echo$phone;} ?>"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Email:<label style="color: red;font-size:20px;">*</label>
        			<input style="width:270px;" type="text" name="orgemail" value="<?php if(isset($mail)){echo$mail;} ?>"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Classbuildings:<label style="color: red;font-size:20px;">*</label>
        			<input style="width:270px;" type="text" name="rooms" value="<?php if(isset($class)){echo$class;} ?>"></span></p>
        	
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;History:
        	     	<label style="color: red;font-size:20px;">*</label>
        	     	<textarea name='schoolhistory' style='width:500px; height:150px;' value="<?php if(isset($history)){echo$history;} ?>" placeholder="<?php if(isset($history)){echo$history;} ?>" ></textarea>
        	     	</p>
        	                           	   Attach School Logo:(<h7 style="color:red">if you want to change the existing</h7>)<input name='filed' type='file' id='filed' >
                                          	      	                                                        	      		
                          	      	<input type="hidden" name="schoolid" value="<?php if(isset($idz)) {echo$idz;} ?>	
      	
         </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Update" id="addmember" name="orgupdate"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>


<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
       </button>
<center>	<img src="images/Logo.png" width="109px" height="113px" >

			</center>          </div>
        
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">
              	 <h4>PARENT SECTION</h4>
              </li>
              <li class="treeview">
                <a href="parent.php">
                <i class="fa fa-tv"></i> <span>Dashboard</span>
                </a>
              </li>
               
              
              
              <li class="treeview">
                <a href="#">
                
                	<?php 
              $sqlst ="SELECT * FROM tbl_guardians WHERE Password='$userid' && Email='$useremail'";
      $retrievedst = mysqli_query($db,$sqlst);
	  $re=mysqli_num_rows($retrievedst);
	  if($re==0){
			 	echo"<i class='fa fa-warning'></i>
               <span>No registered child</span>
               <i class='fa fa-angle-left pull-right'></i>
                </a>
               <ul class='treeview-menu'>";
			 }
			 if($re==1){
			 	echo"<i class='fa fa-user'></i>
               <span>My Child</span>
               <i class='fa fa-angle-left pull-right'></i>
                </a>
               <ul class='treeview-menu'>";
			 }
			 if($re>1){
			 	
				echo"<i class='fa fa-users'></i>
               <span>My Children</span>
               <i class='fa fa-angle-left pull-right'></i>
                </a>
               <ul class='treeview-menu'>";
			 }
	  if($re!=0){
                  while($found = mysqli_fetch_array($retrievedst))
	              {
                     $student= $found['Student'];
					 
					 $sqlmembe ="SELECT * FROM tbl_students WHERE id='$student' ORDER BY id DESC";
			         $retriev = mysqli_query($db,$sqlmembe);				                
                             while($found = mysqli_fetch_array($retriev))
	                           {            
                                 $fname=$found['Firstname'];$gender=$found['Gender'];
			                       $ids=$found['id']; 			            
			                      $standard=$found['Standard'];
			                         if($gender=='Male'){
			                         	echo"<li><a data-id='$ids' href='#' class='openstudents'><i class='fa fa-child'></i>$fname</a></li>";
			                         }else{
			                         	echo"<li><a data-id='$ids' href='#' class='openstudents'><i class='fa fa-female'></i>$fname</a></li>";
			                         }
						       }
			           		      
		          }
  	            }
          ?>
                  
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-book"></i>
                <span>Children assignments</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a data-toggle='modal' data-id='' href='#Updatepanel' class='open-Updatepanel'><i class="fa fa-share-square-o"></i>Cheek Liistii Qormaata Doqdoqee</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a data-toggle='modal' data-id='' href='#Taxreceipts' class='open-Taxreceipts'><i class="fa fa-share-square-o"></i>Cheek Liistii Qormaata Konkolaachiisuu AU, T2, G1, U1, </a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a data-toggle='modal' data-id='' href='#Update3' class='open-Update3'><i class="fa fa-share-square-o"></i>Cheek Liistii Qormaata Konkolaachiisuu U2, FG2 fi Fdh1</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a data-toggle='modal' data-id='' href='#Update4' class='open-Update4'><i class="fa fa-share-square-o"></i>Cheek Liistii Qormaata Konkolaachiisuu Konkolaata FG-3 fi Fdh-2</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-comment"></i>
                <span>Feedback</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a data-toggle='modal' data-id='' href='#Updatepanel' class='open-Updatepanel'><i class="fa fa-share-square-o"></i>Cheek Liistii Qormaata Doqdoqee</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a data-toggle='modal' data-id='' href='#Taxreceipts' class='open-Taxreceipts'><i class="fa fa-share-square-o"></i>Cheek Liistii Qormaata Konkolaachiisuu AU, T2, G1, U1, </a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a data-toggle='modal' data-id='' href='#Update3' class='open-Update3'><i class="fa fa-share-square-o"></i>Cheek Liistii Qormaata Konkolaachiisuu U2, FG2 fi Fdh1</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a data-toggle='modal' data-id='' href='#Update4' class='open-Update4'><i class="fa fa-share-square-o"></i>Cheek Liistii Qormaata Konkolaachiisuu Konkolaata FG-3 fi Fdh-2</a></li>
                </ul>
              </li>
              
			                          
                </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section">
			<div class="header-left" >
				<!--toggle button start-->
				<button id="showLeftPush" style="background-color: black"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<?php
				          $user=$firstname.' '.$sirname;
			
						 $sqln="SELECT * FROM chart WHERE Group_Name='$user' && Userid!='$userid' && Status='' ";
                   $res=mysqli_query($db,$sqln);                    
                      $mess=mysqli_num_rows($res);                              
                        
						?>
				<div class="profile_details_left" ><!--notifications of menu start -->
					<ul class="nofitications-dropdown" >
						<li class="dropdown head-dpdn" >
							<a style="background-color: red" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo$mess; ?></span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have <?php echo$mess; ?> new messages</h3>
									</div>
								</li>
								<?php
								
						       $sqlnn1="SELECT * FROM chart WHERE Group_Name='$user' && Userid!='$userid' && Status='' ORDER BY id DESC ";
                               $resn1=mysqli_query($db,$sqlnn1);                    
                               $stdnum1=mysqli_num_rows($resn1);                              
                               if($stdnum1!=0){
                                          	while($found = mysqli_fetch_array($resn1))
                         	                {
                         		               $message= $found['Message'];
								               $date= $found['Date'];
											   $sd= $found['Userid'];
											    $name= $found['Name'];
											    $time= $found['Time'];
												
												$sqluserk ="SELECT * FROM tbl_teachers WHERE Password='$sd'";
                                               $ret = mysqli_query($db,$sqluserk);
                                               while($found = mysqli_fetch_array($ret))
	                                           {
                                                    $idb= $found['id'];
  	                                             }
							  
											   
											   $sqluser1 ="SELECT * FROM Profile_Picture WHERE Studentid='$idb'";
                                               $retrieved = mysqli_query($db,$sqluser1);
							                if( mysqli_num_rows($retrieved) != 0)                         
                                              {
                                                    while($found = mysqli_fetch_array($retrieved))
	                                               {
                                 	                    $picname=$found['name']; 
														$profile1="<img src='multimedia/pictures/$picname' width='50px' height='50px'/>";
				  	                               }
									                
									            }else{$profile1="<img src='admin/images/profile.png' alt=''>";}
							                  
											  echo"<li>
								<a href='#' class='openforum'>
									<div class='user_img'>$profile1</div>
								   <div class='notification_desc'>
									<p>$name sent you a message</p>
									<p><span>On $date $time</span></p>
									</div>
								  <div class='clearfix'></div>	
								 </a>
							   </li>";
											
											}
                               }
						
								
								?>
							   
								<li>
									<div class="notification_bottom">
										<a href="#" class="openforum">See all messages</a>
									</div> 
								</li>
							</ul>
						</li>
						<?php
						 $sqln="SELECT * FROM tbl_transfers  WHERE Newschool='$institution' ";
                   $res=mysqli_query($db,$sqln);                    
                      $stdnumber=mysqli_num_rows($res);                              
                        
						?>
						<li class="dropdown head-dpdn">
							<a style="background-color: green" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo$stdnumber; ?></span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have <?php echo$stdnumber; ?> new notification</h3>
									</div>
								</li>
								
								<?php
								
						       $sqlnn="SELECT * FROM tbl_transfers WHERE Newschool='$institution' ";
                               $resn=mysqli_query($db,$sqlnn);                    
                               $stdnum=mysqli_num_rows($resn);                              
                               if($stdnum!=0){
                                          	while($found = mysqli_fetch_array($resn))
                         	                {
                         		               $xul= $found['Oldschool'];
								               $date= $found['Date'];
											   $stud= $found['idz'];
											   
											   $sqluser1 ="SELECT * FROM Profile_Picture WHERE Studentid='$stud'";
                                               $retrieved = mysqli_query($db,$sqluser1);
							                if( mysqli_num_rows($retrieved) != 0)                         
                                              {
                                                    while($found = mysqli_fetch_array($retrieved))
	                                               {
                                 	                    $picname=$found['name']; 
														$profile1="<img src='multimedia/pictures/$picname'/>";
				  	                               }
									                
									            }else{$profile1="<img src='admin/images/profile.png' alt=''>";}
							                  
											  echo"<li>
								<a href='#' class='mantransfers'>
									<div class='user_img'>$profile1</div>
								   <div class='notification_desc'>
									<p>Transfered from $xul</p>
									<p><span>On $date</span></p>
									</div>
								  <div class='clearfix'></div>	
								 </a>
							   </li>";
											
											}
                               }
						
								
								?>
							   
								 <li>
									<div class="notification_bottom">
										<a href="#" class='mantransfers'>See all notifications</a>
									</div> 
								</li>
							</ul>
						</li>	
						
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				<div class="search-box" >
					<form class="input" >
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!--//end-search-box-->
				
				<div class="profile_details" >		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
								<span class="prfil-img">
										<?php   
										
                                                if($profile!=""){
												                 
																	echo"<img src='multimedia/pictures/$profile' height='50px' width='50px' alt=''>";	   
												             }
												        else{
												           	echo"<img src='admin/images/profile.png' height='50px' width='50px' alt=''>";	   
														     	
												             }
										
										?>
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
			<div class="main-page" style="margin-top:5%">
		
		 <span id="results"><!-- results appear here --></span>

				
		</div>
				
	
		<div>
			&nbsp;
			</div>
			</div>
		</div>
	<!--footer-->
	<div class="footer">
	   <p>  <a href="#" target="">Design and Developed by PROHARDWEB</a></p>		
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
	
	<!-- for index page weekly sales java script -->
	
	
	<!-- Bootstrap Core JavaScript -->
   <script src="admin/js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->



</body>
<script type="text/javascript">

	function PrintPage() {
		window.print();
	}
</script>
</html>

<?php
if(isset($_GET['gs'])) 
          {	           
			  $id=$_GET['gs'];
              $query = "SELECT name,type,Size,content FROM Excelfiles WHERE id='$id' ";         
         $result = mysqli_query($db,$query) or die('Error, query failed');		 
     list($name, $type, $content) = mysqli_fetch_array($result);
	       $path = 'multimedia/'.$name;
		   $size = filesize($path);
	     header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header("Content-length:". $size);
         header("Content-type:". $type);
         header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
		 header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
     ob_clean();
       flush();
	       readfile('multimedia/'.$name);	
                mysqli_close();
                exit;      
	}
?>		  