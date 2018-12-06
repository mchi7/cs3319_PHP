<?php
	include 'connecttodb.php';
	
	$query = "SELECT Description FROM Product LEFT JOIN Purchases ON Purchases.ProductID = Product.ProductID WHERE Purchases.CustomerID IS NULL"; //joins a bunch of tables to retrieve query data
	$result = mysqli_query($connection, $query);

	if (!$result) {
		die("Failed to fetch query");
	}

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo $row['Description'] . "<br>";
		echo "</li>";
	}

	mysqli_free_result($result);
	mysqli_close($connection);

?>
