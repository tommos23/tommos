<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create a User Function</title>
<?php
function myFunction($company) {
	print("<p>Welcome to $company</p>");
}
?>
</head>

<body>
<h3>Start</h3>

<?php
$company = "Acme Auto";
myFunction($company);
?>

<h3>End</h3>

</body>
</html>