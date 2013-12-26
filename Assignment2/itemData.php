<?php
/*
Written by Aaron Thompson and Robert Chisholm

This connects the the database. It first connects to the server using the credntials on the logon page, then selects the actual database called wit5. Then connects to the table, if the table has not been created it makes a new one with the correct fields.
*/
	include 'logon.php';
	
	// Connect to the SQL server
	mysql_connect($host, $user, $password)
	or die("Unable to connect to SQL server<br />\n");
		
	// Select the database
	mysql_select_db('tommos_assign2')
	or die("Unable to select database<br />\n");
	
	// Define the table name
	$table = "lightShop";
	
	// Create the table if it doesn't yet exist
	$query = "CREATE TABLE IF NOT EXISTS $table ("
	  . "id INT AUTO_INCREMENT PRIMARY KEY, "
	  . "url VARCHAR(75),"
	  . "title VARCHAR(30),"
	  . "width INT(5),"
	  . "height INT(5),"
	  . "price DECIMAL(3,2),"
	  . "stock INT(4),"
	  . "cat VARCHAR(25),"
	  . "colour VARCHAR(50),"
	  . "lifeTime INT(10),"
	  . "overview VARCHAR(1000),"
	  . "shape VARCHAR(20),"
	  . "diameter VARCHAR(10),"
	  . "length VARCHAR(10),"
	  . "connection VARCHAR(20)"
	  .");";
	mysql_query($query)
		or die("Failed to create table: " . mysql_error() . "<br />\n") ;
?>