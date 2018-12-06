<?php
	/** File gets the customerID and verifies if they entered a correct one */
	include 'connecttodb.php';
	$customerID = $_POST['cusID'];
	$query = 'SELECT CustomerID FROM Customer WHERE CustomerID = "' . $customerID . '"';
	$result = mysqli_query($connection, $query);
	$count = 0;

	if (!$result) {
		die("You entered an incorrect CustomerID");
	}
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<form action = 'deleteCustomer.php' method = 'post'>";
		echo "Your customer ID was accepted";
		echo '<input type = "text" name = "cusID" value = "' . $customerID . '" readonly>'; //for the next form (this is a read only textbox).
		echo '<input type = "submit" value = "Next">';
		echo "</form>";
		$count = $count + 1;	
	}

	if ($count == 0) { //if customer ID wasn't correct
		echo "The customer ID you entered was incorrect";
		echo "<br>";
		echo "<a href = 'index.php'>Home</a>";
	}

	

	


	

?>
