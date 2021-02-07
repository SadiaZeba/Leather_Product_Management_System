<?php
	include "db_connect.php";
	$id=$upass=$message=$message1=$check="";
	

	session_start();
	


	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		if(!empty($_POST['name'])){
		$uName = mysqli_real_escape_string($conn, $_POST['name']);
		$_SESSION['aname']=$uName;
	}
		if(!empty($_POST['password'])){
		$password = mysqli_real_escape_string($conn, $_POST['password']);
	}

	$sqlUserCheck = "SELECT name, password FROM admin WHERE name = '$uName'";
	$result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		$message = "Admin does not exist...";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$PassInDb = $row['password'];
			if( $password== $PassInDb ){
				echo 'Login Sucessful';
				header("Location: home_for_admin.php");
			}
			else{
				$message1 = "Wrong Password!";
			}
			
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
  width: 50%;
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



<style>
</style>
	
		<h1 class="header">Admin Log in</h1><br><br>
		<div class="vl">
        <span class="vl-innertext"></span>
		</div>
		
		<form action="" method="POST">
		<div class="text">
			<label for="u_name">User Name</label><br>
			<input type="text" name="name" value=""></input><?php echo $message; ?><br>
		
			<label for="pwd">Password</label><br>
			<input type="password"  name="password" value=""></input>
			<?php echo $message1; ?><br><br><br>
			<?php echo $check ;?>
			
			<input type="submit" class="button" name="submit" value="Log in "></input><br><br>
			<a href="home.php"><font color="blue"><b> Back</b></font> </a>
		</form>
	</div>
	
</html>