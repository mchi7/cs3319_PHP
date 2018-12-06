<?php

/**
	updates the Customer's number to the new one they set in the text box
*/
	include 'connecttodb.php';
	$ID = $_POST['ID'];
	$num = $_POST['newNum'];	
	$query = 'UPDATE Customer SET Number = "' . $num .'" WHERE CustomerID = "' . $ID . '"';
	$result = mysqli_query($connection, $query);
	
	if (!$result) {
		die ("Query was not fetched");
	}   

	echo 'Your number is changed to "' . $num .'"';
	echo "<br>";
	echo "<a href = 'index.php'>Home </a>";  
?>
