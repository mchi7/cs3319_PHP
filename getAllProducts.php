/**
	Returns all the product IDs with their associated descriptions.
*/
<?php
	include "connecttodb.php";
	$query = "SELECT * FROM Product;";
	$result = mysqli_query($connection, $query);
	
	if(!$result){
		die("Query failed to load for products");
	}
	
	while($row = mysqli_fetch_assoc($result)) {
		echo "<option value = '";
		echo $row["ProductID"]. "'>";
		echo $row["Description"] . "</option>";
	}
	
	mysqli_free_result($result);
	mysqli_close($connection);
?>
	
