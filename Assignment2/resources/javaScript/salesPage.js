/*
Written by Aaron Thompson and Robert Chisholm

This function just calls any javascript to be ran onload of sales.php
*/
function validateOnLoad() {
	validateEmail('productSelectForm','email',false);
}
window.onload = validateOnLoad;//You can't call a function with parameters on window onload, how silly is that?