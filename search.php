<?php 

if (isset($_POST['search'])) {
	require 'connection.php';
	$search_query = $_POST['search_query'];
	$search_column = $_POST['search_column'];
	$sql = "SELECT * FROM items WHERE $search_column
	LIKE '%search_query%'";
	$result = mysqli_query($connect,$sql);
	echo "$sql <br><hr>";
	while ($row = mysqli_fetch_assoc($result)) {
		extract($row);
		echo "$name $subname $price <br>";
	}

}

 ?>