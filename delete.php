<?php
	include "db_connect.php";
	$id = $_GET['id'];
	$q=" DELETE FROM `product` WHERE id = $id "; 
	$result=mysqli_query($conn,$q);
	
	header("Location:display.php");
	
	
	
?>