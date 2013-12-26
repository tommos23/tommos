<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="title" content="Light Shop" /> 
<title>{PAGE_TITLE}</title> 
<meta name="description" content="Lights 'n' Stuff"/> 
<meta name="keywords" content="Aaron Thompson, Robert Chisholm, Lights &amp; Stuff"/> 
<meta name="author" content="Aaron Thompson and Robert Chisholm"/> 
<link title="Custom: Default" href="resources/style.css" rel="stylesheet" type="text/css" /> 
<link rel="shortcut icon" href="resources/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="resources/favico.gif"/>
{PAGE_JS}
</head>
<body> 
	<div id="wrapper">
		<div id="topGroup">
			<div id="logo">
				<a href="sales.php"> <img src="resources/logo.png" width="350" height="100" alt="Light Shop" title="Light Shop" /></a>
			</div>
			<div id="links">
				<a href="../index.php" title="Tommos Home">Tommos Home</a>&nbsp;|&nbsp;<a href="sales.php" title="Home">Home</a>&nbsp;|&nbsp;<a href="admin.php" title="Admin">Admin</a><br/>
			</div>
			<div id="search">
				<form action="sales.php?search=Search">
                	<!--The placeholder does not validate with the w3 validator as it is not a supported attribute, we have left it in as it gives the user a clear instruciton on what the text box is for, witout the need for a seperate title next to it-->
					<input type="text" size="45" maxlength="250" name="search" placeholder="Search..." id="searchText"/>	
					<input type="submit" value="Search" id="searchButton"/>
				</form> 
			</div><br />

		</div>
		<div id="middleGroup">
			<div id="navBar">
				<ul id="menu">
{NAV_BAR}
				</ul>        
			</div>
			<div id="banner">
				<img src="resources/deliveryBanner.png" alt="Free Delivery on all Products" width="735" height="50" title="Free Delivery on all Products" />
			</div>
			<div id="content">
{PAGE_CONTENT}
			</div>
		</div>
		<div id="footGroup"> 
			<div id="footer"> 
				Created by Aaron Thompson &amp; Robert Chisholm 2011 
			</div> 
		</div> 
	</div> 
</body> 
</html>