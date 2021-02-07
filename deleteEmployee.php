<?php
	include "db_connect.php";
	$id = $_GET['id'];
	$q=" DELETE FROM `employee` WHERE id = $id "; 
	$result=mysqli_query($conn,$q);
	
	header("Location:DisplayEmployee.php");
	
	
	
?>