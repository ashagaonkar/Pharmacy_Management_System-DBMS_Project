<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="login1.css">
<div class="header">
 <p style="margin-top:30px;line-height:1;font-size:30px;">KLS VISHWANATHRAO DESHPANDE INSTITUTE OF TECHNOLOGY, Haliyal</p>
 <p style="margin-top:-20px;line-height:1;font-size:25px;">Department of Computer Science and Engineering</p>
 <h3>PHARMACY MANAGEMENT SYSTEM</h3>
</div>
<div class="footer">
 <p style="margin-bottom:0px;line-height:1;font-size:30px;text-decoration: underline;">Developed By : </p>
 <p style="margin-bottom:0px;line-height:1;font-size:20px;">Asha Gaonkar</br> Kanchana Pauskar</br> Pradnya Kamble</br> Shivangini Kumbar</br></p>
</div>
<title>
Pharmacy Management System 
</title>
</head>

<body>

	<br><br><br><br>
	<div class="container">
		<form method="post" action="">
			<div id="div_login">
				<h1>Pharmacist Login</h1>
				<center>
				<div>
					<input type="text" class="textbox" id="uname" name="uname" placeholder="Username" />
				</div>
				<div>
					<input type="password" class="textbox" id="pwd" name="pwd" placeholder="Password"/>
				</div>
				<div>
					<input type="submit" value="Submit" name="submit" id="submit" />
					<input type="submit" value="Click here for Admin Login" name="psubmit" id="submit" />
				</div>
			 
				
	<?php
				
		include "config.php";

		if(isset($_POST['submit'])){

			$uname = mysqli_real_escape_string($conn,$_POST['uname']);
			$password = mysqli_real_escape_string($conn,$_POST['pwd']);

			if ($uname != "" && $password != ""){

				$sql="SELECT e_id FROM emplogin WHERE e_username='$uname' AND e_pass='$password'";
				$result = $conn->query($sql);
				$row = $result->fetch_row();
				if(!$row) {
					echo "<p style='color:red;margin-top:10%;'>Invalid username or password!</p>";
				}
				else {
				
					$emp=$row[0];
					session_start();
					$_SESSION['user']=$emp;
					header("location:pharmmainpage.php");
				}
			}
		}
				
		if(isset($_POST['psubmit']))
		{
			header("location:mainpage.php");
		}
	?>


</body>

</html>