<!DOCTYPE html>
<html>

<!-- This file will be the homepage/main page for all the functions we
needed to implement. I did not comment much for this file because it
is pretty basic html code --> 

<head>
<link rel= "stylesheet" type = "text/css" href="style.css">
<title> CS 3319 Assignment 3 </title>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1> Customers </h1>
<p>

<form action = "getPurchases.php" method = "post">
	Select a Customer:	
	<select name = "customer" id = "customer">
		<option value = "1"> Select </option>
		<?php
			//for the select menu
			include 'getCustomerData.php';
		?>
	</select>
	<br>
<input type = "submit" value = "submit">
</form>

</p>

<h2> Products </h2>
<p>
<form action = "getProducts.php" method = "post">
<legend> Sort Products by Price or Name: </legend>
<input type = "radio" name = "sortBy" value = "Description"> By Product Name <br>
<input type = "radio" name = "sortBy" value = "Cost"> By Price <br>

<br>

<legend> Sort by Ascending or Descending Order: </legend>
<input type = "radio" name = "AorD" value = "ASC"> Ascending <br>   
<input type = "radio" name = "AorD" value = "DESC" > Descending <br>
</p>
<input type = "submit" value = "Get Products">
</form>

<h3> Insert a New Purchase </h3>

<form action = "addPurchase.php" method = "post">
	Select a customer:
	<select name = "customerPurch" id = "customerPurch">
	<option value = "1"> Select </option>
	<?php
		include 'getCustomerData.php';
	?>
	</select>

	<br>
	Select a product:

	<select name = "product" id = "product">
		<option value = "1"> Select </option>
		<?php
			include "getAllProducts.php";
		?>
	</select>
	<br>
	Quantity: <input type = "text" name = "quan"> <br>
	<input type = "submit" value = "submit"> <br>
</form>


<form action = "addCustomer.php" method = "post">
	<h3> Insert a Customer: </h3>
	Customer ID: <input type = "text" name = "ID"> <br>
	First Name: <input type = "text" name = "firstName"> <br>
	Last Name: <input type = "text" name = "lastName"> <br>
	City: <input type = "text" name ="city"> <br>
	Phone #: <input type = "text" name = "phone"> <br>
	Agent: <input type = "text" name = "agentID">
	<input type = "submit" value = "Submit">
</form>


<form action = "getCustomerNum.php" method = "post">
	<h3> Update a Customer's Number: </h3>
	Enter your Customer ID:
	<input type = "text" name = "ID" value = "ID">
	<input type = "submit" value = "Submit">	
</form>

<form action = "getCustomerID.php" method = "post">
	<h3> Delete a Customer: </h3>
	Enter the Customer ID:
	<input type = "text" name = "cusID">
	<input type = "submit" value = "Submit">
</form>

<form action = "Q7.php" method = "post">
	<h3> Display the customers who have bought more than a given quantity of a product </h3>
	Product ID: <input type = "text" name = "prodID">
	Quantity: <input type = "text" name = "quantity">
	<br>
	<input type = "submit" value = "Submit">
</form>


<h3> Products that have never been purchased: </h3>
<?php
	include 'Q8.php';
?>	

<h3> Total Revenue for a Product: </h3>
<form action = 'Q9.php' method = 'post'>
	Please enter a Product ID:
	<input type = "text" name = "ID">	
	<input type = "submit" value = "Submit">
</form>

</body>
</html>

