<?php
	include "db_connect.php";
	if(isset($_POST["submit1"]))
	{	$id=$_GET['id'];
		
		$ename = $_POST['ename'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];	
        $salary = $_POST['salary'];	
        $password = $_POST['password'];		
		$query=" UPDATE `employee` SET id=$id, name='$ename', address='$address', email='$email', phone='$phone', salary='$salary', password='$password' WHERE id=$id ";
		$result= mysqli_query($conn,$query);
		echo "Updated Successfully...";
		header("Location:displayEmployee.php");
			
		
		
		
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
	background-color:BlanchedAlmond;
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
		
		<h1 class="header">Update Employee</h1><br><br>

		<div class="text">
		<form action="" method="POST" enctype="multipart/form-data" >
		<?php
		$id=$_GET['id'];
		$query="select * from employee WHERE id=$id";
			$result=mysqli_query($conn,$query);
			while($res = mysqli_fetch_array($result)){ ?>
			
			
			
			
		
		<label for="ename">Employee name</label><br>
		<input type="text" name="ename" value="<?php echo $res['name']; ?>"></input><br>
		
			
			<label for="address">Address</label><br>
			<input type="text" name="address" value="<?php echo $res['address']; ?>" ></input><br>
			
			
			<label for="email">Email</label><br>
			<input type="email" name="email" value="<?php echo $res['email']; ?>" ></input><br>
			
			
			<label for="phone">Phone</label><br>
			<input type="number_format" name="phone" value="<?php echo $res['phone']; ?>" ></input><br>
			
			
			<label for="salary">Salary</label><br>
			<input type="number_format" name="salary" value="<?php echo $res['salary']; ?>" ></input><br>
		
			
			<label for="password">Password</label><br>
			<input type="password" name="password" value="<?php echo $res['password']; ?>" ></input><br><br>
			
			
			<input type="submit" class="button" name="submit1" value="Update Employee "></input><br><br>
			
			
			<?php
					
			}
		?>
		</form>
      
	  </div>
		
		
</body>		
		
		</html>