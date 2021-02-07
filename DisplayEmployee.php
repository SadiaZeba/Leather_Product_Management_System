<!DOCTYPE html>
<html>
<head>
  <title>Employee Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<div class="col-lg-12">
		<h1 class="text-warning text-center">Employee Information</h1>
		<table class="table table-striped table-hover table-bordered ">
		<tr class="bg-dark text-white text-center">
			<th>Id</th>
			<th>Employee name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Salary</th>
			<th>Password</th>
			<th>Action</th>
			<th>Action</th>
		</tr>
		<tr class="text-center">
		<?php
			include "db_connect.php";
			$query="select * from employee";
			$result=mysqli_query($conn,$query);
			while($res = mysqli_fetch_array($result)){
					
		?>
		</tr>
		    <td><?php echo $res['id']; ?></th>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['address']; ?></td>
			<td><?php echo $res['email']; ?></td>
			<td><?php echo $res['phone']; ?></th>
			<td><?php echo $res['salary']; ?></td>
			<td><?php echo $res['password']; ?></td>
			<td><button class="btn-danger btn"><a href="deleteEmployee.php?id=<?php echo $res['id']; ?>" class="text-white">Delete</a></button></td>
			<td><button class="btn-primary btn"><a href="updateEmployee.php?id=<?php echo $res['id']; ?>" class="text-white">Update</a></button></td>
			
		</tr>
		
		<?php
					
			}
		?>
	
		</table>
		
</body>
</html>