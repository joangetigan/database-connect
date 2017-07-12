<?php 
require 'connection.php';

if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$password = $_POST['password'];
	$retype = $_POST['retype'];

	if ($password==$retype) {
		$password = sha1($password);
		echo "$password";

		$sql = "INSERT INTO users(username,password,role) 
		VALUES('$name','$password','regular')";
		mysqli_query($connect,$sql);

		echo "Registered successfully";
	} else {
		echo "Passwords did not match.";
	}
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
	<h2>Register</h2>
    <li><label>Username<span class="required">*</span></label><input type="text" name="name"></li>

    <li><label>Password<span class="required">*</span></label><input type="password" name="password"></li>

    <li><label>Retype Password<span class="required">*</span></label><input type="password" name="retype"></li>

    <li><input type="submit" name="register" value="Submit"/></li>
</ul>
</form>

</body>
</html>
