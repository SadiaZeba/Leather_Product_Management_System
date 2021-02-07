<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lproduct";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){
	?>
	<script>
	alert('connection successful');
	</script>
	<?php
}
else{	
	die("no connection".mysqli_connect_error());
}
?>