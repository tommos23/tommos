<?php
/*
Written by Aaron Thompson and Robert Chisholm

This  function dynamically creates the navbar that is used on all pages to include all types and connections. It first starts the unordered list, gets all of the categories and then all of the connection types as these are displayed in seperate menu blocks. It then creates the title of each menu group and then loops throgh adding each category and connection type to the list.

*/
	function outputNav($choice, $choiceTyped) {
		echo	"<li class=\"navTitle\">$choiceTyped</li>\n";
		$query = "SELECT $choice FROM lightShop ORDER BY $choice";
		$result = mysql_query($query)
			or die("No Categories returned from table.");
		$itemCat = NULL;
		$cItem = mysql_fetch_array($result);
		if($cItem){
			while($cItem) {
				if($itemCat != $cItem{$choice})
				{
					$itemCat = $cItem{$choice};
					$encodedItemCat = urlencode($itemCat);
					echo	"<li><a href=\"sales.php?$choice=$encodedItemCat\" title=\"$itemCat\" class=\"navItem\">$itemCat</a></li>\n";
				}
				$cItem = mysql_fetch_array($result);
			}
		}
		mysql_free_result($result);
	} 
	echo 	"<li class=\"navTitleLink\"><a href=\"sales.php\">Home</a></li>\n";
	outputNav("cat","Bulb Types");
	outputNav("connection", "Bulb Connections");
?>