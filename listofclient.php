<?php 
	
	include "db_connect.php";
	
	
?>
<html>
<!DOCTYPE html>
<html>

<head>
  <title>Client List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
	<div class="col-lg-12">
		<h1 class="text-warning text-center">Display Client</h1>
		<form method="POST" action="">
		<table class="table table-striped table-hover table-bordered ">
		<tr class="bg-dark text-white text-center">
			<th>Id</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			
			
		</tr>
		<tr class="text-center" onchange="calculatePrice">
		<?php
				
			
			$query="select * from registration";
			$result=mysqli_query($conn,$query);
			while($res = mysqli_fetch_array($result)){
			
				
					
		?>
		</tr>
			<td><?php echo $res['id']; ?></th>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['phone']; ?></td>
			<td><?php echo $res['email'];?></td>
			
			 
			
		</tr>
		
		<?php
					
			}
			
			
			
			
		?>
	
		</table>
		</form>
		
</script>		
		
</body>

</html>