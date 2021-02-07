<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>

</style>
</head>
<body>
	<div class="container">
	<div class="col-lg-12">
	<h1 class="text-warning text-center">Products For Women</h1>
		<div class="form-inline">
		<label for="search" class="font-weight-bold lead text-dark">Search Record:</label>&nbsp;
		<input type="text" name="search" id="myInput" placeholder="search by keyword" class="from-control from-control-lg rounded-0 border-primary"/><br><br>
<br><br>

<table class="table table-striped table-hover table-bordered " id="table-data"><br><br>
		<tr class="bg-dark text-white text-center">
			<th>Id</th>
			<th>Product name</th>
			<th>Price</th>
			<th>Image</th>
			<th>Category</th>
			<th>Action</th>
			
		</tr>
		<tr class="text-center">
		<tbody id="myTable">
		<?php
			include "db_connect.php";
			$query="select * from product where category like '%women%' ";
			$result=mysqli_query($conn,$query);
			while($res = mysqli_fetch_array($result)){
					
		?>
		</tr>
			<td><?php echo $res['id']; ?></th>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['price']; ?></td>
			<td><?php echo '<img src="data:image;base64,'.base64_encode($res['image']).'"alt="Image" style="width:100px; height:100px;"'; ?></td>
			<td><?php echo $res['category'];?></td>
			<td><button class="btn-danger btn"><a href="login.php?id=<?php echo $res['id']; ?>" class="text-white">Add</a></button></td>
			
		</tr>
		
		<?php
					
			}
		?>
		</tbody>
		</table>
		
</body>
</html>