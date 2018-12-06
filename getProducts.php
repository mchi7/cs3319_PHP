<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Products</title>
</head>
<body>
<?php	
	include 'connecttodb.php';
?>
<?php
	$whichSort = $_POST["sortBy"]; //checks for Price or Description
	$order = $_POST["AorD"]; //ASCENDING OR DESCENDING order
	$query = "SELECT * FROM Product ORDER BY " . $whichSort . " " . $order . ";"; 
	$result = mysqli_query ($connection, $query);
	if (!$result) {
		die("Database query failed to retrieve products");
	}
	
	echo "<ul>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>"; //list
		//display info
		echo $row["Description"] . "\t";
		echo " Price: $". $row["Cost"] . "\t";
		echo " Quantity: " . $row["Quantity"] . "</li>";
	}
	echo "</ul>";
	echo "<a href='index.php'> Home </a>"; //home hyperlink
	mysqli_free_result($result);
	mysqli_close($connection);
?>
