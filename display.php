<?php 
require_once 'connection.php';

$sql = "SELECT firstName,lastName FROM employees";

$result = mysqli_query($connect,$sql);

if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {			//from row to assoc array
		echo $row['firstName']." ".$row['lastName']."<br>";
	}	
}

echo "<br>";


$sql = "SELECT * FROM employees";

$result = mysqli_query($connect,$sql);

if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {			//from row to assoc array
		extract($row);
		echo $firstName." ".$lastName."<br>";
	}	
}

 ?>
