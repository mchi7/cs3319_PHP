/**
	Retrieves the customer data from the database
*/
<?php
include 'connecttodb.php';

$query = "SELECT * FROM Customer ORDER BY LastName ASC"; //order by lastname
$result = mysqli_query($connection,$query);

if (!$result) {
    die("databases query failed.");
}

$CustomerID = "CustomerID";
$FirstName = "FirstName";
$LastName = "LastName";
$City = "City";
$Number = "Number";
$AgentID = "AgentID";

while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value ='";  //assign each value for select
	echo $row[$CustomerID] . "'>";
	echo $row[$CustomerID] . ", ";
	echo $row[$FirstName] . ", ";
	echo $row[$LastName] . ", ";
	echo $row[$City] . ",  ";
	echo $row[$Number]. ",  ";
	echo $row[$AgentID] . "</option>";
}

mysqli_free_result($result);
mysqli_close($connection);

?>
