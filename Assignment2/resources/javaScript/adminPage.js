/*
Written by Aaron Thompson and Robert Chisholm

This function just calls any javascript specific to admin.php
*/
function validateAdmin(){//Validate all fields
	validateWordCompleted('adminForm','title',false);
	validateWordCompleted('adminForm','overview',false);
	validateImageURL('adminForm','url',false);
	validateIntCompleted('adminForm','width',false);
	validateIntCompleted('adminForm','height',false);
	validateCurrency('adminForm','price',false);
	validateIntCompleted('adminForm','stock',false);
	validateInt('adminForm','lifeTime',false);
	validateInt('adminForm','diameter',false);
	validateInt('adminForm','lgth',false);
}
function validateAdminSubmit(){//Validate all fields
	if(validateWordCompleted('adminForm','title',true)===false){
		return false;
	}else if(validateWordCompleted('adminForm','overview',true)===false){
		return false;
	}else if(validateImageURL('adminForm','url',true)===false){
		return false;
	}else if(validateIntCompleted('adminForm','width',true)===false){
		return false;
	}else if(validateIntCompleted('adminForm','height',true)===false){
		return false;
	}else if(validateCurrency('adminForm','price',true)===false){
		return false;
	}else if(validateIntCompleted('adminForm','stock',true)===false){
		return false;
	}else if(validateInt('adminForm','lifeTime',true)===false){
		return false;
	}else if(validateInt('adminForm','diameter',true)===false){
		return false;
	}else if(validateInt('adminForm','lgth',true)===false){
		return false;
	}
}
window.onload = validateAdmin;