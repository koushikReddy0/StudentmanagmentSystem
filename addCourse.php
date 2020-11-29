<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Admin</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
		}
		#left_side{
			height: 75%;
			width: 15%;
			top: 10%;
			position: fixed;
		}
		#right_side{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
		}
	</style>
	<?php
		session_start();
		$name = "";
		$connection = mysqli_connect("localhost:3307","root","");
		$db = mysqli_select_db($connection,"sms");
	?>
</head>

<body>
<div id="header"><br>
	<div style="position:relative">
			<span style="position:absolute;left:50%;margin-left:-45%"> <a style="text-decoration:none;color:white" href="admin_dashboard.php">Student Management System</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
			</span>
			<a style="position:absolute;left:90%" align="right" href="logout.php">Logout</a>
		
	</div>
</div>
<div style="position:relative;width:100%;margin-top:100px">
	<div style=" position: absolute;left:50%;margin-left:-10%"><br><br>
		<h3 align="center">Course Registration Page</h3><br>
		<form action="" method="post">
            Name : <input type="text" name="name" required style="margin-left:50px"><br><br>
			Duration : <input type="number" name="duration" required style="margin-left:30px"><br><br>
            Fee : <input type="number" name="fee" required style="margin-left:70px"><br><br>
			<center><input type="submit" name="submit" value="Register"></center>

		</form>	
		
	
		<?php
		

		 if(isset($_POST['submit']))
			{	

					$connection = mysqli_connect("localhost:3307","root","");
					$db = mysqli_select_db($connection,"sms");
                    $query = "INSERT INTO courses (name, duration, fee) VALUES ('$_POST[name]', '$_POST[duration]','$_POST[fee]')";
					$query_run = mysqli_query($connection,$query);
					
                    if ($query_run) {
                    header("Location: admin_dashboard.php");
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