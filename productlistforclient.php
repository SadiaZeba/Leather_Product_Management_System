 <?php 
	
	session_start();
	$id=$_SESSION["id"];
	$name=$_SESSION['name'];
	
	
	
	
?>
<html>
<!DOCTYPE html>
<html>

<head>
  <title>Display Products</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
	<div class="col-lg-12">
		<h1 class="text-warning text-center"><?php echo $name; echo " ";?>Product Order List</h1>
		<form method="POST" action="">
		<table class="table table-striped table-hover table-bordered ">
		<tr class="bg-dark text-white text-center">
			
			<th>Product name</th>
			<th>Price</th>
			<th>Amount</th>
			
			<th>Date</th>
			
			
		</tr>
		<tr class="text-center" >
		<?php
				
			
			include "db_connect.php";
			$query="select * from customerchoice where customer_name ='$name'";
			$result=mysqli_query($conn,$query);
			while($res = mysqli_fetch_array($result)){
				$image='<img src="data:image;base64,'.base64_encode($res['image']).'"alt="Image" style="width:100px; height:100px;"';
			
		?>
		</tr>
			
			<td><?php echo $res['product_name']; ?></td>
			<td><?php echo $res['price']; ?></td>
			<td><?php echo $res['amount']; ?></td>
			
			<td><?php echo $res['date']; ?></td>
			
			
		</tr>
		
		<?php
					
			}
			
			
			
			
		?>
	
		</table>
		</form>
		
		
</body>

</html>