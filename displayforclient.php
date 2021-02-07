<?php 
	$total_price="";
	session_start();
	$id=$_SESSION["id"];
	$name=$_SESSION['name'];
	
	include "db_connect.php";
	$result1='';
	
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
		<h1 class="text-warning text-center">Display Products</h1>
		
		<form method="POST" action="">
		
		<table class="table table-striped table-hover table-bordered ">
		<tr class="bg-dark text-white text-center">
			<th>Id</th>
			<th>Product name</th>
			<th>Price</th>
			<th>Image</th>
			<th>Category</th>
			<th>Amount</th>
			<th>Total Price</th>
			<th>Action</th>
			<th>Action</th>
			
		</tr>
		<tr class="text-center" onchange="calculatePrice">
		<?php
				
			$total_price="";
			
			$query="select * from product where id =$id";
			$result=mysqli_query($conn,$query);
			while($res = mysqli_fetch_array($result)){
				$price=$res['price'];
				include "db_connect.php";
			$amount="";
			if(isset($_POST['calculate'])){
				if(!empty($_POST['amount'])){
				
			$amount=$_POST['amount'];
				$total_price=$amount*$price;}
			else{
					
					echo "Please select amounts";
				}
			
			}
			if(isset($_POST['add'])){
			
				$id=$res['id'];
				$pname=$res['name'];
				$image='<img src="data:image;base64,'.base64_encode($res['image']).'"alt="Image" style="width:100px; height:100px;"';
				$time=date("Y/m/d");
				$amount=$_POST['amount'];
				$total_price=$amount*$price;
				
				
				if(!empty($_POST['amount'])){
					$deduct="SELECT * FROM product WHERE name='$pname'";
					$result2=mysqli_query($conn,$deduct);
					while($res1 = mysqli_fetch_array($result2)){
					$quantity=$res1['quantity'];
					$id=$res1['id'];
					$cquantity=$quantity-$amount;
					
					
				
				}
				if($cquantity>5){
					
					$final="UPDATE product SET quantity=$cquantity WHERE id=$id";
					$result3=mysqli_query($conn,$final);
					$query="INSERT INTO customerchoice(customer_name, product_name, price, amount, image, date) VALUES ('$name','$pname','$total_price','$amount','$image','$time')";
					$result1= mysqli_query($conn,$query);
					}
					else{
						?>
									<script>
									alert('Sorry Products are not available!!!');
									</script>
								<?php
					}
				
				
				if($result1)
							{ echo "Inserted successfully";
							header("Location: productlistforclient.php");
								
						
							}
								else{
									?>
									<script>
									alert('Not inserted to database....!!!');
									</script>
								<?php
				}}
				else{
					
					echo "Please select amount";
				}
							
			}
			
				
				
					
		?>
		</tr>
			<td><?php echo $res['id']; ?></th>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['price']; ?></td>
			<td><?php echo '<img src="data:image;base64,'.base64_encode($res['image']).'"alt="Image" style="width:100px; height:100px;"'; ?></td>
			<td><?php echo $res['category'];?></td>
			<td><input type="number" name="amount" value="<?php echo $amount;?>"min="1" max="5"></input>
			<td><input   value="<?php echo $total_price;?>"></td>
			<td><button  class="btn-primary btn" name="calculate"><a class="text-white">Calculate</a></button></td>
			
			<td><button class="btn-primary btn" name="add"><a  class="text-white">Add</a></button></td>
			 
			
		</tr>
		
		<?php
					
			}
			
			
			
			
		?>
	
		</table>
		</form>
		
</script>		
		
</body>

</html>