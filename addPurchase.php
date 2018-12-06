
<?php
	/** This file will add the purchase based on the input. */
	include "connecttodb.php" //connect to the db
?>

<?php
	$customerID = $_POST["customerPurch"];
	$prod = $_POST["product"];
	$quantity = $_POST["quan"];
	$tempQuery = "SELECT Quantity FROM Purchases WHERE ProductID = '". $prod . "' AND CustomerID = '" . $customerID. "'; ";
	$tempResult = mysqli_query ($connection, $tempQuery);
	
	if (mysqli_num_rows($tempResult) == 0) { //if no existing records
		$query = "INSERT INTO Purchases (ProductID, CustomerID, Quantity) VALUES ('" . $prod. "', '" . $customerID . "', ". $quantity . ");";
	}else{ //if there are
		$query = "UPDATE Purchases SET Quantity =" . $quantity . " WHERE ProductID = '" . $prod . "' AND CustomerID='" . $customerID . "'";
	}
	
	$result = mysqli_query($connection, $query);
	
	if (!$result) {
		die("Failed to insert into purchases");
	}
	
	echo "Purchase has been successfully added";
	mysqli_close($connection);
	echo "<a href = 'index.php> Home </a>";
?>
	
