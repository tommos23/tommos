<?php
/*
Written by Aaron Thompson and Robert Chisholm

This is page contains a method which when given a parameter of an sql query it will output all the returned items in a structured table. (It is seperated to keep sales.php cleaner)
*/
function drawItems($sqlQuery){
	$result = mysql_query($sqlQuery)
		or die("Sorry search failed please try again<br />\n");
	$details = mysql_fetch_array($result);
	if($details)//If we have any results.
	{
		echo"<form action=\"sales.php\" method=\"post\" id=\"productSelectForm\" onsubmit=\"return validateEmail('productSelectForm','email',true)\">\n";//Form will call js on submission, we use post to get away from char limit
		while($details)//Loop through every returned item
		{
			$id = $details{'id'};
			$title = $details{'title'} ? $details{'title'} : '&nbsp;';
			$url = $details{'url'} ? $details{'url'} : '&nbsp;';
			$width = $details{'width'} ? $details{'width'} : '&nbsp;';
			$height = $details{'height'} ? $details{'height'} : '&nbsp;';
			$price = $details{'price'} ? $details{'price'} : '&nbsp;';
			$stock = $details{'stock'} ? $details{'stock'} : '&nbsp;';
			$overview = $details{'overview'} ? $details{'overview'} : '&nbsp;';
			$specArray = array(0 => "Connection","Colour","Lifetime","Diameter", "Length", "Shape");//This array states all the optional spec points
				$Connection = $details{'connection'} ? $details{'connection'} : '&nbsp;';
				$Colour = $details{'colour'} ? $details{'colour'} : '&nbsp;';
				$Lifetime = $details{'lifeTime'} ? $details{'lifeTime'}.hrs : '&nbsp;';
				$Diameter = $details{'diameter'} ? $details{'diameter'}.mm : '&nbsp;';
				$Length = $details{'length'} ? $details{'length'}.mm : '&nbsp;';
				$Shape = $details{'shape'} ? $details{'shape'} : '&nbsp;';
			echo "<div class=\"itemBox\" id=\"item".$id."\">\n";
			echo  "<img src=\"resources/img/$url\" alt=\"$title&nbsp;(Picture not available)\" title=\"$title\" width=\"$width\" height=\"$height\" style=\"float:right;\"/>\n";
			echo "<h3>$title</h3>\n";
			echo "<p>$overview</p>\n";
			echo "Order product:<input type=\"checkbox\" name=\"c".$id."\" value=\"$id\" />\n";//Checkbox to show if they order
			echo "<a id=\"link".$id."\" class=\"mLink\" style=\"display:inline;\" href=\"javascript:display($id, 'more');\" >More Details..</a>\n";//Links which are handled by JS
			echo "<a id=\"link".$id."less\" class=\"sLink\" style=\"display:none;\" href=\"javascript:display($id, 'less');\">Less Details..</a><br />\n";
			echo "Current Stock: $stock <br />\n";
			echo "Price: &pound;$price <br />\n";
			echo "<div id=\"div".$id."\" style=\"display:none;\">\n";//This div is hidden by JS
			echo "<h3>Specification</h3>\n";
			echo "<table>\n";
			$countLimit = count($specArray);//We now loop through the array of spec points and only display those that have been set
			for ( $counter = 0; $counter < $countLimit; $counter += 1) {
				if(($$specArray[$counter]!='&nbsp;')&&$$specArray[$counter]){
					echo "<tr><th>$specArray[$counter]</th><td>${$specArray[$counter]}</td></tr>\n";
				}
			}
			echo "</table>\n";
			echo "</div>\n";
			echo "</div>\n";
			$details = mysql_fetch_array($result);
			echo "<hr class=\"prodSeperator\"/>\n";
		}
		if(isset($_POST['email']))//If the user has returned because they didn't select products precomplete email for them
		{
			echo "Email for reciept:<input type=\"text\" name=\"email\" value=\"".$_POST['email']."\"
			onblur=\"validateEmail('productSelectForm','email',false);\">&nbsp;";
		}
		else
		{
			echo "Email for reciept:<input type=\"text\" name=\"email\" onblur=\"validateEmail('productSelectForm','email',false);\"/>&nbsp;";
		}
		echo "<input id=\"productSelectSubmit\" type=\"submit\" value=\"Purchase\" />";
		echo "</form>";
	}else{
		echo "<h3>Your search returned no results.</h3>";//We got no results, inform the user
	}
	mysql_free_result($result);//Clear any used memory (not strictly necessary for such a simple method, but it can't hurt)
}
?>