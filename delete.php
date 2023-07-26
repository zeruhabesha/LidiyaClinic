<?php
include("config.php");

$id = $_GET['id'];
$sql = "DELETE FROM tbl_drugs WHERE id = '$id'";
$result = mysqli_query($db, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Contact Deleted</p>";
	header("Location:manage_students.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Contact Not Deleted</p>";
	header("Location:manage_students.php?msg=$msg");
}
mysqli_close($con);



	header('location: manage_students.php');
	
?>