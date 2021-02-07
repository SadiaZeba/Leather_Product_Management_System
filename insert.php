<?php
	include "db_connect.php";
	$imageerr=$qnterr=$priceerr=$nameErr=$perr=$pquery=$name="";
	if(isset($_POST["submit1"]))
	{	
		
			$imageerr = "Image cannot be empty!";
			$images= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$ucategory=$_POST['category'];
		if(empty($_POST['pname'])){
			$nameErr = "Product name cannot be empty!";
		}
		else{
		$name = $_POST['pname'];}
		
		if(empty($_POST['quantity'])){
			$qnterr = "Quantity cannot be empty!";
		}
		
		else{
		$pqnt = $_POST['quantity'];}
		
		if(empty($_POST['price'])){
			$priceerr = "Price cannot be empty!";
		}
		else{
			$pprice = $_POST['price'];}
			
			$pquery="select * from product where name= '$name' ";
			$result= mysqli_query($conn,$pquery);
			$usercount = mysqli_num_rows($result);
		
				if($usercount>0){
					$perr="Product already exist...";
		}
		else{
			if((!empty($_POST['pname']))  && (!empty($_POST['quantity'])) &&
						(!empty($_POST['price']))){
				$query="INSERT INTO product( name, quantity, price, image, category) VALUES ('$name','$pqnt','$pprice','$images','$ucategory')";
				$result= mysqli_query($conn,$query);}
				echo "Inserted Successfully...";
				}
		
		
		
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
		
		<h1 class="header">Insert product</h1><br><br>

		<div class="text">
		<form action="" method="POST" enctype="multipart/form-data" >
		
		
		<label for="pname">Product name</label><br></input>
			<input type="text" name="pname" value="<?php echo $name; ?>"  >
			<span style="color:red;"> <?php echo $nameErr; ?> </span>
			<span style="color:red;"> <?php echo $perr; ?> </span><br>
			
			
			
		<label for="image">Choose a image:</label></input><br>
		
			<input type="file" name="image" id="image" value="" ></input><br>
			
			
			
		
		<label for="quantity">Quantity</label><br>
			<input type="number" name="quantity" value="<?php echo $pqnt; ?>" ></input></input>
			<span style="color:red;"> <?php echo $qnterr; ?> </span><br>
			
           
		<label for="price">Price</label><br>
			<input type="number" name="price"  value="<?php echo $pprice; ?>" ></input></input>
			<span style="color:red;"> <?php echo $priceerr; ?> </span><br>
		<label for="type">Product category</label><br>
			<select name="category">
			<option value="Men" selected>Men</option>
			<option value="Women">Women</option>
			<option value="New_arrival">New Arrival</option><br><br>
			</select><br><br>	
			<input type="submit" class="button" name="submit1" value="CREATE PRODUCT "></input><br><br>
			
		</div>
		</form>
      
	  </div>
		
		
</body>		
		
		</html>