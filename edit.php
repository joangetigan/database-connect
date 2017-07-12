<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Item</title>
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
		<div class='row'>

		<?php 
		require 'connection.php';

		$id = $_GET['id'];

		$sql = "SELECT * FROM meals WHERE id='$id'";
		$result = mysqli_query($connect,$sql);

		while ($row = mysqli_fetch_assoc($result)) {	
			echo "<div class='col-md-4'>";
				extract($row);
				echo "<img src='$image' class='img-thumbnail'>"."<br>";
				echo "<h3>".$name."</h3>";
				echo "<p>".$description."</p>";
			echo "</div>";
		}

		if (isset($_POST['save'])) {
			$name = $_POST['name'];
			$description = $_POST['description'];
			$image = $_POST['pic'];

			$edit = "UPDATE meals SET name='$name',description='$description',image='$image' WHERE id='$id'";
			mysqli_query($connect,$edit);
			header('location: siteDatabase.php');
		}

		if (isset($_POST['cancel'])) {
			header('location: siteDatabase.php');
		}

		 ?>


		<form method="POST">
			<ul class="form-style-1">
				<h2>Edit Item</h2>
			    <li><label>Name<span class="required">*</span></label><input type="text" name="name"></li>

			    <li><label>Description<span class="required">*</span></label><input type="text" name="description"></li>

			    <li><label>Upload image<span class="required">*</span></label><input type="file" name="pic"></li>

			    <li><input type="submit" name="save" value="Save"/></li>
			    <li><input type="submit" name="cancel" value="Cancel"/></li>
			</ul>
		</form>

		</div>			
	</div>

</body>
</html>


