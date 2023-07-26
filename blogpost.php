<?php
$num=412.4;
$fig=round($num,0); // this gives the value without decimal
$num0=$fig % 50;   // this gives the reminder
$num1=50-$num0;   //this gives the diffrence
$num2=$fig+$num1;  //this add the difference to the amount
?>