<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body >

	<div style="position:relative;width:100%">
	<div style=" position: absolute;left:50%;margin-left:-10%"><br><br>
		<h3 align="center">Student Registration Page</h3><br>
		<form action="" method="post">
            Name : <input type="text" name="name" required style="margin-left:50px"><br><br>
			Email ID: <input type="text" name="email" required style="margin-left:40px"><br><br>
            Date of Birth: <input type="date" name="dob" required style="margin-left:10px"><br><br>
			Password: <input type="password" name="password" required style="margin-left:30px"><br><br>
			<center><input type="submit" name="submit" value="Register"></center>

		</form>	
		
	
		<?php
			session_start();

		 if(isset($_POST['submit']))
			{	

					$connection = mysqli_connect("localhost:3307","root","");
					$db = mysqli_select_db($connection,"sms");
                    $query = "INSERT INTO students (name, email, password,dob) VALUES ('$_POST[name]', '$_POST[email]','$_POST[password]', '$_POST[dob]')";
					$query_run = mysqli_query($connection,$query);
					
                    if ($query_run) {
                    header("Location: student_login.php");
                    echo "New record created successfully";
                    }
                    if (!$query_run) {
                        echo "error". $connection->error;
                        }
                        
                    
                    
				
				

			}
		?>
	</div>
	</div>
	
</body>
</html>