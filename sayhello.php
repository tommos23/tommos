<?php
$Mname = $_REQUEST['name'];
if(strlen($Mname) <= 0)
{
	echo "Hello Stranger";
}
else
{
	echo "Hello $Mname";
}
?>