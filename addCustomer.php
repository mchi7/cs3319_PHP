
<?php
/**
	This file will add the customer based on the info provided by the
	text boxes.
*/


	include "connecttodb.php";
	
	//getting textbox info
	$ID = $_POST["ID"];
	$first = $_POST["firstName"];
	$last = $_POST["lastName"];
	$city = $_POST["city"];
	$phone = $_POST["phone"];
	$agent = $_POST["agentID"];	
	$query = "SELECT CustomerID FROM Customer";
	$tempResult = mysqli_query($connection, $query);
	
	if (!$tempResult) {
		die ("database failed to get customerID");
	}
	
	//check if the CustomerID is in the database already
	while ($row = mysqli_fetch_assoc($tempResult)) {
		if($row["CustomerID"] == $ID) $exist=1;	
	} 
	
	if ($exist == 1) {
		echo "Someone already has that ID";
	}else{ //if they don't exist
	
		$query2 =  "INSERT INTO Customer(CustomerID, FirstName, LastName, City, Number, AgentID) VALUES ('" . $ID . "', '" . $first . "', '" . $last . "', '" . $city . "', '" . $phone . "', '" . $agent . "');";
		$result = mysqli_query($connection, $query2);
	
		if (!$result) {
			die("Customer was failed to be added");
		}
		
		echo "The customer was added" . "<br>";
	}
	mysqli_free_result($tempResult);
	mysqli_close($connection);
	echo "<a href = 'index.php'> Home </a>"; //provide a link to index
?> 

	

	
