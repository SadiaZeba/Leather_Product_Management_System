<?php
	include "db_connect.php";
	$nameErr=$Eerr=$name=$adrs=$aderr=$emerr=$email=$sal=$serr=$pass=$paserr=$phone=$pherr=$pquery="";

if(isset($_POST["submit1"]))
	{	
		
      if(empty($_POST['ename'])){
			$nameErr = "Employee name cannot be empty!";
		}
		else{
		$name = $_POST['ename'];}

      if(empty($_POST['address'])){
			$aderr = "address cannot be empty!";
		}
		
		else{
		$adrs = $_POST['address'];}

     if(empty($_POST['email'])){
			$emerr = "email cannot be empty!";
		}
		
		else{
		$email = $_POST['email'];}
		
     if(empty($_POST['phone'])){
			$pherr = "phone cannot be empty!";
		}
		
		else{
		$phone = $_POST['phone'];}

      if(empty($_POST['salary'])){
			$serr = "salary cannot be empty!";
		}
		
		else{
		$sal = $_POST['salary'];}

      if(empty($_POST['password'])){
			$paserr = "password needed!";
		}
		
		 else{
		 $pass = $_POST['password'];}
	
	       $pquery="select * from employee where name= '$name' ";
			$result= mysqli_query($conn,$pquery);
			$usercount = mysqli_num_rows($result);
		
				if($usercount>0){
					$perr="employee already exist...";
		        }

   		 else{
			 if((!empty($_POST['ename']))  && (!empty($_POST['address'])) &&
						(!empty($_POST['email'])) && (!empty($_POST['phone'])) && (!empty($_POST['salary'])) && (!empty($_POST['password']))){

                        $query="INSERT INTO employee( name, address, email, phone, salary, password) VALUES ('$name','$adrs','$email','$phone','$sal','$pass')";
				      $result= mysqli_query($conn,$query);
					  
					  if($result)
								{	?>
									<script>
									alert('inserted successfully');
									</script>
								<?php
					            }
								
								else{
									?>
									<script>
									alert('Not inserted to database...');
									</script>
								<?php
								}
				     
			            }
						
		

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
		
		<h1 class="header">Insert Employee</h1><br><br>

		<div class="text">
		<form action="" method="POST" enctype="multipart/form-data" >
		
		<label for="ename">Employee name</label><br></input>
		<input type="text" name="ename" value="">
		<span style="color:red;"> <?php echo $nameErr; ?> </span>
			<span style="color:red;"> <?php echo $Eerr; ?> </span><br>
			
			<label for="address">Address</label><br>
			<input type="text" name="address" value="" ></input>
			<span style="color:red;"> <?php echo $aderr; ?> </span><br>
			
			<label for="email">Email</label><br>
			<input type="email" name="email" value="" ></input>
			<span style="color:red;"> <?php echo $emerr; ?> </span><br>
			
			<label for="phone">Phone</label><br>
			<input type="number_format" name="phone" value="" ></input>
			<span style="color:red;"> <?php echo $pherr; ?> </span><br>
			
			<label for="salary">Salary</label><br>
			<input type="number_format" name="salary" value="" ></input>
			<span style="color:red;"> <?php echo $serr; ?> </span><br>
			
			<label for="password">Password</label><br>
			<input type="password" name="password" value="" ></input><br>
			<span style="color:red;"> <?php echo $paserr; ?> </span><br>
			
			<input type="submit" class="button" name="submit1" value="Add Employee "></input><br><br>
			
			</div>
		</form>
      
	  </div>
		
		
</body>		
		
		</html>