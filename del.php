<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Item</title>
	<!-- css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<!-- js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>


<body>
	<div class="container">
		<form method="POST">
			<h2>Are you sure you want to delete this item?</h2>
			<button name="yes">Yes</button>
			<button name="cancel">Cancel</button>
		</form>

		<?php 
		require 'connection.php';

		$id = $_GET['id'];

		$sql = "SELECT * FROM meals WHERE id='$id'";
		$result = mysqli_query($connect,$sql);

		echo "<div class='row'>";
			while ($row = mysqli_fetch_assoc($result)) {	
				echo "<div class='col-md-4'>";
					extract($row);
					echo "<img src='$image' class='img-thumbnail'>"."<br>";
					echo "<h3>".$name."</h3>";
					echo "<p>".$description."</p>";
				echo "</div>";
			}
		echo "</div>";	

		if (isset($_POST['yes'])) {
			$del = "DELETE FROM meals WHERE id='$id'";
			mysqli_query($connect,$del);
			header('location: siteDatabase.php');
		}

		if (isset($_POST['cancel'])) {
			header('location: siteDatabase.php');
		}		

		 ?>
	</div>
</body>
</html>


