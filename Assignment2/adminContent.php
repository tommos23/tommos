<?php
/*
Written by Aaron Thompson and Robert Chisholm

This gives the admin page its content. Individual comments below

*/
/*
This function validates all validatable fields on adminform when called.
*/
function validateInputs(){
	include 'validation.php';//Validate with php incase javascript is disabled.
	//The following if statements do php validation (see validation.php for comments)
	if(!validateWordCompleted(mysql_real_escape_string($_REQUEST['title']))){
		echo "You haven't completed the title field, please return and correct the error.";
		return false;
	}elseif(!validateWordCompleted(mysql_real_escape_string($_REQUEST['overview']))){
		echo "You haven't completed the description field, please return and correct the error.";
		return false;
	}elseif(!validateImageURL($_REQUEST['url'])){
		echo "You have entered an invalid image url (it must be a jpeg [.jpg|.jpeg]), please return and correct the error.";
		return false;
	}elseif(!validateIntCompleted(mysql_real_escape_string($_REQUEST['width']))){
		echo "Your image width must be an integer and completed, please return and correct the error.";
		return false;
	}elseif(!validateIntCompleted(mysql_real_escape_string($_REQUEST['height']))){
		echo "Your image height must be an integer and completed, please return and correct the error.";
		return false;
	}elseif(!validateCurrency(mysql_real_escape_string($_REQUEST['price']))){
		echo "You have entered an invalid price, please return and correct the error.";
		return false;
	}elseif(!validateIntCompleted(mysql_real_escape_string($_REQUEST['stock']))){
		echo "Your item stock must be an integer and completed, please return and correct the error.";
		return false;
	}elseif(!validateInt(mysql_real_escape_string($_REQUEST['lifetime']))){
		echo "Your lifetime must be a valid integer, please return and correct the error.";
		return false;
	}elseif(!validateInt(mysql_real_escape_string($_REQUEST['diameter']))){
		echo "Your diameter must be a valid integer, please return and correct the error.";
		return false;
	}elseif(!validateInt(mysql_real_escape_string($_REQUEST['lgth']))){
		echo "Your length must be a valid integer, please return and correct the error.";
		return false;
	}else{
		return true;
	}
}
/*
This is called if the add button is pressed it creates the form in which the user can add items to the database using the include 'adminForm'
*/
if(isset($_REQUEST['add']))
{
echo "		<form id=\"adminForm\" action=\"admin.php\" onsubmit=\"return validateAdminSubmit()\"> \n";
echo "	<table class=\"adminTbl\"> \n";
$whichSubmit = "<td><input name=\"submit\" type=\"submit\" value=\"  Submit  \"/></td>";

include 'adminForm.php';

}

/*
This is called when the user clickes the edit/ delete button. This creates a dropdown box for the user to select a title of a product from, the id is recorded as the value so items with the same title are not confused.
*/
if(isset($_REQUEST['edit']))
{
	$query = "SELECT * FROM $table WHERE stock > '0';";
	$result = mysql_query($query) 
				or die("Unable retrieve data " . mysql_error() . "<br />\n");	
	$row = mysql_fetch_array($result);
		if($row)
		{
			echo "<form action=\"admin.php\"> \n";
			echo "Select the title of the record you want <select name=\"titleSelect\"> \n";
			while($row)
			{
						
				$title = $row{'title'} ? $row{'title'} : '&nbsp;';
				$id = $row{'id'} ? $row{'id'} : '&nbsp;';
				echo "<option value=\"$id\">$title</option> \n";
				
				
				$row = mysql_fetch_array($result);
			}
			echo "</select> \n";
			echo "<input name=\"get\" type=\"submit\" value=\"  Submit  \" /> \n";
			echo "</form> \n";
		}
		else
		{
			echo "No items in database \n";
		}
	mysql_free_result($result);
}
/*
Once the user has selected a item from the dropdown box a form appaers with the current information on that entry in the different fields already. This allows the user to edit the item easier. this is done by getting all of the values corresponding to one id and setting the value of each textbox to that value.
*/
else if(isset($_REQUEST['get']))
{
		$titleSelect = mysql_real_escape_string($_REQUEST['titleSelect']);
		
		$query = "SELECT * FROM $table WHERE id = '$titleSelect';";
		$result = mysql_query($query) 
				or die("Unable to get data: " . mysql_error() . "<br />\n");
		$row = mysql_fetch_array($result);
		if($row)
		{
			echo "		<form id=\"adminForm\" action=\"admin.php\"  onsubmit=\"return validateAdminSubmit()\"> \n";
			echo "		<table class=\"adminTbl\"> \n";

				$id = $row{'id'} ? $row{'id'} : '';
				$title = $row{'title'} ? $row{'title'} : '';
				$url = $row{'url'} ? $row{'url'} : '';
				$width = $row{'width'} ? $row{'width'} : '';
				$height = $row{'height'} ? $row{'height'} : '';
				$price = $row{'price'} ? $row{'price'} : '';
				$stock = $row{'stock'} ? $row{'stock'} : '';
				$overview = $row{'overview'} ? $row{'overview'} : '';
				$cat = $row{'cat'} ? $row{'cat'} : '';
				$connection = $row{'connection'} ? $row{'connection'} : '';
				$colour = $row{'colour'} ? $row{'colour'} : '';
				$lifetime = $row{'lifeTime'} ? $row{'lifeTime'} : '';
				$diameter = $row{'diameter'} ? $row{'diameter'} : '';
				$length = $row{'length'} ? $row{'length'} : '';
				$shape = $row{'shape'} ? $row{'shape'} : '';
				
				echo " 		<tr> \n";
				echo "        <td>ID</td><td><input name=\"id\" type=\"text\" value=\"$id\" readonly=\"readonly\" /></td> \n";
				echo "      </tr> \n";
				$whichSubmit = "<td><input name=\"submitEdit\" type=\"submit\" value=\"  Submit  \"/></td>
								<td><input name=\"submitDelete\" type=\"submit\" value=\"  Delete  \"/></td>";
				include 'adminForm.php';
				
		
		$result = mysql_query($query) 
				or die("Unable to get data: " . mysql_error() . "<br />\n");
		}
		else
		{
			echo "Sorry no items in database";	
		}
		mysql_free_result($result);
}
/*
This is called when the user clicks the submit button in the add page. This gets all of the values from the textboxes (usning mysql_real_escape_string to stop mySQL injection) and sets them as values these values are then inserted into the database.
*/
else if(isset($_REQUEST['submit']))
{
		if(validateInputs()){
			$title = mysql_real_escape_string($_REQUEST['title']);
			$overview = mysql_real_escape_string($_REQUEST['overview']);
			$url = mysql_real_escape_string($_REQUEST['url']);
			$width = mysql_real_escape_string($_REQUEST['width']);
			$height = mysql_real_escape_string($_REQUEST['height']);
			$price = mysql_real_escape_string($_REQUEST['price']);
			$stock = mysql_real_escape_string($_REQUEST['stock']);
			$cat = mysql_real_escape_string($_REQUEST['cat']);
			$lifeTime = mysql_real_escape_string($_REQUEST['lifeTime']);
			$colour = mysql_real_escape_string($_REQUEST['colour']);
			$shape = mysql_real_escape_string($_REQUEST['shape']);
			$connection = mysql_real_escape_string($_REQUEST['connection']);
			$diameter = mysql_real_escape_string($_REQUEST['diameter']);
			$length = mysql_real_escape_string($_REQUEST['lgth']);
			$query = "INSERT INTO $table(title, url, width, height, price, stock, cat, lifeTime, overview, colour, shape, connection, diameter, length)" . "VALUES('$title', '$url', '$width', '$height', '$price', '$stock', '$cat', '$lifeTime', '$overview', '$colour', '$shape', '$connection', '$diameter', '$length');";
			mysql_query($query) 
				or die("Unable to insert new data: " . mysql_error() . "<br />\n");	
			echo "Item: $title added succesfully! \n";
		}
}
/*
This is called when the user clicks on the submit button in the edit delete page. it gets all of the values from the fields in the form and sets them as valued again using mysql_real_escape_string. This time though the values are updated according to which id the user is on.
*/
else if(isset($_REQUEST['submitEdit']))
{
		if(validateInputs){
			$id = mysql_real_escape_string($_REQUEST['id']);
			$title = mysql_real_escape_string($_REQUEST['title']);
			$overview = mysql_real_escape_string($_REQUEST['overview']);
			$url = mysql_real_escape_string($_REQUEST['url']);
			$width = mysql_real_escape_string($_REQUEST['width']);
			$height = mysql_real_escape_string($_REQUEST['height']);
			$price = mysql_real_escape_string($_REQUEST['price']);
			$stock = mysql_real_escape_string($_REQUEST['stock']);
			$cat = mysql_real_escape_string($_REQUEST['cat']);
			$lifeTime = mysql_real_escape_string($_REQUEST['lifeTime']);
			$colour = mysql_real_escape_string($_REQUEST['colour']);
			$shape = mysql_real_escape_string($_REQUEST['shape']);
			$connection = mysql_real_escape_string($_REQUEST['connection']);
			$diameter = mysql_real_escape_string($_REQUEST['diameter']);
			$length = mysql_real_escape_string($_REQUEST['lgth']);
			
			$query = "UPDATE $table SET title = '$title', url = '$url', width = '$width', height = '$height', price = '$price', stock = '$stock', cat = '$cat', lifeTime = '$lifeTime', overview = '$overview', colour = '$colour', shape = '$shape', connection = '$connection', diameter ='$diameter', length = '$length' WHERE id = '$id' ;";
			mysql_query($query) 
				or die("Unable to insert new data: " . mysql_error() . "<br />\n");	
		echo "Item: $title updated succesfully! \n";
	}
}
/*
This is called when the user clicks on the delete button in the edit / delete page. this just deletes whatever item they selected from the list based on what id that item had.
*/
else if(isset($_REQUEST['submitDelete']))
{
		$id = mysql_real_escape_string($_REQUEST['id']);
		
		$query = "DELETE FROM $table WHERE id = '$id';";
		mysql_query($query) 
				or die("Unable to insert new data: " . mysql_error() . "<br />\n");	
		echo "Item id: $id Deleted \n";
}

?>
<hr />
<!--This is the form to allow the user to add or edit/delte using two submit buttons-->
<form action="admin.php">
	<p>Add a new record to the database <input name="add" type="submit" value="  Add Record  " /></p>
	<p>Edit or Delete an existing record in the database <input name="edit" type="submit" value="  Edit / Delete Record  " /></p>
</form>