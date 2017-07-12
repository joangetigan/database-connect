<?php 
require 'connection.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$description = $_POST['description'];
	$image = $_POST['pic'];

	$sql = "INSERT INTO meals(name,description,image) 
	VALUES('$name','$description','$image')";
	$result = mysqli_query($connect,$sql);

	if ($result) {
		header('location: siteDatabase.php');
	}
}

if (isset($_POST['cancel'])) {
	header('location: siteDatabase.php');
}
 ?>


<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
<form method="POST">
<ul class="form-style-1">
	<h2>Add Item</h2>
    <li><label>Name<span class="required">*</span></label><input type="text" name="name"></li>

    <li><label>Description<span class="required">*</span></label><input type="text" name="description"></li>

    <li><label>Upload image</label><input type="file" name="pic"></li>

    <li><input type="submit" name="add" value="Add Item"/></li>
    <li><input type="submit" name="cancel" value="Cancel"/></li>
</ul>
</form>

</body>
</html>
