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

<div style="margin-top:120px;position:relative;top:20%;margin-left:10%;margin-right:10%">
<span> <b>Courses</b>  </span>



						<table style="width:100%;position:absolute;top:200%;">

				<tr>
				<th>ID</th>
				<th>Name</th>
                <th>Email</th>
				<th>DOB</th>
				<th>Course</th>
				</tr>
				<?php
                $query = "select s.id,s.name,s.email,s.dob,s.cid from students as s ";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
								<tr>
									<td><?php echo $row['id']?></td>
									<td><?php echo $row['name']?></td>
									<td><?php echo $row['email']?></td>
                                    <td><?php echo $row['dob']?></td>
                                    <td><?php

                                            echo $row['cid']
                                               
                                        ?>
                                    </td>
								</tr>
						<?php
					}
				?>
					</table>
					</div>
			<?php
?>


<div>

</div>

</body>
</html>