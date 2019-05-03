var dom;
function getelementampersandpipe(){

dom = document.getElementById("field");
dom.addEventListener("blur",convertampersandpipe, false);

}
function convertampersandpipe() {

var newinput = "";
var input = dom.value;

for (var k=0; k<input.length;k++){
   if(input.charAt(k)=="&"){
     newinput = newinput + "and";
   }else if(input.charAt(k) == "|"){
    newinput = newinput + " or ";
   }else{
   newinput = newinput + input.charAt(k);
   }
}
document.getElementById("output").value = newinput;
}
window.addEventListener("load", getelementampersandpipe, false);
