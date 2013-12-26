<?php

$GoodUser = "Aaron";
$GoodPassword = "acme";

if (($_POST["user"] == $GoodUser) && ($_POST["password"] == $GoodPassword)){
	echo "<b>Acme User Name and Password Verified!</b>";
}
else {
	echo "Wrong password or password";
}
?>