<?php
/**
	This file will connect to the database.
*/

	$dbhost = "localhost";
	$dbuser= "root";
	$dbpass = "cs3319";
	$dbname = "mchi7assign2db";
	$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
	if (mysqli_connect_errno()) {
	     die("database connection failed :" .
	     mysqli_connect_error() .
	     "(" . mysqli_connect_errno() . ")"
	         );
    	}
?>
