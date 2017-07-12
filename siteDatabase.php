<?php 
session_start();
require 'connection.php';


 ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>hot for food</title>
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
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
			
				<!-- LOGO AND BURGER-->
				<div class="navbar-header">
					<a href="#"> <img src="logo.png" alt="logo" id="logo"> </a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
		  
				<!-- RIGHT HAND MENU -->
				<div class="collapse navbar-collapse" id="myNavbar">
					<div class="options">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="" target="block">being vegan</a>
							</li>
							<li>
								<a href="" target="block">recipes</a>
							</li>
							<li>
								<a href="" target="block">resources</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	  	</nav>
	</header>

	<div class="container">
		<div class="row">
			<div class="col-md-10">	
			<!-- display menu from database -->
				<?php 
					$sql = "SELECT * FROM meals";
					$result = mysqli_query($connect,$sql);
					
					if (mysqli_num_rows($result)>0) {		
						echo "<div class='row'>";
							while ($row = mysqli_fetch_assoc($result)) {	
								if (!isset($_POST['submit']) || $row['category']==$_POST['choice'] || $_POST['choice']=='All') {
									echo "<div class='col-md-4'>";
										extract($row);
										echo "<img src='$image' class='img-thumbnail'>"."<br>";
										echo "<h3>".$name."</h3>";
										echo "<p>".$description."</p>";
										echo "<button>"."ADD TO ORDER"."</button>";
										if (!isset($_SESSION['is_admin'])) {
											echo "<a href='edit.php?id=$id'><button>"."Edit"."</button></a>";
										} else {
											echo "<a href='edit.php?id=$id'><button>"."Edit"."</button></a>";
											echo "<a href='del.php?id=$id'><button class=btn-danger>"."Delete"."</button></a>";
										}
									echo "</div>";
								}
							}
						echo "</div>";	
					}
				?>						
				<footer>
					<i class="fa fa-facebook fa-lg fa-fw"></i>
					<i class="fa fa-twitter fa-lg fa-fw"></i>
					<i class="fa fa-instagram fa-lg fa-fw"></i>
					<i class="fa fa-pinterest-p fa-lg fa-fw"></i>
					<i class="fa fa-google-plus fa-lg fa-fw"></i>
				</footer>
			</div>

			<!-- SIDEBAR -->
			<div class="col-md-2">
				<div class="sidebar">
				<!-- DROPDOWN MENU -->
					<?php 
						$set = "SELECT DISTINCT category FROM meals";
						$select = mysqli_query($connect,$set);

						echo "<form method='POST' action=''>";
							if (mysqli_num_rows($result)>0) {		
								echo "<select name='choice'>";
								echo "<option>All</option>";
								while ($row = mysqli_fetch_assoc($select)) {	
									extract($row);
									if(isset($_POST['choice']) && $_POST['choice']==$category) {		
										echo "<option selected value='$category'>".$category."</option>";
										} else {
										echo "<option value='$category'>".$category."</option>";
										}
									}
								echo "</select>";
								echo "<input type='submit' name='submit' value='Submit'>";		
							}
						echo "</form>";
						echo "<br>";
					 ?>
					<a href="add.php" target="block"><button>Add Item</button></a><br>

					<?php  
					if(!isset($_SESSION['is_logged_in'])) {
						echo "<a href='login.php'><button>Login</button></a>";
					} else { 
						echo "<h3>".$_SESSION['message']."</h3><br>";
						echo "<a href='logout.php'><button>Logout</button></a>";
					};


					?>				

				</div>
			</div>
		</div>
	</div>

</body>
</html>