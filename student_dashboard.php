<!DOCTYPE html>
<html>
<head>
	<title>Welcome  student</title>
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
	</style>
	<?php
		session_start();
		$connection = mysqli_connect("localhost:3307","root","");
		$db = mysqli_select_db($connection,"sms");
	?>
</head>
<body>
<div id="header"><br>
	<div style="position:relative">
			<span style="position:absolute;left:50%;margin-left:-45%"> Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
			</span>
			<a style="position:absolute;left:90%" align="right" href="logout.php">Logout</a>
		
	</div>
</div>

<div style="margin-top:100px;position:relative;top:20%">
<?php

 $query = "select c.id,c.name,c.duration,c.fee from students as s, courses as c where  c.id=s.cid and s.id=".$_SESSION['sid'];

 
 $query_run = mysqli_query($connection,$query);
 while ($row = mysqli_fetch_assoc($query_run)){
	?>
	<div style="margin-left:20px">
	<p><b>Your course :</b> <?php echo $row['name']?> </p>
	<p><b>duration : </b><?php echo $row['duration']?></p>
	<p><b>fee:</b>  <?php echo $row['fee']?></p>
	<div>
	<?php
 }


 $query = "select * from courses ";
?>

<div style="position:absolute;width:100%;padding-left:10%;">

<table style="width:100%;margin-top:50px;">

<tr>
<th>ID</th>
<th>Name</th>
<th>Duration</th>
<th>Fee</th>
<th><th>
</tr>
<?php
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)) 
	{
		?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['duration']?></td>
					<td><?php echo $row['fee']?></td>
					<td>
				<form action="" method="post">
					<input style="visibility: hidden" type="text" name="id" value="<?php echo $row['id']?>">
					<input type="submit" name="apply" value="apply">
					


		</form><br>
		
		
		
		
			</td>
				</tr>
		<?php
	}
?>
	</table>


</div>


					</div>
			<?php


if(isset($_POST['apply']))
   {	

		   $connection = mysqli_connect("localhost:3307","root","");
		   $db = mysqli_select_db($connection,"sms");
		   $query = "update  students  set cid='$_POST[id]' where id='$_SESSION[sid]'";
		   echo $query;
		   $query_run = mysqli_query($connection,$query);
		   
		   if ($query_run) {
			   echo "New record created successfully";
			   header("Location: student_dashboard.php");
			   
			   }
		   if (!$query_run) {
			   echo "error". $connection->error;
			   }
			   
		   
		   
	   
	   

   }

					
?>


</div>

<div>

</div>

</body>
</html>