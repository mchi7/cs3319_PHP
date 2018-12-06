<!DOCTYPE html>
<html>
<body>
<?php
	include 'connecttodb.php';
	$ID = $_POST['ID'];
	$query = "SELECT Number FROM Customer WHERE CustomerID = " . $ID . ";";
	$result = mysqli_query($connection, $query);
	
	if (!$result) {
		die ("Query failed");
	}
	
	if (mysqli_num_rows($result) == 0) { //if they didn't enter the right number
		die ("The user entered the wrong Customer ID");
	}
	
	while ($row = mysqli_fetch_assoc($result)) {	
		echo "<h3> Your current number is </h3>";
		echo $row["Number"];
	}

	echo "<form action = 'updateCustomerNum.php' method = 'post'>"; //go to update after checking the number 
	echo "<h3> Please enter a new number </h3>";
	echo "<input type = 'text' name = 'newNum'>";
	echo "Your Customer ID:";
	echo '<input type = "text" name = "ID" value = "'. $ID . '" readonly>'; //read only textbox for updateCustomerNum.php
	echo "<input type = 'submit' value = 'Submit'>";	//submit button
	echo "</form>";
?>
</body>
</html>

