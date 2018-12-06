<?php
	include 'connecttodb.php';
	$quan = $_POST['quantity']; 
	$prod = $_POST['prodID'];
	$query = 'SELECT Customer.FirstName, Customer.LastName, Product.Description, Purchases.Quantity FROM Product INNER JOIN Purchases ON Product.ProductID=Purchases.ProductID INNER JOIN Customer ON Purchases.CustomerID=Customer.CustomerID WHERE Product.ProductID="'. $prod .'" AND Purchases.Quantity > "'.$quan.'"';   	
	$result = mysqli_query($connection, $query);

	if (!$result) {
		die("failed to fetch query");
	}

	if (mysqli_num_rows($result) == 0) { //if there aren't rows returned
		echo "<a href = 'index.php'>Home</a>" . "<br>";
		die ("No products were found with that many purchases");
	}
	
	while ($row = mysqli_fetch_assoc($result)) { //otherwise display
		echo "<li>";
		echo "First Name: " . $row["FirstName"] . ", ";
		echo "Last Name: " . $row["LastName"] . ", ";
		echo "Product: " . $row["Description"] . ", ";
		echo "Product ID: " . $prod . ", ";
		echo "Quantity: " . $row["Quantity"] . "</li>";
	}
	mysqli_free_result($result);
	mysqli_close($connection);
	
	echo "<a href = 'index.php'> Home </a>";

?>
