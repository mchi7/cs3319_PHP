<!DOCTYPE html>

<html>

<head>

<meta charset = "utf-8">

</head>

<body>

<?php
	include 'connecttodb.php';
?>
<?php
	$ID = $_POST["customer"]; //customer ID
	$query = 'SELECT * FROM Purchases WHERE Purchases.CustomerID ="'. $ID . '"';
	$result=mysqli_query($connection,$query);
	if (!$result) { //check result
		die("Database query failed.");
	}

	while ($row = mysqli_fetch_assoc($result)) {
		//display purchases info
		echo "ProductID: " . $row["ProductID"] . "\t";
		echo "CustomerID: " . $row["CustomerID"]. "\t";
		echo "Quantity: " . $row["Quantity"]. "\t". "<br>";
	}
	
	if (mysqli_num_rows($result) == 0) echo "no results were found";

	mysqli_free_result($result);
	echo "<a href = 'index.php'> Home </a>";
?>
<?php
	mysqli_close($connection);
?>
</body>
</html>
