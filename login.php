<?php 
require 'connection.php';
session_start();

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * FROM users
	WHERE username='$username'
	AND password='$password'";

	$result = mysqli_query($connect,$sql);

	if (mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_assoc($result)) {
			extract($row);
		$_SESSION['username']=$username;
		$_SESSION['role']=$role;

		$_SESSION['is_logged_in'] = TRUE;
		if ($_SESSION['role']=='admin') {
			$_SESSION['is_admin']=TRUE;
		}

		$_SESSION['message'] = "Hi $username";

		header('location:siteDatabase.php');
		}
	} else {
		echo "Not yet registered.";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
<form method="POST">
<ul class="form-style-1">
	<h2>Log In</h2>
    <li>
    	<label>Username<span class="required">*</span></label><input type="text" name="username">
    </li>

    <li>
    	<label>Password<span class="required">*</span></label><input type="password" name="password"> 
 	</li>   
    
    <li>
    	<input type="submit" name="login" value="Submit">
    </li>
    <li>
    	<a href="register.php" target="block">Not yet a member?</a>
    </li>
</ul>
</form>

</body>
</html>
