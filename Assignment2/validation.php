<?php
/*
Written by Aaron Thompson and Robert Chisholm

These validations are carried out after the user has submitted their input, they are included incase the user has javascript disabled. All but one use regular expressions to check validity.
*/
	function validateEmail($input){
		//REGEX string courtsey of http://www.white-hat-web-design.co.uk/articles/js-validation.php, others were produced by Robert Chisholm
		$inputReg = "#^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$#";
		return preg_match($inputReg, $input);
	}
	function validateCurrency($input){
		$inputReg = "#^\d{1,3}\.\d{2}$#";//1-3 digits followed by . followed by 2 digits
		return preg_match($inputReg, $input);
	}
	function validateImageURL($input){
		$inputReg = "#^((http://)?([a-zA-Z0-9]+\.)+[a-zA-Z]{2,3}/)?([a-zA-Z0-9/\.])+\.(jpg|jpeg)$#";//Too long to explain in detail, supports full urls (with or without http) and relative urls
		return preg_match($inputReg, $input);
	}
	function validateIntCompleted($input){
		$inputReg = "#^\d+$#";//String is comprised of 1 or more digits
		return preg_match($inputReg, $input);
	}
	function validateWordCompleted($input){
		return (strlen($input.length)>0);//Check something has been entered in the field
	}
	function validateInt($input){
		$inputReg = "#^\d*$#";//String is comprised of 0 or more digits
		return preg_match($inputReg, $input);
	}
?>