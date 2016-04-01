//define a function
function isBlank(inputField){
if (inputField.value==""){
return true;
}
return false;
}

function isValidEmail(email){
var dotPos = email.lastIndexOf(".");//get the position of the last dot.
var atPos = email.lastIndexOf("@");//get the position of the @
if ( dotPos + 2 >= email.length ){
//error, the TLD is less than 2 characters.
return false;
}
if ( atPos + 2 > dotPos ){
//error, the 2nd level domain is less than 2 characters.
return false;
}
if( atPos < 1){
//error, the username is less than 1 character. (or no @)
return false;
}
return true;
}

window.onload = function(){
var mainForm = document.getElementById("mainForm");
mainForm.onsubmit = function(e){

var requiredInputs = document.querySelectorAll(".required");
for (var i=0; i < requiredInputs.length; i++){
if(isBlank(requiredInputs[i]) ){
e.preventDefault();
requiredInputs[i].style.backgroundColor="#AA0000";
requiredInputs[i].parentNode.style.backgroundColor="#AA0000";
requiredInputs[i].parentNode.style.color="#FFFFFF";
}
}
var email = document.getElementById("email");
if(! isValidEmail(email.value)){
e.preventDefault();
email.style.backgroundColor="#AA0000";
email.parentNode.style.backgroundColor="#AA0000";
email.parentNode.style.color="#FFFFFF";
}
}
/*note we need to redefine requiredInputs here, since it is out of the 
previous listener--onsubmit. also this part is out of onsubmit because it 
does not happen when submit*/ 
var requiredInputs = document.querySelectorAll(".required");
for (var i=0; i < requiredInputs.length; i++){
requiredInputs[i].onfocus = function(){
this.style.backgroundColor = "#EEEE00";
}
}
}



