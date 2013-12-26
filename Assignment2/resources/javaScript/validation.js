/*
Written by Aaron Thompson and Robert Chisholm

These validations are carried out client side so the user is visually informed that they have provided invalid inputs and cannot submit the form until these mistakes are fixed.
*/
function validateEmail(formParam,emailParam,submitParam) {//Form containing field, field to check, is this onFormSubmit
	//REGEX string courtsey of http://www.white-hat-web-design.co.uk/articles/js-validation.php, others were produced by Robert Chisholm
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(reg.test(document.forms[formParam].elements[emailParam].value) == false) {
		document.forms[formParam].elements[emailParam].style.border = "2px solid #FF0000";//Sets the border of the field red on failed validation
		if(submitParam){//This exists so we can block submission in the case it is called on form submit
			return false;
		}
	}else{
		document.forms[formParam].elements[emailParam].style.border = "2px solid #00FF00";//Sets the border of the field green on successful validation
	}
}
function validateCurrency(formParam,fieldParam,submitParam) {//Form containing field, field to check, is this onFormSubmit
	var reg = /^\d{1,3}\.\d{2}$/;//1-3 digits followed by . followed by 2 digits
	if(reg.test(document.forms[formParam].elements[fieldParam].value) == false) {
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #FF0000";
		if(submitParam){
			return false;
		}
	}else{
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #00FF00";
	}
}
function validateImageURL(formParam,fieldParam,submitParam) {//Form containing field, field to check, is this onFormSubmit
	var reg = /^((http:\/\/)?([a-zA-Z0-9]+\.)+[a-zA-Z]{2,3}\/)?([a-zA-Z0-9\/\.])+\.(jpg|jpeg)$/;//Too long to explain in detail, supports full urls (with or without http) and relative urls
	if(reg.test(document.forms[formParam].elements[fieldParam].value) == false) {
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #FF0000";
		if(submitParam){
			return false;
		}
	}else{
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #00FF00";
	}
}
function validateIntCompleted(formParam,fieldParam,submitParam) {//Form containing field, field to check, is this onFormSubmit
	var reg = /^\d+$/;//String is comprised of 1 or more digits
	if(reg.test(document.forms[formParam].elements[fieldParam].value) == false) {
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #FF0000";
		if(submitParam){
			return false;
		}
	}else{
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #00FF00";
	}
}
function validateInt(formParam,fieldParam,submitParam) {//Form containing field, field to check, is this onFormSubmit
	var reg = /^\d*$/;//String is comprised of 0 or more digits
	if(reg.test(document.forms[formParam].elements[fieldParam].value) == false) {
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #FF0000";
		if(submitParam){
			return false;
		}
	}else{
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #00FF00";
	}
}
function validateWordCompleted(formParam,fieldParam,submitParam) {//Form containing field, field to check, is this onFormSubmit
	if(document.forms[formParam].elements[fieldParam].value.length == "0") {//Check something has been entered in the field
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #FF0000";
		if(submitParam){
			return false;
		}
	}else{
		document.forms[formParam].elements[fieldParam].style.border = "2px solid #00FF00";
	}
}