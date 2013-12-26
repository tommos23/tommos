<?php
/*
Written by Aaron Thompson and Robert Chisholm

This page builds the admin page to be 'evaluated', it does this by replacing various tags within index.tpl with other templates/strings. It First opens a connection to the databaase and sets the title of the page. It then checks to see if every file it is adding to the template is a valid file else it displays an error message. If all of the checks are ok it then adds all of the different pages to the template. It then closes the connection to the database. Templates are great for building php websites because they save you repeating loads of code again and again, this implementation could be further improved via object orientation.
*/
	include 'itemData.php';
	include 'item.php';
	$pageTitle = "Lights 'n' Stuff";
	$templatePath = "templates/index.tpl";
	if (file_exists($templatePath)){
		$templateHTML = file_get_contents($templatePath);
	}else{
		die("Template file $template was not found.");
	}
	$navPath = "nav.php";
	if (file_exists($navPath)){
		$navPHP = file_get_contents($navPath);
	}else{
		die("Template file $navPath was not found.");
	}
	$contentPath = "adminContent.php";
	if (file_exists($contentPath)){
		$contentPHP = file_get_contents($contentPath);
	}else{
		die("Template file $contentPath was not found.");
	}
	$templateHTML = str_replace ("{NAV_BAR}", $navPHP,$templateHTML);//Include the pages dynamic navbar
	$templateHTML = str_replace ("{PAGE_CONTENT}", $contentPHP,$templateHTML);//Include the pages Content
	$templateHTML = str_replace ("{PAGE_TITLE}", $pageTitle,$templateHTML);//Replace the page title with the required page title
	$templateHTML = str_replace ("{PAGE_JS}", "<script type=\"text/javascript\" src=\"resources/javaScript/validation.js\"></script>\n<script type=\"text/javascript\" src=\"resources/javaScript/adminPage.js\"></script>\n",$templateHTML);//This page has no javascript
	$templateHTML = "?>".$templateHTML;//Stop parsing php at the start of template
	eval($templateHTML);
	mysql_close();
?>