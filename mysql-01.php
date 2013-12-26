<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form 1</title>
</head>
<?php
	include="logon.php";
	
	// Connect to the SQL server
	mysql_pconnect($host, $user, $password) // You need to use your OWN details here
	or die("Unable to connect to SQL server<br />\n");
	
	// Select the database
	mysql_select_db('test') // You need to use your OWN database here
	or die("Unable to select database<br />\n");
	
	// Define the table name
	$table = "sql01";
	
	// Create the table if it doesn't yet exist
	$query = "CREATE TABLE IF NOT EXISTS $table  
	("
	  . "id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, "
	  . "name VARCHAR(16),"
	  . "email VARCHAR(32),"
	  . "msg VARCHAR(100),"
	  . "tstamp DATETIME"
	  .");";
	mysql_query($query)
		or die("Failed to create table: " . mysql_error() . "<br />\n") ;

?>

<form action="mysql-01.php" method="get">
	<table border="1">
        <tr>
            <td>Name</td><td><input name="name" type="text" /></td>
        </tr>
        <tr>
            <td>Email</td><td><input name="email" type="text" /></td>
        </tr>
        <tr>
            <td>Message</td><td><textarea name="message" cols="30" rows="10"></textarea></td>
        </tr>
  		<tr>
        	<td align="center" colspan="2">
			<input type="submit" value="   Submit   " name="submit" />
			<input type="submit" value="   Retrieve   " name="retrieve" />
			</td>
        </tr>
    </table>
</form>

<body>
</body>
</html>

