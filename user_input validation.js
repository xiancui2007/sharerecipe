function isBlank(inputField){
if (inputField.value==""||inputField.value==null){
return true;
}
return false;
}
function blankRadio(radios) {
for (i = 0; i < radios.length; i++)
    {
        if (radios[i].checked) {return false;}
    }
    return true;
}
function wrongDishName(inputtxt) {
  var letters=/^['"_-\sa-zA-Z]+$/
 if (letters.test(inputtxt)) {return false; } 
   return true;   
}

function wrongExtension(v)
{
 var allowedExtensions = new Array("jpg","JPG","jpeg","JPEG","bmp", "png");
 for(var ct=0;ct<allowedExtensions.length;ct++)
 {
  sample = v.lastIndexOf(allowedExtensions[ct]);
  if(sample != -1){return false;}
  }
 return true;
 }

function makeHighlight(inputDiv){
inputDiv.style.backgroundColor="#FFCC66";

}

window.onload = function(){
var mainForm = document.getElementById("mainForm");
mainForm.onsubmit = function(e){

var requiredInputs = document.querySelectorAll(".required");
for (var i=0; i < requiredInputs.length; i++){
if(isBlank(requiredInputs[i])) {
e.preventDefault();
makeHighlight(requiredInputs[i])
}
}
var requiredRadio=document.forms["mainForm"]["difficulty"]
if (blankRadio(requiredRadio)) {
	e.preventDefault();
	makeHighlight(document.getElementById("difficultylabel"))
}
var file=document.mainForm.img.value
if (wrongExtension(file)) {e.preventDefault(); alert("Please upload a picture file in correct format")}

var dName = document.mainForm.dishname.value;
if (wrongDishName(dName)) {e.preventDefault(); 
  document.getElementById("dishname").value="Please correct the dish name";
  makeHighlight(document.mainForm.dishname);}


}
 
var requiredInputs = document.querySelectorAll(".required");
for (var i=0; i < requiredInputs.length; i++){
requiredInputs[i].onfocus = function(){
this.style.backgroundColor = "#FFFFFF";
}
}
var requiredRadio=document.mainForm.difficulty
	for (var i=0;i<requiredRadio.length; i++) {requiredRadio[i].onclick= function(){
	document.getElementById("difficultylabel").style.backgroundColor = "#FFFFFF";}}
}
