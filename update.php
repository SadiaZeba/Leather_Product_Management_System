<?php
	include "db_connect.php";
	if(isset($_POST["submit1"]))
	{	$id=$_GET['id'];
		$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$pname = $_POST['pname'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$category = $_POST['category'];		
		$query=" UPDATE `product` SET id=$id, name='$pname', quantity=$quantity, price='$price', image='$image', category='$category' WHERE id=$id ";
		$result= mysqli_query($conn,$query);
		echo "Updated Successfully...";
		header("Location:display.php");
			
		
		
		
	}
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.header{
	text-align:center;
	color:brown;
}
.text{
	margin-left:700px;
	color:brown;
}
body{
	background-color:ivory;
}
.button {
  background-color: brown;
  color: pink;
  padding: 5px 5px;
 
  border: none;
  cursor: pointer;
  width: 20%;
}
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}
.col {
    width: 100%;
    margin-top: 0;
  }
  .fb {
  background-color: #3B5998;
  color: white;
  margin:300px;
}

#modify {
		margin: 5px 20px;
}




</style>
<body>
		
		<h1 class="header">Update product</h1><br><br>

		<div class="text">
		<form action="" method="POST" enctype="multipart/form-data" >
	 
			
			
		
		<label for="pname">Product name</label><br></input>
			<input type="text" name="pname" value=""  ><br>
			
			
			
			
		<label for="image">Choose a image:</label></input><br>
		
			<input type="file" name="image" id="image" value="" ></input><br>
			
			
			
		
		<label for="quantity">Quantity</label><br>
			<input type="number" name="quantity" value="" ></input></input><br>
		
           
		<label for="price">Price</label><br>
			<input type="number" name="price"  value="" ></input></input><br>
		<label for="type">Product category</label><br>
			<select name="category">
			<option value="Men" selected>Men</option>
			<option value="Women">Women</option>
			<option value="New_arrival">New Arrival</option><br><br>
			</select><br><br>	
			<input type="submit" class="button" name="submit1" value="Update PRODUCT "></input><br><br>
			
		
		
		
			
		</form>
      
	  </div>
		
		
</body>		
		
		</html>