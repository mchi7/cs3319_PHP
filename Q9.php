<?php
	include 'connecttodb.php';
	
	$prodID = $_POST['ID'];
	$query = "SELECT Description, Cost, SUM(Purchases.Quantity) AS sumTotal FROM Purchases JOIN Product ON Purchases.ProductID = Product.ProductID WHERE Purchases.ProductID = '" . $prodID ."' "; //sums every column of purchases for an item and displays it
	$result = mysqli_query($connection, $query);
	
	if (!$result) {
		die("Database query fail");
	}
	
	while ($row = mysqli_fetch_Assoc($result)) {
		$total = $row['sumTotal'] * $row['Cost'];
		echo $row['Description'] . " total sales: $ " . $total;
	}

	mysqli_free_result($result);
	mysqli_close($connection);
	echo "<br>";
	echo "<a href = 'index.php'> Home </a>";
?>
