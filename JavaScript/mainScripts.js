
//------------------ signup page validation JS-----------------------
    
function validateName(){
	var x = document.getElementById("name").value;
	if (x == null || x == "") {
		return false;
	} else{
		return true;
	}
}

function validateEmail(){
	var x = document.getElementById("email").value;
	if (x == null || x == "") {
		return false;
	} else{	
		return true;
	}
}

function validateNic(){
	var x = document.getElementById("nic").value;
	if (x == null || x == "") {
		return false;
	} else {
		return true;
	}
}

function validatecontact(){
	var x = document.getElementById("contact").value;
	if (x == null || x == "") {
		return false;
	} else {
		return true;
	}
}

function validateForm(){
	if(validateName() && validateEmail() && validateNic() && validatecontact()){
		alert("Nice!");
	}else{
		alert("Fill all elements!");
	}
}
//------------------ signup page validation JS end -----------------------


//------------------ login page validation JS start -----------------------

function validateLogMail (){
	var x = document.getElementById("email").value;
	if (x == null || x == ""){
		return false;
	}else {
		return true;
	}
}

function validateLogPassword (){
	var x = document.getElementById("password").value
	if (x == null || x == ""){
		return false;
	}else {
		return true;
	}
}

function validateLogForm() {
	if(validateLogMail() && validateLogPassword()){
		alert ("Nice!");
	}else {
		alert ("Invalid Login");
	}
}

//------------------ login page validation JS end -----------------------
