<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<center><br><br>
		<h3>Student LogIn Page</h3><br>
		<div>
		<form action="" method="post">
			Email ID: <input type="text" name="email" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			<input type="submit" name="submit" value="LogIn">
			<a href="student_register.php">Register</a>
	
		</form>	
		</div>
	
		<?php
			session_start();
			if(isset($_POST['register'])){
				echo "register";
			}
			else if(isset($_POST['submit']))
			{	

					$connection = mysqli_connect("localhost:3307","root","");
					$db = mysqli_select_db($connection,"sms");
					$query = "select * from students where email = '$_POST[email]'";
					$query_run = mysqli_query($connection,$query);
					$temp=True;
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						$temp=False;
	
						if($row['email'] == $_POST['email'])
						{
							if($row['password'] == $_POST['password'])
							{
								$_SESSION['name'] =  $row['name'];
								$_SESSION['email'] =  $row['email'];
								$_SESSION['type']="student";
								$_SESSION['sid']=$row['id'];
								header("Location: student_dashboard.php");
							}
							else{
								?>
								<span>Wrong Password !!</span>
								<?php
							}
						}
						else
						{
							?>
							<span>Wrong UserName !!</span>
							<?php
						}
					}
	
					if($temp){
						?>
						<span>Invalid User!!!	</span>
							<?php
					}
				
				

			}
		?>
	</center>
</body>
</html>