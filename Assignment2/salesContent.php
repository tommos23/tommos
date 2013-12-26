<?php
/*
Written by Aaron Thompson and Robert Chisholm

This gives the sales page its content. Individual comments below

*/
/*
	This function builds the email using a pre-prepared template and replacing the tags as required (much like the paging templaet system).
*/
	function buildEmail($selections){
		$emailPath = "templates/email.tpl";
		if (file_exists($emailPath)){
			$emailHTML = file_get_contents($emailPath);
		}else{
			die("Email template $contentPath was not found.");
		}
		$itemsString = "";
		$cumPrice = 0;
		foreach($selections as $j){//For every product (add it to the email)
			$result = mysql_query("SELECT id, title, price, stock FROM lightShop WHERE id = '$j';")
				or die("Sorry search failed please try again<br />\n");
			$details = mysql_fetch_array($result);
			if($details)
			{
				if($details{'stock'}>0){//Product is instock, so we must increase total price, decrease stock count and add its string to our email.
					$cumPrice = $cumPrice + $details{'price'};
					$itemsString=$itemsString."Item: ".$details{'title'}."\nQuantity: 1\nCost: £".$details{'price'}."\n\n";
					mysql_query("UPDATE lightShop SET stock=stock-1 WHERE id=".$details{'id'})
						or die("Could not decrease stock count<br />\n");
				}else{//Product is out of stock, so lets write something else
					$itemsString=$itemsString."Currently out of stock, item has not been charged/ordered: ".$details{'title'}."\n\n";
				}
			}
		}
		mysql_free_result($result);
		$date = date("F j, Y", strtotime(date("F j, Y", strtotime(date("F j, Y"))) . " +5 days"));//Delivery time of 5 days (not compensating for weekends)
		$cumPrice = money_format('%i', $cumPrice);//Convert our total price to money format so we dont lose any decimal places
		$emailHTML = str_replace ("{ORDER_ID}", md5(array_product($_POST).date("F j, Y")), $emailHTML);//Generate a unique order id via md5 hash of products, email and current time.
		$emailHTML = str_replace ("{ITEMS}", $itemsString, $emailHTML);//Replace all tags
		$emailHTML = str_replace ("{DELIVERY_DATE}", $date, $emailHTML);
		$emailHTML = str_replace ("{PRICE}", $cumPrice, $emailHTML);
		return $emailHTML;//Return email
	}
	if($_POST)//If we have been posted the user's selection
	{
		include 'validation.php';//Validate with php incase javascript is disabled.
		if(validateEmail($_POST['email'])){
			if(count($_POST) > 1)//Email + any selected items
			{
				$selectionC = array_keys($_POST);
				$selection = NULL;
				foreach ($selectionC as $i){//Fill an array with all the POSTed product id's
					if(stripos($i, "c")===0){//Strip the c from the checkbox id's
						$selection[] = ltrim ( $i, 'c');//this gives us the product id's
					}
				}
				$message = buildEmail($selection);//Build the email reciept
				$header = "From: LightShop Ltd <noreply@LightShop.co.uk>";//Header so they know the sender
				if(mail($_POST['email'], "Purchase Invoice", $message, $header )){
					echo "<h2 id=\"infoHeader\">Your receipt has been sent to ".$_POST['email']."!</h2>\n";
				}else{//If the email fails to send for some reason, inform the user.
					echo "<h2 id=\"infoHeader\">Sorry, we were unable to email your invoice at this time.</h2>\n";
				}
			}
			else//If the user didn't select any products, inform them and return them to a full list of products
			{
				echo "<h2 id=\"infoHeader\">It appears that you didn't select any products to purchase!</h2>\n";
				drawItems("SELECT * FROM $table WHERE stock > '1';");
			}
		}
		else//If the user entered an invalid email address (and has javascript disabled), inform them and return them to a full list of products
		{
			echo "<h2 id=\"infoHeader\">You failed to enter a valid email address!</h2>\n";
			drawItems("SELECT * FROM $table WHERE stock > '1';");
		}
	}
	elseif(isset($_REQUEST['search']))
	{
		$query = mysql_real_escape_string($_REQUEST['search']);//Remove any malicious code
		echo "<h2>Search results for: $query</h2>";
	//Pass our search sql string to the drawItems method
		drawItems("SELECT * FROM $table WHERE title LIKE '%$query%' OR overview LIKE '%$query%' OR url LIKE '%$query%' OR cat LIKE '%$query%';");
	}
	elseif(isset($_REQUEST['cat']))
	{
		$cat = mysql_real_escape_string($_REQUEST['cat']);//Remove any malicious code
	//Pass our category sql string to the drawItems method
		drawItems("SELECT * FROM $table WHERE cat = '$cat';");
	}
	elseif(isset($_REQUEST['connection']))
	{
		$connection = mysql_real_escape_string($_REQUEST['connection']);//Remove any malicious code
	//Pass our connections sql string to the drawItems method
		drawItems("SELECT * FROM $table WHERE connection = '$connection';");
	}
	else
	{
	//Else pass our all items sql string to the drawItems method
		drawItems("SELECT * FROM $table WHERE stock > '0';");
	}
?>