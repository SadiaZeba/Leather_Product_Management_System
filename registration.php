<?php
	
	include "db_connect.php";
	$Error=$uname=$uphone=$upassword=$cpassword=$utype=$nameErr=$phoneErr=$emailErr=$pwdErr=$pwd1Err=$uemail=$userErr=$passErr="";
	 if(isset($_POST['submit'])){
		$utype=$_POST['type'];
		 if(empty($_POST['name'])){
			$nameErr = "Username cannot be empty!";
		}
		else{
		$uname=mysqli_real_escape_string($conn,trim($_POST['name']));
		}
		if(empty($_POST['phone'])){
			$phoneErr = "Phone number cannot be empty!";
		}
		else{
		$uphone=mysqli_real_escape_string($conn,trim($_POST['phone']));
		}
		if(empty($_POST['email'])){
			$emailErr = "Email cannot be empty!";
		}
		else{
		$uemail=mysqli_real_escape_string($conn,trim($_POST['email']));
		}
		if(empty($_POST['pwd'])){
			$pwdErr = "Password cannot be empty!";
		}
		else{
		$upassword=mysqli_real_escape_string($conn,trim($_POST['pwd']));
		}
		if(empty($_POST['pwd1'])){
			$pwd1Err= "Confirm Password cannot be empty!";
		}
		else{
		$cpassword=mysqli_real_escape_string($conn,trim($_POST['pwd1']));
		}
			$pass = password_hash($upassword, PASSWORD_DEFAULT);;
			$namequery="select * from registration where name= '$uname' ";
			$result= mysqli_query($conn,$namequery);
			$usercount = mysqli_num_rows($result);
		
				if($usercount>0){
					$userErr="user already exist...";
		}
				else
					{
					if($upassword==$cpassword){
						if((!empty($_POST['name'])) && (!empty($_POST['email'])) && (!empty($_POST['phone'])) &&
						(!empty($_POST['pwd'])) && (!empty($_POST['pwd1'])) ){
							$query="INSERT INTO registration(name, phone, email, password, user_type) VALUES ('$uname','$uphone','$uemail', '$pass','$utype')";
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
					else{
						$passErr="password are not matched";
			}
		}
		
		
	 }
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  padding: 12px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
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
  




</style>
		
		<h1 class="header">Registration</h1><br><br>
		
		<div class="text">
		<form action="" method="POST" >
		
		<label for="name">Full Name</label><br>
			<input type="text" name="name" value="<?php echo $uname; ?>"  ></input>
			<span style="color:red;"> <?php echo $nameErr; ?> </span>
			<span style="color:red;"> <?php echo $userErr; ?> </span><br>
			
		<label for="phone">Mobile number</label><br>
			<input type="number" name="phone" value=" size=" 11 "<?php echo $uphone; ?>" ></input>
			<span style="color:red;"> <?php echo $phoneErr; ?> </span><br>
		
		<label for="email">Email</label><br>
			<input type="email" name="email" value="<?php echo $uemail; ?>"  ></input>
			<span style="color:red;"> <?php echo $emailErr; ?> </span><br>
           
		<label for="pwd">Password</label><br>
			<input type="password" name="pwd"  value="" ></input>
			<span style="color:red;"> <?php echo $pwdErr; ?> </span><br><br>
	
		<label for="pwd">Confirm Password</label><br>
			<input type="password" name="pwd1"  value="" ></input>
			<span style="color:red;"> <?php echo $pwd1Err; ?> </span>
			<span style="color:red;"> <?php echo $passErr; ?> </span><br><br>
		
		<label for="type">Enter Usertype</label><br>
			<select name="type">
			<option value="customer" selected>Customer</option>
			</select><br><br>
		
		<input type="submit" class="button" name="submit" value="CREATE ACCOUNT "></input><br><br>
		
			
		</form>
		</div>
		
		</html>
		