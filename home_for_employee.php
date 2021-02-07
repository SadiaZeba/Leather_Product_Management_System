<?php
session_start();
	$ename="";
	$ename=$_SESSION['ename'];

include "db_connect.php";



?>





<html>
<style>


footer{
  padding:20px;
  margin-top:60px;
  color:pink;
  background-color:Brown;
  text-align: center;
  left: 0;
  bottom: 0;
  width: 100%;
}
body{
	background-color:ivory;
	
	
}


#navigaion{background:Brown;
width:100%;
height: 35px;
margin: 5px 0;
}
 
#navigaion ul{
list-style-type:none;
margin:0;
padding:0;
}
 
#navigaion li{
float:left;
border-right: 1px solid #fff;
}
 
#navigaion a:link{
display:block;
width:120px;
font-weight:bold;
color:#FFFFFF;
text-align:center;
padding:4px;
text-decoration:none;
 
}
 
#navigaion a:hover{
color:#000;
}

#showcase{
	min-height:600px;
	background-image: url("images/ad_em_login_pic.jpg");
	background-repeat: no-repeat, repeat;
	background-position:center;
	background-size: cover;
	color:pink;
}
h1{
	margin:100px;
	font: 20px/1.5;
	padding:0;
	
	
}
.container{
  width:80%;
  margin:auto;
  overflow:hidden;
}
header #branding h1{
  margin:0;
}
</style>
	
	
	<table border="0" width="100%"bgcolor="brown">
	<tr>
	<td><label><font color="cream"><b>Leather Product House</b></font></label></td>
	<td colspan="8" align="right"><a href="logoutemployee.php"><font color="cream"><b>Logout</b></font></a></td>
	</tr>
	</table>

	
	 <nav id="navigaion">
 <ul>
 
 <li><a href="home_for_employee.php"><font color="pink">Home</font></a></li>
 <li><a href="insert.php"><font color="pink">Products</font></a></li>
 <li><a href="display.php"><font color="pink">Products List</font></a></li>
 <li><a href="listofcustomerorder.php"><font color="pink">Sold Products</font></a></li>
 <li><a href="listofclient.php"><font color="pink">Customer List</font></a></li>
 
  
 
 
</ul>
 </nav>
 <section id="showcase" class="container">
 <div align="center">
 
 
  
<h1>Welcome, <?php echo $ename; ?></h1><br> <br>
 <h3><font color="pink">Leather Product House....<br>
 Choose Your Own Choice </font></h3>
  

 

 </div>
 </section>

 <footer>
 Leather Product
 </footer>
	
</html>