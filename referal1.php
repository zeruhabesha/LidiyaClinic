<?php

include("db_connect.php");



  ?>
<!doctype html>
<html class="no-js" lang="en" >
  <div class="wrapper-pro"style="margin-top:-30px " id="body5">
<img src='images/referal.jpg'height="1450px" width="1000px"  >
														 
                                </div>
<button type="submit" class="btn btn-info" id="PrintButton" onclick="PrintPage7()"><span class='glyphicon glyphicon-print' style="color: white"></span> </button>&nbsp;

                             
  <!-- <button onclick="printpage1()">PRINT</button-->
    
<script>
function PrintPage7(){
		
		var prtrefer = document.getElementById("body5");

		var WinPrint = window.open('', '', 'left=0,top=0,width=100%,height=100%,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtrefer.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
	}

</script>
<script type="text/javascript"> 
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
            $(document).on("click", ".certificate12", function () {
        var myTitl = $(this).data('em'); 
         var myIdss = $(this).data('id'); 
        var myFirs = $(this).data('ep'); 
         var mySi = $(this).data('et'); 
         var myAg = $(this).data('pm'); 
         var myPi = $(this).data('ig'); 
        var myGende = $(this).data('dp'); 
       
		   
      $("#myTitle1").html(myTitl);      
      $("#myIdss").html(myIdss);
     $("#myFirst1").html(myFirs);
     $("#mySir1").html(mySi);
     $("#myAge1").html(myAg);
      $("#myPid1").html(myPi);
      $("#myGender1").html(myGende);
}); 
                </script>
</body>

</html>
