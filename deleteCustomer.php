<?php
	/** Delete the customer from the database based on their ID
	*/

	include 'connecttodb.php';

	$cusID = $_POST['cusID'];
	$query = "DELETE FROM Customer WHERE CustomerID = '" . $cusID . "'";
	$result = mysqli_query($connection, $query);	

	if (!$result) {
		die("Could not delete the user.");
	}
	
	echo "The customer was deleted";

	echo "<a href = 'index.php'>Home</a>";		


?>
