<?php

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"> \n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\"> \n";
echo "<head> \n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n";
echo "<meta content=\"Aarons Website\" content=\"About Me\" /> \n";
echo "<title>$title</title> \n";
echo "<meta name=\"description\" content=\"A website about me, from personal profile, course information to how I made the website\"/> \n";
echo "<meta name=\"keywords\" content=\"Aaron, Thompson, Aaron Thopmpson, Personal profile, About my course, How I made the website\"/> \n";
echo "<meta name=\"author\" content=\"Aaron Thompson\"/> \n";
echo "<link title=\"Custom: Default\" href=\"default.css\" rel=\"stylesheet\" type=\"text/css\" /> \n";
echo "<link  href=\"IndexImg/favicon.ico\" rel=\"shortcut icon\" type=\"image/x-icon\" /> \n";
echo "</head> \n";
echo "<body> \n";
echo " \n";

echo "<div id=\"wrapper\"> \n";
echo "<div id=\"shaddow\"> \n";
echo "<div id=\"containerInShaddow\"> \n";
echo "<div id=\"banner\"> \n";
echo "<img src=\"IndexImg/$banner.jpg\" alt=\"Aaron Thompson's Website\" width=\"604\" height=\"100\" /> \n";
echo "</div> \n";


include 'menu.php';
echo "<div id=\"content\"> \n";

?>

