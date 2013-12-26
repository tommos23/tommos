<?php
/*
Written by Aaron Thompson and Robert Chisholm

This is Most of the form for the admin page which is echo'ed as it is used for both edit and add it is easier to store it in 
another PHP page and include it where necessary, the start of the page is missing as the edit page displays the ID and the add page does not as the id is generated automatically. 

*/
echo "    	<tr> \n";
echo "        	<td>Product Name</td><td><input name=\"title\" type=\"text\" onblur=\"validateWordCompleted('adminForm','title',false);\" value=\"$title\" maxlength=\"30\"  /></td> \n";
echo "        </tr> \n";
echo "        <tr> \n";
echo "        	<td>Decription</td><td><textarea name=\"overview\" cols=\"30\" rows=\"10\" onblur=\"validateWordCompleted('adminForm','overview',false);\"  >$overview</textarea></td> \n";
echo "        </tr> \n";
echo "        <tr> \n";
echo "        	<td>Image URL</td><td><input name=\"url\" type=\"text\" value=\"$url\"  maxlength=\"50\"
onblur=\"validateImageURL('adminForm','url',false);\" /></td> \n";
echo "        </tr> \n";
echo "        <tr> \n";
echo "        	<td>Image Width</td><td><input name=\"width\" type=\"text\" value=\"$width\" maxlength=\"5\"
onblur=\"validateIntCompleted('adminForm','width',false);\" /></td> \n";
echo "        </tr> \n";
echo "        <tr> \n";
echo "        	<td>Image Height</td><td><input name=\"height\" type=\"text\" 
value=\"$height\" maxlength=\"5\"
onblur=\"validateIntCompleted('adminForm','height',false);\" /></td> \n";
echo "        </tr> \n";
echo "        <tr> \n";
echo "        	<td>Price</td><td>&pound;<input name=\"price\" type=\"text\" onblur=\"validateCurrency('adminForm','price',false);\" value=\"$price\" /></td> \n";
echo "        </tr> \n";
echo "        <tr> \n";
echo "        	<td>Stock Count</td><td><input name=\"stock\" type=\"text\" value=\"$stock\" maxlength=\"4\" 
onblur=\"validateIntCompleted('adminForm','stock',false);\" /></td> \n";
echo "        </tr> \n";
echo "		<tr> \n";
echo "        	<td>Life Time</td><td><input name=\"lifeTime\" type=\"text\" value=\"$lifetime\" maxlength=\"10\" 
onblur=\"validateInt('adminForm','lifeTime',false);\"/>hrs</td> \n";
echo "        </tr> \n";
echo "		<tr> \n";
echo "        	<td>Colour</td><td><input name=\"colour\" type=\"text\" value=\"$colour\" maxlength=\"50\" /></td> \n";
echo "        </tr> \n";
echo "		<tr> \n";
echo "        	<td>Diameter</td><td><input name=\"diameter\" type=\"text\" value=\"$diameter\" maxlength=\"10\" 
onblur=\"validateInt('adminForm','diameter',false);\" />mm</td> \n";
echo "        </tr> \n";
echo "		<tr> \n";
echo "        	<td>Length</td><td><input name=\"lgth\" type=\"text\" value=\"$length\" maxlength=\"10\"
onblur=\"validateInt('adminForm','lgth',false);\" />mm</td> \n";//Length seems to be a reserved word in javascript
echo "        </tr> \n";
echo "		<tr> \n";
echo "        	<td>Shape</td><td><input name=\"shape\" type=\"text\" value=\"$shape\" maxlength=\"20\" /></td> \n";
echo "        </tr>	 \n";
echo "		<tr> \n";

echo "        	<td>Connection</td> \n";
echo "            <td><select name=\"connection\"> \n";
if(isset($id)){//Saves having a huge loop 
	echo "<option selected=\"selected\" value=\"$connection\">$connection</option> \n";
}else{
	echo "<option value=NULL>Choose a Connection</option> \n";
}
echo "            <option value=\"Small Edison Screw\">Small Edison Screw</option> \n";
echo "            <option value=\"Edison Screw\">Edison Screw</option> \n";
echo "            <option value=\"Small Bayonet\">Small Bayonet</option> \n";
echo "            <option value=\"Bayonet\">Bayonet</option> \n";
echo "            <option value=\"GU10\">GU10</option> \n";
echo "            <option value=\"MR16\">MR16</option> \n";
echo "			<option value=\"T4\">T4</option> \n";
echo "			<option value=\"T5\">T5</option> \n";
echo "			<option value=\"T8\">T8</option> \n";
echo "            </select> \n";
echo "            </td> \n";
echo "        </tr>		 \n";
echo "        <tr> \n";
echo "        	<td>Bulb Type</td> \n";
echo "            <td><select name=\"cat\"> \n";
if(isset($id)){//Saves having a huge loop 
	echo "<option selected=\"selected\" value=\"$cat\">$cat</option> \n";
}else{
	echo "<option value=NULL>Choose a Type</option> \n";
}
echo "            	<option value=\"Energy Efficient\">Energy Efficient</option> \n";
echo "            	<option value=\"High Intensity\">High Intensity</option> \n";
echo "            	<option value=\"Fluorescent\">Fluorescent</option> \n";
echo "				<option value=\"Compact Fluorescent\">Compact Fluorescent</option> \n";
echo "				<option value=\"Halogen\">Halogen</option> \n";
echo "				<option value=\"Incandescent\">Incandescent</option> \n";
echo "				<option value=\"LED\">Light Emitting Diode (LED)</option> \n";//.($cat=="LED")?"selected=\"true\"";
echo "            </select> \n";
echo "            </td> \n";
echo "        </tr> \n";
echo "        <tr> \n";
echo "        	$whichSubmit \n";
echo "		</tr> \n";
echo "    </table> \n";
echo "</form> \n";
?>
