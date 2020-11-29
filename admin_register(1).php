<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body >

	<div style="position:relative;width:100%">
	<div style=" position: absolute;left:50%;margin-left:-10%"><br><br>
		<h3 align="center">Admin Registration Page</h3><br>
		<form action="" method="post">
            Name : <input type="text" name="name" required style="margin-left:50px"><br><br>
			Email ID: <input type="text" name="email" required style="margin-left:40px"><br><br>
			Password: <input type="password" name="password" required style="margin-left:30px"><br><br>
			<center><input type="submit" name="submit" value="Register"></center>

		</form>	
		
	
		<?php
			session_start();

		 if(isset($_POST['submit']))
			{	

					$connection = mysqli_connect("localhost:3307","root","");
					$db = mysqli_select_db($connection,"sms");
                    $query = "INSERT INTO admins (name, email, password) VALUES ('$_POST[name]', '$_POST[email]','$_POST[password]')";
					$query_run = mysqli_query($connection,$query);
					
                    if ($query_run) {
                    echo "New record created successfully";
                    header("Location: admin_login.php");
                    
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